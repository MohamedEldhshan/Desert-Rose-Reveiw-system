<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

class ContactController extends Controller
{
    /**
     * Display contact page
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Handle contact form submission
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|min:3|max:200',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email.',
            'subject.required' => 'Please enter a subject.',
            'message.required' => 'Please write your message.',
            'message.min' => 'Message must be at least 10 characters.',
        ]);

        // Send email notification
        Mail::to(config('desert_rose.contact.admin_email', 'admin@desertrose.com'))->send(new ContactFormSubmitted($validated));

        return back()->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }
}
