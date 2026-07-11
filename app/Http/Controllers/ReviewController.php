<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Rules\SanitizeHtml;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    public function index(): View
    {
        $approvedQuery = Review::approved();

        $stats = [
            'total_reviews' => (clone $approvedQuery)->count(),
            'average_rating' => round((clone $approvedQuery)->avg('rating') ?? 0, 1),
            'five_star_count' => (clone $approvedQuery)->where('rating', 5)->count(),
        ];

        $reviews = Review::approved()->latest()->paginate(9);

        $pendingReviews = Review::query()
            ->whereIn('id', session('manageable_review_ids', []))
            ->where('is_approved', false)
            ->latest()
            ->get();

        return view('home', compact('reviews', 'stats', 'pendingReviews'));
    }

    public function store(Request $request): RedirectResponse
    {
        $requestId = (string) Str::uuid();
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();

        Log::info('Review submission started', [
            'request_id' => $requestId,
            'ip' => $ipAddress,
            'user_agent' => $userAgent,
        ]);

        // Check honeypot for spam
        if ($request->filled('website')) {
            Log::warning('Spam detected via honeypot', [
                'request_id' => $requestId,
                'ip' => $ipAddress,
            ]);
            return back()->with('error', __('messages.spam_detected'));
        }

        // Generate or retrieve idempotency key
        $idempotencyKey = $request->input('_idempotency_key') ?? (string) Str::uuid();
        
        // Check for duplicate submission using idempotency key
        $existingReview = Review::findByIdempotencyKey($idempotencyKey);
        if ($existingReview) {
            Log::info('Duplicate submission detected via idempotency key', [
                'request_id' => $requestId,
                'ip' => $ipAddress,
                'existing_review_id' => $existingReview->id,
                'idempotency_key' => $idempotencyKey,
            ]);
            
            return redirect()->to(route('home') . '#write-review')
                ->with('success', __('messages.review_submitted'));
        }

        // Enhanced validation with security rules
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100|regex:/^[\p{L}\s\-\'\.]+$/u',
                'phone' => 'required|string|max:20|regex:/^[\d\+\-\s\(\)]+$/',
                'email' => 'nullable|email|max:150',
                'nationality' => 'required|string|max:50|regex:/^[\p{L}\s\-]+$/u',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => ['required', 'string', 'min:10', 'max:1000', new SanitizeHtml],
            ], [
                'name.regex' => 'Name contains invalid characters.',
                'phone.regex' => 'Phone number contains invalid characters.',
                'nationality.regex' => 'Nationality contains invalid characters.',
            ]);
        } catch (ValidationException $e) {
            Log::warning('Review validation failed', [
                'request_id' => $requestId,
                'ip' => $ipAddress,
                'errors' => $e->errors(),
            ]);
            throw $e;
        }

        // Database transaction for atomicity
        try {
            DB::beginTransaction();

            $review = Review::create([
                'idempotency_key' => $idempotencyKey,
                'name' => strip_tags($validated['name']),
                'email' => filled($validated['email'] ?? null)
                    ? filter_var($validated['email'], FILTER_SANITIZE_EMAIL)
                    : null,
                'phone' => preg_replace('/[^\d\+\-\s\(\)]/', '', $validated['phone']),
                'nationality' => strip_tags($validated['nationality']),
                'rating' => (int) $validated['rating'],
                'comment' => strip_tags($validated['comment'], '<p><br><strong><em><ul><ol><li>'),
                'is_approved' => false,
                'is_featured' => false,
            ]);

            $manageable = session('manageable_review_ids', []);
            $manageable[] = $review->id;
            session(['manageable_review_ids' => array_values(array_unique($manageable))]);

            DB::commit();

            Log::info('Review created successfully', [
                'request_id' => $requestId,
                'review_id' => $review->id,
                'ip' => $ipAddress,
                'idempotency_key' => $idempotencyKey,
            ]);

            return redirect()->to(route('home') . '#write-review')
                ->with('success', __('messages.review_submitted'));

        } catch (\PDOException $e) {
            DB::rollBack();
            Log::error('Database error while creating review', [
                'request_id' => $requestId,
                'ip' => $ipAddress,
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
            
            return back()->withInput()
                ->with('error', 'Unable to save your review. Please try again later.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Unexpected error while creating review', [
                'request_id' => $requestId,
                'ip' => $ipAddress,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return back()->withInput()
                ->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function edit(Review $review): View|RedirectResponse
    {
        if (! $this->canManage($review)) {
            return redirect()->route('home')->with('error', __('messages.review_edit_denied'));
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review): RedirectResponse
    {
        if (! $this->canManage($review)) {
            return redirect()->route('home')->with('error', __('messages.review_edit_denied'));
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:150',
            'nationality' => 'required|string|max:50',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:1000',
        ]);

        $review->update([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
            'nationality' => $validated['nationality'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->to(route('home') . '#reviews-list')->with('success', __('messages.review_updated'));
    }

    public function destroy(Review $review): RedirectResponse
    {
        if (! $this->canManage($review)) {
            return redirect()->route('home')->with('error', __('messages.review_edit_denied'));
        }

        $review->delete();

        $manageable = array_values(array_filter(
            session('manageable_review_ids', []),
            fn ($id) => (int) $id !== $review->id
        ));
        session(['manageable_review_ids' => $manageable]);

        return redirect()->to(route('home') . '#reviews-list')->with('success', __('messages.review_deleted'));
    }

    protected function canManage(Review $review): bool
    {
        if ($review->is_approved) {
            return false;
        }

        return in_array($review->id, session('manageable_review_ids', []), true);
    }
}
