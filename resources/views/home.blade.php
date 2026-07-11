@extends('layouts.app')

@section('title', __('messages.site_title') . ' — Hurghada')

@section('content')
    <x-hero-carousel />
    <x-trust-points />
    <x-reviews-summary :stats="$stats" />
    <x-review-form />
    <x-reviews-list :reviews="$reviews" :pending-reviews="$pendingReviews" />
@endsection
