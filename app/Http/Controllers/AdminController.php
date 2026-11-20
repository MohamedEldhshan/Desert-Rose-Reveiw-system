<?php

namespace App\Http\Controllers;

use App\Mail\ReviewApproved;
use App\Mail\ReviewRejected;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display admin dashboard with all reviews.
     */
    public function index(Request $request)
    {
        $query = Review::query();

        if ($request->has('status')) {
            if ($request->status === 'pending') {
                $query->where('is_approved', false);
            } elseif ($request->status === 'approved') {
                $query->where('is_approved', true);
            }
        }

        if ($request->has('featured') && $request->featured === 'true') {
            $query->where('is_featured', true);
        }

        if ($request->filled('search')) {
            $search = $request->string('search')->toString();
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('comment', 'like', '%' . $search . '%');
            });
        }

        $reviews = $query->latest()->paginate(20);

        $stats = [
            'total' => Review::count(),
            'pending' => Review::where('is_approved', false)->count(),
            'approved' => Review::where('is_approved', true)->count(),
            'featured' => Review::where('is_featured', true)->count(),
        ];

        return view('admin.reviews', compact('reviews', 'stats'));
    }

    /**
     * Approve a review.
     */
    public function approve(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = true;
        $review->save();

        $this->notifyReview($review, new ReviewApproved($review));

        return back()->with('success', 'Review approved successfully.');
    }

    /**
     * Reject a review.
     */
    public function reject(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = false;
        $review->save();

        $this->notifyReview($review, new ReviewRejected($review));

        return back()->with('success', 'Review rejected successfully.');
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->is_featured = ! $review->is_featured;
        $review->save();

        return back()->with('success', 'Review featured status updated.');
    }

    /**
     * Delete a review.
     */
    public function destroy(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Review deleted successfully.');
    }

    /**
     * Bulk approve reviews.
     */
    public function bulkApprove(Request $request)
    {
        $ids = $this->validatedIds($request);

        $reviews = DB::transaction(function () use ($ids) {
            return Review::whereIn('id', $ids)->get();
        });

        foreach ($reviews as $review) {
            $review->is_approved = true;
            $review->save();
            $this->notifyReview($review, new ReviewApproved($review));
        }

        return back()->with('success', $reviews->count() . ' reviews approved successfully.');
    }

    /**
     * Bulk reject reviews.
     */
    public function bulkReject(Request $request)
    {
        $ids = $this->validatedIds($request);

        $reviews = DB::transaction(function () use ($ids) {
            return Review::whereIn('id', $ids)->get();
        });

        foreach ($reviews as $review) {
            $review->is_approved = false;
            $review->save();
            $this->notifyReview($review, new ReviewRejected($review));
        }

        return back()->with('success', $reviews->count() . ' reviews rejected successfully.');
    }

    /**
     * Bulk delete reviews.
     */
    public function bulkDelete(Request $request)
    {
        $ids = $this->validatedIds($request);

        $deleted = DB::transaction(function () use ($ids) {
            return Review::whereIn('id', $ids)->delete();
        });

        return back()->with('success', $deleted . ' reviews deleted successfully.');
    }

    /**
     * Validate and return the ids array from the request.
     *
     * @return array<int, int>
     */
    private function validatedIds(Request $request): array
    {
        $validated = $request->validate([
            'ids' => ['required', 'array', 'max:100'],
            'ids.*' => ['integer', 'exists:reviews,id'],
        ]);

        return array_map('intval', $validated['ids']);
    }

    /**
     * Send a review notification email without letting mail failures
     * break the admin operation.
     */
    private function notifyReview(Review $review, $mailable): void
    {
        if (! $review->email) {
            return;
        }

        try {
            Mail::to($review->email)->send($mailable);
        } catch (\Throwable $e) {
            Log::warning('Failed to send review notification email', [
                'review_id' => $review->id,
                'email' => $review->email,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
