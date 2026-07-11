@php
    $contact = config('desert_rose.contact');
    $locales = config('desert_rose.locales');
    $currentLocale = app()->getLocale();
@endphp

<nav class="sticky top-0 z-50 bg-brand-cream/95 backdrop-blur-md border-b border-brand-gold/20 shadow-sm"
     x-data="{ mobileOpen: false, langOpen: false }">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-18 min-h-[72px] gap-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('images/desert-rose-logo.png') }}" alt="{{ config('desert_rose.brand.name') }}" class="h-11 w-11 object-contain">
                <span class="font-display text-lg sm:text-xl font-bold text-brand-overlay leading-tight">{{ config('desert_rose.brand.name') }}</span>
            </a>

            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="text-brand-muted hover:text-brand-gold font-medium transition-colors">{{ __('messages.nav_home') }}</a>
                <a href="{{ route('home') }}#reviews-list" class="text-brand-muted hover:text-brand-gold font-medium transition-colors">{{ __('messages.nav_reviews') }}</a>
                <a href="{{ route('contact.index') }}" class="text-brand-muted hover:text-brand-gold font-medium transition-colors">{{ __('messages.nav_contact') }}</a>

                <div class="relative" @click.outside="langOpen = false">
                    <button type="button" @click="langOpen = !langOpen"
                            class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-brand-muted hover:text-brand-gold rounded-lg border border-brand-beige">
                        <span>{{ $locales[$currentLocale]['flag'] ?? '🌐' }}</span>
                        <span class="hidden lg:inline">{{ $locales[$currentLocale]['label'] ?? strtoupper($currentLocale) }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="langOpen" x-cloak x-transition
                         class="absolute {{ app()->getLocale() === 'ar' ? 'left-0' : 'right-0' }} mt-2 w-40 rounded-lg bg-white border border-brand-beige shadow-card py-1 z-50">
                        @foreach($locales as $code => $meta)
                            <a href="{{ route('language.switch', $code) }}"
                               class="block px-4 py-2 text-sm {{ $currentLocale === $code ? 'text-brand-gold font-semibold bg-brand-cream' : 'text-brand-muted hover:bg-brand-cream hover:text-brand-gold' }}">
                                {{ $meta['flag'] }} {{ $meta['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="https://wa.me/{{ $contact['whatsapp'] }}" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#25D366] text-white text-sm font-semibold hover:bg-[#1da851] transition-colors shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    {{ __('messages.nav_whatsapp') }}
                </a>
            </div>

            <div class="flex md:hidden items-center gap-2">
                <a href="https://wa.me/{{ $contact['whatsapp'] }}" target="_blank" rel="noopener" class="p-2.5 rounded-full bg-[#25D366] text-white" aria-label="WhatsApp">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                </a>
                <button type="button" @click="mobileOpen = !mobileOpen" class="p-2 text-brand-overlay rounded-lg" aria-label="Menu">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <div x-show="mobileOpen" x-cloak class="md:hidden pb-4 border-t border-brand-beige">
            <div class="flex flex-col gap-1 pt-3">
                <a href="{{ route('home') }}" class="px-3 py-2.5 rounded-lg text-brand-muted hover:bg-brand-beige/60 font-medium">{{ __('messages.nav_home') }}</a>
                <a href="{{ route('home') }}#reviews-list" @click="mobileOpen = false" class="px-3 py-2.5 rounded-lg text-brand-muted hover:bg-brand-beige/60 font-medium">{{ __('messages.nav_reviews') }}</a>
                <a href="{{ route('contact.index') }}" class="px-3 py-2.5 rounded-lg text-brand-muted hover:bg-brand-beige/60 font-medium">{{ __('messages.nav_contact') }}</a>
            </div>
            <div class="flex gap-2 mt-3 px-3">
                @foreach($locales as $code => $meta)
                    <a href="{{ route('language.switch', $code) }}"
                       class="flex-1 text-center py-2 text-sm rounded-lg {{ $currentLocale === $code ? 'bg-brand-gold text-white' : 'bg-brand-beige text-brand-muted' }}">
                        {{ $meta['flag'] }} {{ strtoupper($code) }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>
