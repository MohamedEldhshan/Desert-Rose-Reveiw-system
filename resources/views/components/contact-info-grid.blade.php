@php
    $contact = config('desert_rose.contact');
    $isAr = app()->getLocale() === 'ar';
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <a href="https://wa.me/{{ $contact['whatsapp'] }}" target="_blank" rel="noopener"
       class="group rounded-2xl bg-white border border-brand-beige p-6 shadow-card hover:shadow-elevated hover:border-[#25D366]/40 transition-all">
        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-[#25D366] group-hover:bg-green-200 transition-colors">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
        </div>
        <h3 class="mt-4 font-semibold text-brand-ink">{{ __('messages.contact_whatsapp') }}</h3>
        <p class="mt-1 text-sm text-brand-muted" dir="ltr">{{ $contact['phone'] }}</p>
        <span class="mt-3 inline-block text-sm font-medium text-[#25D366]">{{ __('messages.contact_chat') }} →</span>
    </a>

    <a href="tel:{{ $contact['phone_tel'] }}"
       class="group rounded-2xl bg-white border border-brand-beige p-6 shadow-card hover:shadow-elevated transition-all">
        <div class="w-12 h-12 rounded-full bg-brand-gold/15 flex items-center justify-center text-brand-gold">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        </div>
        <h3 class="mt-4 font-semibold text-brand-ink">{{ __('messages.contact_phone') }}</h3>
        <p class="mt-1 text-sm text-brand-muted" dir="ltr">{{ $contact['phone'] }}</p>
        <span class="mt-3 inline-block text-sm font-medium text-brand-gold">{{ __('messages.contact_call') }} →</span>
    </a>

    <div class="rounded-2xl bg-white border border-brand-beige p-6 shadow-card sm:col-span-2 lg:col-span-1">
        <div class="w-12 h-12 rounded-full bg-brand-gold/15 flex items-center justify-center text-brand-gold">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <h3 class="mt-4 font-semibold text-brand-ink">{{ __('messages.contact_address') }}</h3>
        <p class="mt-2 text-sm text-brand-muted leading-relaxed">{{ $isAr ? $contact['address_ar'] : $contact['address_en'] }}</p>
    </div>

    <div class="rounded-2xl bg-white border border-brand-beige p-6 shadow-card">
        <div class="w-12 h-12 rounded-full bg-brand-gold/15 flex items-center justify-center text-brand-gold">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3 class="mt-4 font-semibold text-brand-ink">{{ __('messages.contact_hours') }}</h3>
        <p class="mt-2 text-sm text-brand-muted">{{ $isAr ? $contact['hours_ar'] : $contact['hours_en'] }}</p>
    </div>
</div>
