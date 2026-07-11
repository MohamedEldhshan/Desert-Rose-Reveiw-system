@php
    $slides = config('desert_rose.hero_slides', []);
    $slideCount = max(count($slides), 1);
@endphp

<section id="home" class="relative w-full min-h-[70vh] sm:min-h-[78vh] flex items-center overflow-hidden bg-brand-overlay">
    <div class="absolute inset-0"
         x-data="{
            current: 0,
            total: {{ $slideCount }},
            init() {
                if (this.total > 1) {
                    setInterval(() => { this.current = (this.current + 1) % this.total }, 6000);
                }
            }
         }"
         x-init="init()">
        @forelse($slides as $index => $slide)
            <div x-show="current === {{ $index }}"
                 x-transition:enter="transition ease-out duration-700"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="absolute inset-0"
                 @if($index > 0) x-cloak @endif>
                <img src="{{ asset($slide['image']) }}"
                     alt="{{ $slide['alt'] ?? config('desert_rose.brand.name') }}"
                     class="w-full h-full object-cover scale-105"
                     loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
            </div>
        @empty
            <div class="absolute inset-0 bg-gradient-to-br from-brand-overlay via-brand-overlay to-brand-gold/30"></div>
        @endforelse
        <div class="absolute inset-0 bg-brand-overlay/75"></div>
    </div>

    <div class="relative z-10 section-inner w-full py-20 text-center text-white">
        <img src="{{ asset('images/desert-rose-logo.png') }}"
             alt=""
             class="h-20 w-20 sm:h-24 sm:w-24 mx-auto object-contain drop-shadow-lg ring-2 ring-brand-gold/40 rounded-full bg-white/10 p-1">
        <h1 class="mt-6 font-display text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight">{{ __('messages.hero_title') }}</h1>
        <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-brand-beige/95 leading-relaxed">{{ __('messages.hero_subtitle') }}</p>
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#write-review" class="btn-primary w-full sm:w-auto">{{ __('messages.hero_cta_review') }}</a>
            <a href="{{ route('contact.index') }}" class="btn-secondary w-full sm:w-auto">{{ __('messages.hero_cta_contact') }}</a>
        </div>
    </div>
</section>
