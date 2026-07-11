@props(['review'])

@php
    $canManage = ! $review->is_approved && in_array($review->id, session('manageable_review_ids', []), true);
@endphp

<article class="rounded-2xl bg-white border border-brand-beige p-6 shadow-card flex flex-col h-full">
    <div class="flex items-start justify-between gap-3">
        <div class="flex items-center gap-3 min-w-0">
            <div class="w-12 h-12 shrink-0 rounded-full bg-brand-gold/15 flex items-center justify-center font-bold text-brand-gold text-lg">
                {{ mb_strtoupper(mb_substr($review->name, 0, 1)) }}
            </div>
            <div class="min-w-0">
                <h3 class="font-semibold text-brand-ink truncate">{{ $review->name }}</h3>
                @if($review->nationality)
                    <p class="text-sm text-brand-gold">{{ $review->nationality }}</p>
                @endif
            </div>
        </div>
        <time class="text-xs text-brand-muted shrink-0" datetime="{{ $review->created_at->toDateString() }}">
            {{ $review->created_at->format('M j, Y') }}
        </time>
    </div>

    <div class="mt-3">
        <x-star-rating :rating="$review->rating" />
    </div>

    <p class="mt-4 text-sm text-brand-muted leading-relaxed flex-grow">"{{ $review->comment }}"</p>

    @if($canManage)
        <div class="mt-4 pt-4 border-t border-brand-beige flex flex-wrap items-center gap-3">
            <span class="text-xs font-medium text-amber-700 bg-amber-50 px-2 py-1 rounded-full">{{ __('messages.pending_badge') }}</span>
            <a href="{{ route('reviews.edit', $review) }}" class="text-sm font-medium text-brand-gold hover:text-brand-gold-dark">{{ __('messages.edit_review') }}</a>
            <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="inline"
                  onsubmit="return confirm(@json(__('messages.delete_confirm')))">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800">{{ __('messages.delete_review') }}</button>
            </form>
        </div>
    @endif
</article>
