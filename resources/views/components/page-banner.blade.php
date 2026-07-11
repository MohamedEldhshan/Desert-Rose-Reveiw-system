@props(['title', 'subtitle' => null])

<section class="relative bg-brand-overlay text-white py-16 sm:py-20">
    <div class="absolute inset-0 bg-gradient-to-b from-brand-overlay via-brand-overlay/95 to-brand-overlay/90"></div>
    <div class="relative section-inner text-center">
        <h1 class="font-display text-3xl sm:text-4xl font-bold">{{ $title }}</h1>
        @if($subtitle)
            <p class="mt-3 text-brand-beige/90 max-w-xl mx-auto">{{ $subtitle }}</p>
        @endif
    </div>
</section>
