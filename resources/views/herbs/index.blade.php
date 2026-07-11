@extends('layouts.app')

@section('title', 'Herbs Catalog | Desert Rose Gifts')

@section('content')
<section class="py-12 sm:py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 text-center">{{ __('messages.nav_herbs') }}</h1>

    <form method="GET" action="{{ route('herbs.index') }}" class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-end">
      <div>
        <label class="text-sm text-gray-700">Search</label>
        <input type="text" name="search" value="{{ request('search') }}" class="w-full mt-1 rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500">
      </div>
      <div class="relative">
        <input type="hidden" name="category" id="selectedCategory" value="{{ request('category') }}">
        <button id="categoryBtn" data-dropdown-toggle="categoryMenu" type="button" class="min-h-[44px] inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:ring-2 focus:ring-amber-500 transition-colors w-full sm:w-auto">
          <span id="selectedCategoryLabel">{{ request('category') ? ucfirst(request('category')) : 'All Categories' }}</span>
          <svg class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div id="categoryMenu" class="z-20 hidden absolute mt-1 bg-white rounded-xl shadow-lg border border-gray-100 w-44 py-1">
          @foreach(['' => 'All Categories', 'herbs' => 'Herbs', 'spices' => 'Spices', 'oils' => 'Oils', 'blends' => 'Blends'] as $value => $cat)
          <button type="button" onclick="selectCategory('{{ $value }}','{{ $cat }}')" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-colors">{{ $cat }}</button>
          @endforeach
        </div>
      </div>
      <button type="submit" class="min-h-[44px] rounded-lg bg-amber-500 px-4 py-2.5 text-white hover:bg-amber-600">Filter</button>
    </form>

    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($herbs as $herb)
      <a href="{{ route('herbs.show', $herb->slug) }}" class="w-full rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <div class="relative overflow-hidden bg-white rounded-t-xl" style="aspect-ratio: 4/3;">
          <img src="{{ $herb->image_url ?? (str_starts_with($herb->image, 'http') ? $herb->image : asset('images/herbs/' . $herb->image)) }}" alt="{{ $herb->name }}" loading="lazy" class="absolute inset-0 w-full h-full object-contain p-3 bg-white">
        </div>
        <div class="p-4">
          <h3 class="text-base md:text-lg font-semibold text-gray-900">{{ $herb->name }}</h3>
          <p class="mt-1 text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($herb->description, 90) }}</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

@push('scripts')
<script>
function selectCategory(value, name) {
  document.getElementById('selectedCategory').value = value;
  document.getElementById('selectedCategoryLabel').textContent = name;
}
</script>
@endpush
@endsection
