@extends('layouts.app')

@section('title', $herb->name . ' | Desert Rose')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-amber-50 to-white pt-32 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Breadcrumb --}}
        <nav class="mb-8" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="/" class="text-stone-600 hover:text-amber-600">Home</a>
                </li>
                <li>
                    <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
                <li>
                    <a href="{{ route('herbs.index') }}" class="text-stone-600 hover:text-amber-600">Herbs</a>
                </li>
                <li>
                    <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
                <li class="text-stone-900 font-medium">{{ $herb->name }}</li>
            </ol>
        </nav>

        {{-- Herb Details --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-stone-200">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                
                {{-- Image Section --}}
                <div class="bg-white rounded-xl p-8 flex items-center justify-center">
                    <img src="{{ str_starts_with($herb->image, 'http') ? $herb->image : asset('images/herbs/' . $herb->image) }}"
                         alt="{{ $herb->name }}"
                         class="max-h-[500px] max-w-full object-contain"
                         onerror="this.src='https://via.placeholder.com/500?text={{ urlencode($herb->name) }}'">
                </div>

                {{-- Details Section --}}
                <div class="flex flex-col">
                    {{-- Category Badge --}}
                    <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 text-sm font-medium rounded-full mb-4 w-fit">
                        {{ ucfirst($herb->category) }}
                    </span>

                    {{-- Name --}}
                    <h1 class="text-4xl font-bold text-stone-900 mb-2">
                        {{ $herb->name }}
                    </h1>

                    {{-- Description --}}
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold text-stone-900 mb-2">Description</h2>
                        <p class="text-stone-600 leading-relaxed">
                            {{ $herb->description }}
                        </p>
                    </div>

                    {{-- Benefits --}}
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold text-stone-900 mb-2">Benefits</h2>
                        <div class="text-stone-600 leading-relaxed whitespace-pre-line">
                            {{ $herb->benefits }}
                        </div>
                    </div>

                    {{-- Usage --}}
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold text-stone-900 mb-2">How to Use</h2>
                        <div class="text-stone-600 leading-relaxed whitespace-pre-line">
                            {{ $herb->usage }}
                        </div>
                    </div>

                    {{-- CTA Button --}}
                    <div class="mt-auto">
                        <a href="#contact" class="inline-flex items-center justify-center w-full px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-amber-500 to-amber-600 rounded-xl hover:from-amber-600 hover:to-amber-700 transition-all shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Us to Order
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Herbs --}}
        @if($relatedHerbs->count() > 0)
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-stone-900 mb-8 text-center">
                Related Products
                <span class="text-amber-600 font-arabic block mt-2">منتجات ذات صلة</span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedHerbs as $relatedHerb)
                <a href="{{ route('herbs.show', $relatedHerb->slug) }}" class="group">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-stone-200 hover:shadow-2xl hover:border-amber-300 transition-all duration-300">
                        <div class="bg-white p-6 aspect-square flex items-center justify-center">
                            <img src="{{ str_starts_with($relatedHerb->image, 'http') ? $relatedHerb->image : asset('images/herbs/' . $relatedHerb->image) }}"
                                 alt="{{ $relatedHerb->name }}"
                                 class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300"
                                 onerror="this.src='https://via.placeholder.com/200?text={{ urlencode($relatedHerb->name) }}'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-stone-900 group-hover:text-amber-600 transition-colors">
                                {{ $relatedHerb->name }}
                            </h3>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
