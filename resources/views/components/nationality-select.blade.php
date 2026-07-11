@props(['selected' => ''])

@php
    $countries = [
        'Egypt', 'Germany', 'United Kingdom', 'United States', 'Russia', 'Ukraine',
        'France', 'Italy', 'Poland', 'Saudi Arabia', 'UAE', 'Kuwait', 'Netherlands',
        'Belgium', 'Switzerland', 'Austria', 'Czech Republic', 'Romania', 'Hungary',
        'Spain', 'Portugal', 'Turkey', 'Greece', 'India', 'China', 'Japan', 'South Korea',
        'Australia', 'Canada', 'Brazil', 'Morocco', 'Tunisia', 'Algeria', 'Sudan',
        'Other',
    ];
@endphp

<select {{ $attributes->merge(['class' => 'w-full rounded-lg border border-brand-beige bg-white px-4 py-3 text-sm text-brand-ink focus:ring-2 focus:ring-brand-gold focus:border-brand-gold']) }}>
    <option value="">{{ __('messages.nationality_placeholder') }}</option>
    @foreach($countries as $country)
        <option value="{{ $country }}" @selected(old('nationality', $selected) === $country)>{{ $country }}</option>
    @endforeach
</select>
