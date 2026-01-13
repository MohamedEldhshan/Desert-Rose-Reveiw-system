{{-- ============================================== --}}
{{-- TESTIMONIALS SECTION (Dynamic from Database)  --}}
{{-- ============================================== --}}

<section id="reviews" class="py-16 lg:py-20 bg-gradient-to-b from-amber-50 to-stone-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold mb-4">
                ⭐ Testimonials
            </span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-stone-900 mb-3">
                What Our Customers Say
                <span class="text-amber-600 font-arabic ms-2">آراء عملائنا</span>
            </h2>
            <p class="text-stone-600 max-w-2xl mx-auto text-lg">
                Real reviews from our valued customers around the world
            </p>
        </div>

        {{-- Check if reviews exist --}}
        @if(isset($featuredReviews) && $featuredReviews->count() > 0)

        {{-- Reviews Carousel --}}
        <div id="testimonial-carousel" class="relative" data-carousel="slide" data-carousel-interval="6000">

            {{-- Carousel Wrapper --}}
            <div class="relative overflow-hidden rounded-2xl min-h-[400px] md:min-h-[350px]">

                @foreach($featuredReviews as $index => $review)
                <div class="{{ $index !== 0 ? 'hidden' : '' }} duration-700 ease-in-out" data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
                    <div class="max-w-3xl mx-auto px-4">
                        <div class="bg-white rounded-3xl shadow-xl p-6 md:p-10 relative">

                            {{-- Quote Icon --}}
                            <div class="absolute -top-5 start-6 md:start-10 w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                </svg>
                            </div>

                            {{-- Rating Stars --}}
                            <div class="flex justify-center gap-1 mb-6 pt-6">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <=$review->rating)
                                    <svg class="w-6 h-6 md:w-7 md:h-7 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    @else
                                    <svg class="w-6 h-6 md:w-7 md:h-7 text-stone-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    @endif
                                    @endfor
                            </div>

                            {{-- Review Comment --}}
                            <blockquote class="text-lg md:text-xl lg:text-2xl text-stone-700 text-center mb-8 italic leading-relaxed">
                                "{{ $review->comment }}"
                            </blockquote>

                            {{-- Author Info --}}
                            <div class="flex flex-col items-center">
                                {{-- Avatar --}}
                                <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-amber-100 to-amber-200 rounded-full flex items-center justify-center mb-4 shadow-inner">
                                    <span class="text-2xl md:text-3xl font-bold text-amber-600">
                                        {{ strtoupper(substr($review->name, 0, 1)) }}
                                    </span>
                                </div>

                                {{-- Name --}}
                                <p class="text-lg md:text-xl font-bold text-stone-900">{{ $review->name }}</p>

                                {{-- Nationality --}}
                                @if($review->nationality)
                                <p class="text-sm md:text-base text-amber-600 font-medium">{{ $review->nationality }}</p>
                                @endif

                                {{-- Date --}}
                                <p class="text-xs md:text-sm text-stone-400 mt-2">
                                    {{ $review->created_at->diffForHumans() }}
                                </p>

                                {{-- Verified Badge --}}
                                <span class="inline-flex items-center gap-1 mt-3 px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Verified Customer
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            {{-- Carousel Indicators --}}
            <div class="flex justify-center gap-2 mt-8">
                @foreach($featuredReviews as $index => $review)
                <button type="button"
                    class="h-2 rounded-full transition-all duration-300 {{ $index === 0 ? 'w-8 bg-amber-600' : 'w-2 bg-stone-300 hover:bg-amber-400' }}"
                    aria-label="Review {{ $index + 1 }}"
                    data-carousel-slide-to="{{ $index }}">
                </button>
                @endforeach
            </div>

            {{-- Carousel Controls --}}
            <button type="button"
                class="absolute top-1/2 -translate-y-1/2 start-0 md:-start-4 lg:-start-6 z-30 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white shadow-xl flex items-center justify-center text-stone-600 hover:text-amber-600 hover:shadow-2xl transition-all duration-300"
                data-carousel-prev>
                <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button"
                class="absolute top-1/2 -translate-y-1/2 end-0 md:-end-4 lg:-end-6 z-30 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white shadow-xl flex items-center justify-center text-stone-600 hover:text-amber-600 hover:shadow-2xl transition-all duration-300"
                data-carousel-next>
                <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="sr-only">Next</span>
            </button>

        </div>

        @else

        {{-- No Reviews State --}}
        <div class="max-w-lg mx-auto text-center py-16 bg-white rounded-3xl shadow-lg">
            <div class="w-20 h-20 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-stone-900 mb-2">No Reviews Yet</h3>
            <p class="text-stone-500 mb-6">Be the first to share your experience with us!</p>
            <a href="#contact" class="inline-flex items-center px-6 py-3 bg-amber-500 text-white font-semibold rounded-full hover:bg-amber-600 transition">
                Write a Review
                <svg class="w-4 h-4 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        @endif

    </div>
</section>