@php
    $contact = config('desert_rose.contact');
    $mapUrl = 'https://maps.google.com/maps?q=' . $contact['map_lat'] . ',' . $contact['map_lng'] . '&z=16&output=embed';
    $externalUrl = 'https://maps.google.com/?q=' . $contact['map_lat'] . ',' . $contact['map_lng'];
@endphp

<section class="mt-10 rounded-2xl overflow-hidden border border-brand-beige bg-white shadow-card">
    <div class="flex flex-wrap items-center justify-between gap-3 px-5 py-4 border-b border-brand-beige">
        <h2 class="font-semibold text-brand-ink">{{ __('messages.contact_map_title') }}</h2>
        <a href="{{ $externalUrl }}" target="_blank" rel="noopener"
           class="text-sm font-medium text-brand-gold hover:text-brand-gold-dark transition-colors">
            {{ __('messages.contact_map_link') }} →
        </a>
    </div>
    <iframe src="{{ $mapUrl }}"
            class="w-full h-64 sm:h-80 md:h-96 border-0"
            allowfullscreen
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="{{ __('messages.contact_map_title') }}"></iframe>
</section>
