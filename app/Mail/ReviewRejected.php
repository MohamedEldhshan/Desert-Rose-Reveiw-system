<?php

namespace App\Mail;

use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Review Status Update - Desert Rose',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.review-rejected',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
