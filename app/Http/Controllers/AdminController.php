<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewApproved;
use App\Mail\ReviewRejected;

class AdminController extends Controller
{
    /**
     * Display admin dashboard with all reviews
     */
    public function index(Request $request)
    {
        $query = Review::query();

        // Filter by status
        if ($request->has('status')) {
            if ($request->status === 'pending') {
                $query->where('is_approved', false);
            } elseif ($request->status === 'approved') {
                $query->where('is_approved', true);
            }
        }

        // Filter by featured
        if ($request->has('featured') && $request->featured === 'true') {
            $query->where('is_featured', true);
        }

        // Search
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('comment', 'like', '%' . $request->search . '%');
            });
        }

        // Sort
        $query->latest();

        $reviews = $query->paginate(20);

        // Stats for dashboard
        $stats = [
            'total' => Review::count(),
            'pending' => Review::where('is_approved', false)->count(),
            'approved' => Review::where('is_approved', true)->count(),
            'featured' => Review::where('is_featured', true)->count(),
        ];

        return view('admin.reviews', compact('reviews', 'stats'));
    }

    /**
     * Approve a review
     */
    public function approve(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = true;
        $review->save();

        // Send email notification to customer
        if ($review->email) {
            Mail::to($review->email)->send(new ReviewApproved($review));
        }

        return back()->with('success', 'Review approved successfully.');
    }

    /**
     * Reject a review
     */
    public function reject(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = false;
        $review->save();

        // Send email notification to customer
        if ($review->email) {
            Mail::to($review->email)->send(new ReviewRejected($review));
        }

        return back()->with('success', 'Review rejected successfully.');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->is_featured = !$review->is_featured;
        $review->save();

        return back()->with('success', 'Review featured status updated.');
    }

    /**
     * Delete a review
     */
    public function destroy(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Review deleted successfully.');
    }

    /**
     * Bulk approve reviews
     */
    public function bulkApprove(Request $request)
    {
        $ids = $request->input('ids', []);
        
        foreach ($ids as $id) {
            $review = Review::find($id);
            if ($review) {
                $review->is_approved = true;
                $review->save();
                
                if ($review->email) {
                    Mail::to($review->email)->send(new ReviewApproved($review));
                }
            }
        }

        return back()->with('success', count($ids) . ' reviews approved successfully.');
    }

    /**
     * Bulk reject reviews
     */
    public function bulkReject(Request $request)
    {
        $ids = $request->input('ids', []);
        
        foreach ($ids as $id) {
            $review = Review::find($id);
            if ($review) {
                $review->is_approved = false;
                $review->save();
                
                if ($review->email) {
                    Mail::to($review->email)->send(new ReviewRejected($review));
                }
            }
        }

        return back()->with('success', count($ids) . ' reviews rejected successfully.');
    }

    /**
     * Bulk delete reviews
     */
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        
        Review::whereIn('id', $ids)->delete();

        return back()->with('success', count($ids) . ' reviews deleted successfully.');
    }
}
