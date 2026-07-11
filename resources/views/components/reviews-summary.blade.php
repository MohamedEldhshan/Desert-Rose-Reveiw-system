@props(['stats'])

<section class="section-pad bg-brand-beige/50">
    <div class="section-inner">
        <h2 class="font-display text-2xl sm:text-3xl font-bold text-brand-ink text-center">{{ __('messages.summary_title') }}</h2>

        <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-5">
            <article class="rounded-2xl bg-white border border-brand-beige p-8 text-center shadow-card">
                <p class="text-4xl font-bold text-brand-gold">{{ number_format($stats['total_reviews']) }}</p>
                <p class="mt-2 text-sm font-medium text-brand-muted">{{ __('messages.summary_total') }}</p>
            </article>

            <article class="rounded-2xl bg-white border border-brand-beige p-8 text-center shadow-card">
                <div class="flex items-center justify-center gap-2">
                    <p class="text-4xl font-bold text-brand-gold">{{ number_format($stats['average_rating'], 1) }}</p>
                    <x-star-rating :rating="(int) round($stats['average_rating'])" size="sm" />
                </div>
                <p class="mt-2 text-sm font-medium text-brand-muted">{{ __('messages.summary_average') }}</p>
            </article>

            <article class="rounded-2xl bg-white border border-brand-beige p-8 text-center shadow-card">
                <p class="text-4xl font-bold text-brand-gold">{{ number_format($stats['five_star_count']) }}</p>
                <p class="mt-2 text-sm font-medium text-brand-muted">{{ __('messages.summary_five_star') }}</p>
            </article>
        </div>
    </div>
</section>
