@extends('layouts.app')

@section('title', __('messages.edit_review_title'))

@section('content')
    <x-page-banner :title="__('messages.edit_review_title')" />

    <section class="section-pad bg-brand-cream">
        <div class="section-inner max-w-2xl">
            <form action="{{ route('reviews.update', $review) }}" method="POST"
                  class="rounded-2xl border border-brand-beige bg-white p-6 sm:p-8 shadow-card"
                  x-data="{ rating: {{ (int) old('rating', $review->rating) }}, hover: 0 }">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.full_name') }}</label>
                        <input type="text" name="name" value="{{ old('name', $review->name) }}" required
                               class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm focus:ring-2 focus:ring-brand-gold">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.phone') }}</label>
                        <input type="tel" name="phone" value="{{ old('phone', $review->phone) }}" required dir="ltr"
                               class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm focus:ring-2 focus:ring-brand-gold">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.email') }}</label>
                        <input type="email" name="email" value="{{ old('email', $review->email) }}" dir="ltr"
                               class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm focus:ring-2 focus:ring-brand-gold">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.nationality') }}</label>
                        <x-nationality-select name="nationality" :selected="old('nationality', $review->nationality)" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-2">{{ __('messages.rating') }}</label>
                        <input type="hidden" name="rating" :value="rating" required>
                        <div class="flex gap-1">
                            <template x-for="star in [1,2,3,4,5]" :key="star">
                                <button type="button" @click="rating = star" class="p-1">
                                    <svg class="w-9 h-9" :class="star <= (hover || rating) ? 'text-brand-gold' : 'text-brand-beige'" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </button>
                            </template>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.review') }}</label>
                        <textarea name="comment" rows="5" required class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm resize-none focus:ring-2 focus:ring-brand-gold">{{ old('comment', $review->comment) }}</textarea>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap gap-3">
                    <button type="submit" class="btn-primary">{{ __('messages.submit_review') }}</button>
                    <a href="{{ route('home') }}#reviews-list" class="inline-flex items-center min-h-[44px] px-6 text-brand-muted hover:text-brand-ink">{{ __('messages.nav_home') }}</a>
                </div>
            </form>
        </div>
    </section>
@endsection
