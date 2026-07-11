<?php

namespace Tests\Feature;

use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewApproved;
use App\Mail\ReviewRejected;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    // =====================
    // index() - Dashboard
    // =====================

    public function test_admin_reviews_page_returns_200(): void
    {
        $response = $this->get('/admin/reviews');
        $response->assertStatus(200);
    }

    public function test_admin_shows_all_reviews(): void
    {
        Review::factory()->count(5)->create();
        Review::factory()->approved()->count(3)->create();

        $response = $this->get('/admin/reviews');
        $response->assertViewHas('reviews', function ($reviews) {
            return $reviews->total() === 8;
        });
    }

    public function test_admin_can_filter_by_pending_status(): void
    {
        Review::factory()->count(3)->create();           // pending
        Review::factory()->approved()->count(2)->create(); // approved

        $response = $this->get('/admin/reviews?status=pending');
        $response->assertViewHas('reviews', function ($reviews) {
            return $reviews->total() === 3;
        });
    }

    public function test_admin_can_filter_by_approved_status(): void
    {
        Review::factory()->count(3)->create();           // pending
        Review::factory()->approved()->count(2)->create(); // approved

        $response = $this->get('/admin/reviews?status=approved');
        $response->assertViewHas('reviews', function ($reviews) {
            return $reviews->total() === 2;
        });
    }

    public function test_admin_can_filter_by_featured(): void
    {
        Review::factory()->featured()->count(2)->create();
        Review::factory()->approved()->count(3)->create();

        $response = $this->get('/admin/reviews?featured=true');
        $response->assertViewHas('reviews', function ($reviews) {
            return $reviews->total() === 2;
        });
    }

    public function test_admin_can_search_by_name(): void
    {
        Review::factory()->create(['name' => 'Unique Name XYZ']);
        Review::factory()->count(3)->create();

        $response = $this->get('/admin/reviews?search=Unique+Name+XYZ');
        $response->assertViewHas('reviews', function ($reviews) {
            return $reviews->total() === 1;
        });
    }

    public function test_admin_can_search_by_email(): void
    {
        Review::factory()->create(['email' => 'unique@searchtest.com']);
        Review::factory()->count(3)->create();

        $response = $this->get('/admin/reviews?search=unique@searchtest.com');
        $response->assertViewHas('reviews', function ($reviews) {
            return $reviews->total() === 1;
        });
    }

    public function test_admin_can_search_by_comment(): void
    {
        Review::factory()->create(['comment' => 'This product is absolutely amazing for testing purposes.']);
        Review::factory()->count(2)->create();

        $response = $this->get('/admin/reviews?search=absolutely+amazing');
        $response->assertViewHas('reviews', function ($reviews) {
            return $reviews->total() === 1;
        });
    }

    public function test_admin_reviews_are_paginated(): void
    {
        Review::factory()->count(25)->create();

        $response = $this->get('/admin/reviews');
        $response->assertViewHas('reviews', function ($reviews) {
            return $reviews->perPage() === 20;
        });
    }

    // =====================
    // approve()
    // =====================

    public function test_can_approve_review(): void
    {
        $review = Review::factory()->create(['is_approved' => false]);

        $response = $this->post("/admin/reviews/{$review->id}/approve");

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('reviews', [
            'id'          => $review->id,
            'is_approved' => true,
        ]);
    }

    public function test_approving_review_sends_email_if_email_present(): void
    {
        Mail::fake();

        $review = Review::factory()->withEmail()->create(['is_approved' => false]);

        $this->post("/admin/reviews/{$review->id}/approve");

        Mail::assertSent(ReviewApproved::class, function ($mail) use ($review) {
            return $mail->hasTo($review->email);
        });
    }

    public function test_approving_review_without_email_does_not_send_mail(): void
    {
        Mail::fake();

        $review = Review::factory()->create(['email' => null, 'is_approved' => false]);

        $this->post("/admin/reviews/{$review->id}/approve");

        Mail::assertNotSent(ReviewApproved::class);
    }

    public function test_approving_nonexistent_review_returns_404(): void
    {
        $response = $this->post('/admin/reviews/99999/approve');
        $response->assertStatus(404);
    }

    // =====================
    // reject()
    // =====================

    public function test_can_reject_review(): void
    {
        $review = Review::factory()->approved()->create();

        $response = $this->post("/admin/reviews/{$review->id}/reject");

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('reviews', [
            'id'          => $review->id,
            'is_approved' => false,
        ]);
    }

    public function test_rejecting_review_sends_email_if_email_present(): void
    {
        Mail::fake();

        $review = Review::factory()->approved()->withEmail()->create();

        $this->post("/admin/reviews/{$review->id}/reject");

        Mail::assertSent(ReviewRejected::class, function ($mail) use ($review) {
            return $mail->hasTo($review->email);
        });
    }

    public function test_rejecting_review_without_email_does_not_send_mail(): void
    {
        Mail::fake();

        $review = Review::factory()->approved()->create(['email' => null]);

        $this->post("/admin/reviews/{$review->id}/reject");

        Mail::assertNotSent(ReviewRejected::class);
    }

    public function test_rejecting_nonexistent_review_returns_404(): void
    {
        $response = $this->post('/admin/reviews/99999/reject');
        $response->assertStatus(404);
    }

    // =====================
    // toggleFeatured()
    // =====================

    public function test_can_toggle_featured_on(): void
    {
        $review = Review::factory()->approved()->create(['is_featured' => false]);

        $this->post("/admin/reviews/{$review->id}/feature");

        $this->assertDatabaseHas('reviews', [
            'id'          => $review->id,
            'is_featured' => true,
        ]);
    }

    public function test_can_toggle_featured_off(): void
    {
        $review = Review::factory()->featured()->create();

        $this->post("/admin/reviews/{$review->id}/feature");

        $this->assertDatabaseHas('reviews', [
            'id'          => $review->id,
            'is_featured' => false,
        ]);
    }

    public function test_toggle_featured_returns_success(): void
    {
        $review = Review::factory()->create();

        $response = $this->post("/admin/reviews/{$review->id}/feature");

        $response->assertRedirect();
        $response->assertSessionHas('success');
    }

    // =====================
    // destroy()
    // =====================

    public function test_can_delete_review(): void
    {
        $review = Review::factory()->create();

        $response = $this->delete("/admin/reviews/{$review->id}");

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('reviews', ['id' => $review->id]);
    }

    public function test_deleting_nonexistent_review_returns_404(): void
    {
        $response = $this->delete('/admin/reviews/99999');
        $response->assertStatus(404);
    }

    // =====================
    // bulkApprove()
    // =====================

    public function test_bulk_approve_reviews(): void
    {
        $reviews = Review::factory()->count(3)->create(['is_approved' => false]);
        $ids = $reviews->pluck('id')->toArray();

        $response = $this->post('/admin/reviews/bulk-approve', ['ids' => $ids]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        foreach ($ids as $id) {
            $this->assertDatabaseHas('reviews', ['id' => $id, 'is_approved' => true]);
        }
    }

    public function test_bulk_approve_sends_emails(): void
    {
        Mail::fake();

        $reviews = Review::factory()->withEmail()->count(3)->create(['is_approved' => false]);
        $ids = $reviews->pluck('id')->toArray();

        $this->post('/admin/reviews/bulk-approve', ['ids' => $ids]);

        Mail::assertSent(ReviewApproved::class, 3);
    }

    public function test_bulk_approve_with_empty_ids_does_nothing(): void
    {
        Review::factory()->count(2)->create(['is_approved' => false]);

        $response = $this->post('/admin/reviews/bulk-approve', ['ids' => []]);

        $response->assertRedirect();
        $this->assertDatabaseCount('reviews', 2);
        $this->assertDatabaseMissing('reviews', ['is_approved' => true]);
    }

    // =====================
    // bulkReject()
    // =====================

    public function test_bulk_reject_reviews(): void
    {
        $reviews = Review::factory()->approved()->count(3)->create();
        $ids = $reviews->pluck('id')->toArray();

        $response = $this->post('/admin/reviews/bulk-reject', ['ids' => $ids]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        foreach ($ids as $id) {
            $this->assertDatabaseHas('reviews', ['id' => $id, 'is_approved' => false]);
        }
    }

    public function test_bulk_reject_sends_emails(): void
    {
        Mail::fake();

        $reviews = Review::factory()->approved()->withEmail()->count(2)->create();
        $ids = $reviews->pluck('id')->toArray();

        $this->post('/admin/reviews/bulk-reject', ['ids' => $ids]);

        Mail::assertSent(ReviewRejected::class, 2);
    }

    // =====================
    // bulkDelete()
    // =====================

    public function test_bulk_delete_reviews(): void
    {
        $reviews = Review::factory()->count(4)->create();
        $ids = $reviews->pluck('id')->toArray();

        $response = $this->post('/admin/reviews/bulk-delete', ['ids' => $ids]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        foreach ($ids as $id) {
            $this->assertDatabaseMissing('reviews', ['id' => $id]);
        }
    }

    public function test_bulk_delete_with_empty_ids_does_nothing(): void
    {
        Review::factory()->count(3)->create();

        $response = $this->post('/admin/reviews/bulk-delete', ['ids' => []]);

        $response->assertRedirect();
        $this->assertDatabaseCount('reviews', 3);
    }

    public function test_bulk_delete_only_deletes_specified_ids(): void
    {
        $toDelete = Review::factory()->count(2)->create();
        $toKeep   = Review::factory()->count(2)->create();

        $this->post('/admin/reviews/bulk-delete', [
            'ids' => $toDelete->pluck('id')->toArray(),
        ]);

        foreach ($toKeep as $review) {
            $this->assertDatabaseHas('reviews', ['id' => $review->id]);
        }
    }
}
