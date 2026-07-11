<section class="section-pad bg-brand-cream">
    <div class="section-inner text-center">
        <h2 class="font-display text-2xl sm:text-3xl font-bold text-brand-ink">{{ __('messages.trust_title') }}</h2>
        <p class="mt-2 text-brand-muted max-w-xl mx-auto">{{ __('messages.trust_subtitle') }}</p>

        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
                ['title' => 'trust_1_title', 'text' => 'trust_1_text', 'icon' => 'M12 3l2.09 6.26L20.18 10l-5.09 3.74L16.18 20 12 16.77 7.82 20l1.09-6.26L3.82 10l6.09-.74L12 3z'],
                ['title' => 'trust_2_title', 'text' => 'trust_2_text', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                ['title' => 'trust_3_title', 'text' => 'trust_3_text', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
                ['title' => 'trust_4_title', 'text' => 'trust_4_text', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'],
            ] as $point)
                <article class="rounded-2xl bg-white border border-brand-beige p-6 shadow-card text-start">
                    <div class="w-11 h-11 rounded-full bg-brand-gold/15 flex items-center justify-center text-brand-gold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $point['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-semibold text-brand-ink">{{ __('messages.' . $point['title']) }}</h3>
                    <p class="mt-2 text-sm text-brand-muted leading-relaxed">{{ __('messages.' . $point['text']) }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
