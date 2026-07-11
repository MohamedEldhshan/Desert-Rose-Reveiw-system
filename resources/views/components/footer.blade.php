@php
    $contact = config('desert_rose.contact');
    $isAr = app()->getLocale() === 'ar';
@endphp

<footer class="bg-brand-overlay text-brand-cream border-t border-brand-gold/30">
    <div class="section-inner py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/desert-rose-logo.png') }}" alt="" class="h-12 w-12 object-contain brightness-110">
                    <span class="font-display text-xl font-bold">{{ config('desert_rose.brand.name') }}</span>
                </div>
                <p class="mt-3 text-sm text-brand-beige/90 leading-relaxed">{{ __('messages.footer_tagline') }}</p>
            </div>

            <div>
                <h3 class="font-semibold text-brand-gold mb-3">{{ __('messages.footer_links') }}</h3>
                <ul class="space-y-2 text-sm text-brand-beige/90">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">{{ __('messages.nav_home') }}</a></li>
                    <li><a href="{{ route('home') }}#reviews-list" class="hover:text-white transition-colors">{{ __('messages.nav_reviews') }}</a></li>
                    <li><a href="{{ route('home') }}#write-review" class="hover:text-white transition-colors">{{ __('messages.review_form_title') }}</a></li>
                    <li><a href="{{ route('contact.index') }}" class="hover:text-white transition-colors">{{ __('messages.nav_contact') }}</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-brand-gold mb-3">{{ __('messages.footer_contact') }}</h3>
                <ul class="space-y-2 text-sm text-brand-beige/90">
                    <li>{{ $contact['phone'] }}</li>
                    <li>{{ $isAr ? $contact['address_ar'] : $contact['address_en'] }}</li>
                    <li>{{ $isAr ? $contact['hours_ar'] : $contact['hours_en'] }}</li>
                    <li>
                        <a href="https://wa.me/{{ $contact['whatsapp'] }}" target="_blank" rel="noopener" class="text-brand-gold hover:text-white transition-colors">WhatsApp</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-10 pt-6 border-t border-brand-gold/20 text-center text-xs text-brand-beige/70">
            &copy; {{ date('Y') }} {{ config('desert_rose.brand.name') }}. {{ __('messages.footer_rights') }}
        </div>
    </div>
</footer>
