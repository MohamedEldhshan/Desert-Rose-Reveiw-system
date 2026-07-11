@extends('layouts.app')

@section('title', __('messages.contact_title') . ' — ' . __('messages.site_title'))

@section('content')
    <x-page-banner :title="__('messages.contact_title')" :subtitle="__('messages.contact_subtitle')" />

    <section class="section-pad bg-brand-cream">
        <div class="section-inner">
            <x-contact-info-grid />
            <x-map-embed />
        </div>
    </section>
@endsection
