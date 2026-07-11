@props(['reviews', 'pendingReviews' => collect()])

<section id="reviews-list" class="section-pad bg-brand-beige/40">
    <div class="section-inner">
        <div class="text-center max-w-2xl mx-auto">
            <h2 class="font-display text-2xl sm:text-3xl font-bold text-brand-ink">{{ __('messages.reviews_list_title') }}</h2>
            <p class="mt-2 text-brand-muted">{{ __('messages.reviews_list_subtitle') }}</p>
        </div>

        @if($pendingReviews->count() > 0)
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($pendingReviews as $review)
                    <x-review-card :review="$review" />
                @endforeach
            </div>
        @endif

        @if($reviews->count() > 0)
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($reviews as $review)
                    <x-review-card :review="$review" />
                @endforeach
            </div>

            <div class="mt-10">
                {{ $reviews->withQueryString()->fragment('reviews-list')->links() }}
            </div>
        @elseif($pendingReviews->count() === 0)
            <div class="mt-12 text-center py-12 rounded-2xl bg-white border border-brand-beige shadow-card">
                <p class="text-brand-muted">{{ __('messages.reviews_empty') }}</p>
                <a href="#write-review" class="btn-primary mt-6 inline-flex">{{ __('messages.reviews_empty_cta') }}</a>
            </div>
        @endif
    </div>
</section>
