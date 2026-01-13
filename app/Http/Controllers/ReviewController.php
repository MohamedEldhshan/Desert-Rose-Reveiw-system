<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * عرض الصفحة الرئيسية
     */
    public function index()
    {
        // جلب المراجعات المعتمدة والمميزة
        $featuredReviews = Review::approved()
            ->featured()
            ->latest()
            ->take(6)
            ->get();

        // إحصائيات
        $stats = [
            'total_reviews' => Review::approved()->count(),
            'average_rating' => Review::approved()->avg('rating') ?? 5,
        ];

        return view('home', compact('featuredReviews', 'stats'));
    }

    /**
     * حفظ مراجعة جديدة
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'nationality' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:1000',
        ], [
            'name.required' => 'Please enter your name.',
            'name.min' => 'Name must be at least 2 characters.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email.',
            'rating.required' => 'Please select a rating.',
            'comment.required' => 'Please write your review.',
            'comment.min' => 'Review must be at least 10 characters.',
        ]);

        // Honeypot check
        if ($request->filled('website')) {
            return back()->with('error', 'Spam detected.');
        }

        // Create review
        Review::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'nationality' => $validated['nationality'] ?? null,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'is_approved' => false,
            'is_featured' => false,
        ]);

        return back()->with('success', 'Thank you! Your review has been submitted and will be published after approval.');
    }
}
