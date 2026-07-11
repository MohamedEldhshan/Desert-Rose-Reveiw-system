<?php

namespace Tests\Feature;

use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ReviewSubmissionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_successful_review_creation()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'email' => 'john@example.com',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Great product! Highly recommended.',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $response->assertRedirect(route('home') . '#write-review');
        $response->assertSessionHas('success');
        
        $this->assertDatabaseHas('reviews', [
            'name' => 'John Doe',
            'rating' => 5,
            'is_approved' => false,
        ]);
    }

    public function test_validation_requires_name()
    {
        $response = $this->post(route('reviews.store'), [
            'phone' => '+1234567890',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Great product!',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_validation_requires_phone()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Great product!',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $response->assertSessionHasErrors('phone');
    }

    public function test_validation_requires_rating()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'nationality' => 'American',
            'comment' => 'Great product!',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $response->assertSessionHasErrors('rating');
    }

    public function test_validation_requires_comment_minimum_length()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Short',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $response->assertSessionHasErrors('comment');
    }

    public function test_validation_rejects_invalid_rating()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'nationality' => 'American',
            'rating' => 6,
            'comment' => 'Great product!',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $response->assertSessionHasErrors('rating');
    }

    public function test_honeypot_detects_spam()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Great product!',
            'website' => 'spam',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $response->assertSessionHas('error');
        $this->assertDatabaseCount('reviews', 0);
    }

    public function test_idempotency_key_prevents_duplicates()
    {
        $idempotencyKey = (string) \Illuminate\Support\Str::uuid();

        $firstResponse = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Great product!',
            '_idempotency_key' => $idempotencyKey,
        ]);

        $firstResponse->assertRedirect(route('home') . '#write-review');
        $this->assertDatabaseCount('reviews', 1);

        $secondResponse = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Great product!',
            '_idempotency_key' => $idempotencyKey,
        ]);

        $secondResponse->assertRedirect(route('home') . '#write-review');
        $this->assertDatabaseCount('reviews', 1); // Still only 1 review
    }

    public function test_xss_payload_is_sanitized()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => '<script>alert("xss")</script>Great product!',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $response->assertSessionHasErrors('comment');
        $this->assertDatabaseCount('reviews', 0);
    }

    public function test_sql_injection_attempt_is_sanitized()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => "John'; DROP TABLE reviews; --",
            'phone' => '+1234567890',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Great product!',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        // Should still work due to parameterized queries
        $response->assertRedirect(route('home') . '#write-review');
        $this->assertDatabaseHas('reviews', [
            'name' => "John'; DROP TABLE reviews; --",
        ]);
        
        // Verify table still exists
        $this->assertDatabaseCount('reviews', 1);
    }

    public function test_rate_limiting_works()
    {
        $idempotencyKey = (string) \Illuminate\Support\Str::uuid();

        for ($i = 0; $i < 4; $i++) {
            $response = $this->post(route('reviews.store'), [
                'name' => 'John Doe',
                'phone' => '+1234567890',
                'nationality' => 'American',
                'rating' => 5,
                'comment' => 'Great product!',
                '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
            ]);
        }

        // 4th request should be rate limited
        $response->assertSessionHas('error');
    }

    public function test_email_validation_works()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'email' => 'invalid-email',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Great product!',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_review_starts_as_unapproved()
    {
        $response = $this->post(route('reviews.store'), [
            'name' => 'John Doe',
            'phone' => '+1234567890',
            'nationality' => 'American',
            'rating' => 5,
            'comment' => 'Great product!',
            '_idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        $review = Review::first();
        $this->assertFalse($review->is_approved);
        $this->assertFalse($review->is_featured);
    }
}
