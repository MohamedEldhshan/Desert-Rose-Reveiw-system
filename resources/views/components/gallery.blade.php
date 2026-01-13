{{-- ============================================== --}}
{{-- GALLERY CAROUSEL SECTION                       --}}
{{-- ============================================== --}}

<section id="gallery" class="py-16 lg:py-20 bg-stone-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold mb-4">
                📸 Our Store
            </span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-stone-900 mb-3">
                Gallery
                <span class="text-amber-600 font-arabic ms-2">معرض الصور</span>
            </h2>
            <p class="text-stone-600 max-w-2xl mx-auto text-lg">
                Take a virtual tour of our store and discover our premium selection of herbs and spices
            </p>
        </div>

        {{-- Main Carousel --}}
        <div id="gallery-carousel" class="relative" data-carousel="slide" data-carousel-interval="5000">

            {{-- Carousel Wrapper --}}
            <div class="relative h-64 sm:h-80 md:h-96 lg:h-[550px] overflow-hidden rounded-2xl shadow-2xl">

                {{-- Slide 1 --}}
                <div class="duration-1000 ease-in-out absolute inset-0" data-carousel-item="active">
                    <img src="{{ asset('images/gallery/store-1.jpg') }}"
                        class="absolute block w-full h-full object-cover"
                        alt="Store Interior"
                        onerror="this.src='https://images.unsplash.com/photo-1596040033229-a9821ebd058d?w=1200'">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-900/80 via-stone-900/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="inline-block px-3 py-1 bg-amber-500 text-xs font-bold rounded-full mb-2">FEATURED</span>
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold">Our Main Store</h3>
                        <p class="text-stone-300 text-sm md:text-base mt-1">Premium herbs & spices collection in the heart of the city</p>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="hidden duration-1000 ease-in-out absolute inset-0" data-carousel-item>
                    <img src="{{ asset('images/gallery/store-2.jpg') }}"
                        class="absolute block w-full h-full object-cover"
                        alt="Spice Collection"
                        onerror="this.src='https://images.unsplash.com/photo-1532336414038-cf19250c5757?w=1200'">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-900/80 via-stone-900/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="inline-block px-3 py-1 bg-red-500 text-xs font-bold rounded-full mb-2">BEST SELLER</span>
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold">Spice Collection</h3>
                        <p class="text-stone-300 text-sm md:text-base mt-1">Hand-picked from the finest sources around the world</p>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div class="hidden duration-1000 ease-in-out absolute inset-0" data-carousel-item>
                    <img src="{{ asset('images/gallery/store-3.jpg') }}"
                        class="absolute block w-full h-full object-cover"
                        alt="Fresh Herbs"
                        onerror="this.src='https://images.unsplash.com/photo-1515586000433-45406d8e6662?w=1200'">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-900/80 via-stone-900/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="inline-block px-3 py-1 bg-green-500 text-xs font-bold rounded-full mb-2">ORGANIC</span>
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold">Fresh Herbs</h3>
                        <p class="text-stone-300 text-sm md:text-base mt-1">100% organic and naturally sourced from local farms</p>
                    </div>
                </div>

                {{-- Slide 4 --}}
                <div class="hidden duration-1000 ease-in-out absolute inset-0" data-carousel-item>
                    <img src="{{ asset('images/gallery/store-4.jpg') }}"
                        class="absolute block w-full h-full object-cover"
                        alt="Traditional Blends"
                        onerror="this.src='https://images.unsplash.com/photo-1509358271058-aedd22b89c91?w=1200'">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-900/80 via-stone-900/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="inline-block px-3 py-1 bg-purple-500 text-xs font-bold rounded-full mb-2">TRADITIONAL</span>
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold">Traditional Blends</h3>
                        <p class="text-stone-300 text-sm md:text-base mt-1">Secret recipes passed down through generations</p>
                    </div>
                </div>

                {{-- Slide 5 --}}
                <div class="hidden duration-1000 ease-in-out absolute inset-0" data-carousel-item>
                    <img src="{{ asset('images/gallery/store-5.jpg') }}"
                        class="absolute block w-full h-full object-cover"
                        alt="Expert Service"
                        onerror="this.src='https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1200'">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-900/80 via-stone-900/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="inline-block px-3 py-1 bg-blue-500 text-xs font-bold rounded-full mb-2">SERVICE</span>
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold">Expert Service</h3>
                        <p class="text-stone-300 text-sm md:text-base mt-1">Personalized recommendations from our experienced team</p>
                    </div>
                </div>

            </div>

            {{-- Slider Indicators --}}
            <div class="absolute z-30 flex -translate-x-1/2 bottom-20 md:bottom-24 left-1/2 space-x-2">
                <button type="button" class="w-3 h-3 rounded-full bg-white shadow-lg" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>

            {{-- Slider Controls --}}
            <button type="button"
                class="absolute top-1/2 -translate-y-1/2 start-2 md:start-4 z-30 flex items-center justify-center w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/90 hover:bg-white shadow-xl transition-all duration-300 group"
                data-carousel-prev>
                <svg class="w-4 h-4 md:w-5 md:h-5 text-stone-800 rtl:rotate-180 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button"
                class="absolute top-1/2 -translate-y-1/2 end-2 md:end-4 z-30 flex items-center justify-center w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/90 hover:bg-white shadow-xl transition-all duration-300 group"
                data-carousel-next>
                <svg class="w-4 h-4 md:w-5 md:h-5 text-stone-800 rtl:rotate-180 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="sr-only">Next</span>
            </button>

        </div>

        {{-- Thumbnail Strip --}}
        <div class="flex justify-center gap-2 md:gap-3 mt-6 overflow-x-auto pb-2 px-4">
            <button class="gallery-thumb flex-shrink-0 w-16 h-12 md:w-24 md:h-16 rounded-lg overflow-hidden border-2 border-amber-500 shadow-md hover:scale-105 transition-transform" data-slide="0">
                <img src="{{ asset('images/gallery/store-1.jpg') }}" class="w-full h-full object-cover" alt="Thumb 1" onerror="this.src='https://images.unsplash.com/photo-1596040033229-a9821ebd058d?w=200'">
            </button>
            <button class="gallery-thumb flex-shrink-0 w-16 h-12 md:w-24 md:h-16 rounded-lg overflow-hidden border-2 border-transparent hover:border-amber-500 shadow-md hover:scale-105 transition-all" data-slide="1">
                <img src="{{ asset('images/gallery/store-2.jpg') }}" class="w-full h-full object-cover" alt="Thumb 2" onerror="this.src='https://images.unsplash.com/photo-1532336414038-cf19250c5757?w=200'">
            </button>
            <button class="gallery-thumb flex-shrink-0 w-16 h-12 md:w-24 md:h-16 rounded-lg overflow-hidden border-2 border-transparent hover:border-amber-500 shadow-md hover:scale-105 transition-all" data-slide="2">
                <img src="{{ asset('images/gallery/store-3.jpg') }}" class="w-full h-full object-cover" alt="Thumb 3" onerror="this.src='https://images.unsplash.com/photo-1515586000433-45406d8e6662?w=200'">
            </button>
            <button class="gallery-thumb flex-shrink-0 w-16 h-12 md:w-24 md:h-16 rounded-lg overflow-hidden border-2 border-transparent hover:border-amber-500 shadow-md hover:scale-105 transition-all" data-slide="3">
                <img src="{{ asset('images/gallery/store-4.jpg') }}" class="w-full h-full object-cover" alt="Thumb 4" onerror="this.src='https://images.unsplash.com/photo-1509358271058-aedd22b89c91?w=200'">
            </button>
            <button class="gallery-thumb flex-shrink-0 w-16 h-12 md:w-24 md:h-16 rounded-lg overflow-hidden border-2 border-transparent hover:border-amber-500 shadow-md hover:scale-105 transition-all" data-slide="4">
                <img src="{{ asset('images/gallery/store-5.jpg') }}" class="w-full h-full object-cover" alt="Thumb 5" onerror="this.src='https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=200'">
            </button>
        </div>

    </div>
</section>