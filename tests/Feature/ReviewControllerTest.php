<?php

namespace Tests\Feature;

use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_returns_200(): void
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_home_page_stats_count_only_approved(): void
    {
        Review::factory()->approved()->count(4)->create();
        Review::factory()->count(2)->create();

        $this->get('/')->assertViewHas('stats', fn ($stats) => $stats['total_reviews'] === 4);
    }

    public function test_home_page_lists_approved_reviews(): void
    {
        Review::factory()->approved()->count(3)->create();
        Review::factory()->count(2)->create();

        $this->get('/')->assertViewHas('reviews', fn ($reviews) => $reviews->total() === 3);
    }

    public function test_can_submit_review_with_valid_data(): void
    {
        $response = $this->post('/reviews', [
            'name' => 'Ahmed Ali',
            'phone' => '+201234567890',
            'email' => 'ahmed@example.com',
            'nationality' => 'Egypt',
            'rating' => 5,
            'comment' => 'Excellent visit, highly recommended!',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('reviews', [
            'name' => 'Ahmed Ali',
            'phone' => '+201234567890',
            'rating' => 5,
        ]);
    }

    public function test_submitted_review_is_not_auto_approved(): void
    {
        $this->post('/reviews', [
            'name' => 'Test User',
            'phone' => '+201111111111',
            'nationality' => 'Germany',
            'rating' => 4,
            'comment' => 'Great service indeed.',
        ]);

        $this->assertDatabaseHas('reviews', [
            'name' => 'Test User',
            'is_approved' => false,
        ]);
    }

    public function test_review_can_be_submitted_without_email(): void
    {
        $response = $this->post('/reviews', [
            'name' => 'Anonymous',
            'phone' => '+201111111111',
            'nationality' => 'France',
            'rating' => 3,
            'comment' => 'Good experience overall.',
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('reviews', ['name' => 'Anonymous', 'email' => null]);
    }

    public function test_review_submission_requires_phone_and_nationality(): void
    {
        $this->post('/reviews', [
            'name' => 'Test User',
            'rating' => 5,
            'comment' => 'Great product visit.',
        ])->assertSessionHasErrors(['phone', 'nationality']);
    }

    public function test_honeypot_field_blocks_spam(): void
    {
        $this->post('/reviews', [
            'name' => 'Bot',
            'phone' => '+201111111111',
            'nationality' => 'Other',
            'rating' => 5,
            'comment' => 'Buy cheap products now!!!',
            'website' => 'http://spam.com',
        ])->assertSessionHas('error');

        $this->assertDatabaseMissing('reviews', ['name' => 'Bot']);
    }

    public function test_reviews_route_redirects_to_home_anchor(): void
    {
        $this->get('/reviews')->assertRedirect('/#reviews-list');
    }

    public function test_user_can_edit_pending_review_in_session(): void
    {
        $review = Review::factory()->create(['is_approved' => false]);

        $this->withSession(['manageable_review_ids' => [$review->id]])
            ->get(route('reviews.edit', $review))
            ->assertStatus(200);
    }

    public function test_user_cannot_edit_approved_review(): void
    {
        $review = Review::factory()->approved()->create();

        $this->withSession(['manageable_review_ids' => [$review->id]])
            ->get(route('reviews.edit', $review))
            ->assertRedirect(route('home'));
    }
}
