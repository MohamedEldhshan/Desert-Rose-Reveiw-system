{{-- ============================================== --}}
{{-- HERO / WELCOME SECTION                         --}}
{{-- ============================================== --}}

<section id="home" class="relative bg-gradient-to-br from-stone-900 via-stone-800 to-amber-900 py-20 lg:py-28 overflow-hidden">

    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-5">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="hero-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="2" fill="white" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#hero-pattern)" />
        </svg>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">

            {{-- Logo --}}
            <div class="mb-8 animate-fade-in">
                <img src="{{ asset('images/logo.png') }}"
                    alt="Desert Rose Logo"
                    class="h-28 md:h-36 lg:h-40 w-auto mx-auto drop-shadow-2xl"
                    onerror="this.src='https://via.placeholder.com/150x150?text=Logo'">
            </div>

            {{-- Welcome Badge --}}
            <div class="mb-6">
                <span class="inline-block px-5 py-2 bg-amber-500/20 text-amber-400 rounded-full text-sm font-semibold border border-amber-500/30 backdrop-blur-sm">
                    ✨ Welcome to Desert Rose ✨
                </span>
            </div>

            {{-- Main Title --}}
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-4 drop-shadow-lg">
                Desert Rose
            </h1>
            <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold text-amber-400 font-arabic mb-6">
                زهرة الصحراء
            </h2>

            {{-- Slogan --}}
            <div class="mb-8">
                <p class="text-xl md:text-2xl text-stone-300 mb-2">
                    Where Tradition Meets Quality
                </p>
                <p class="text-lg md:text-xl text-amber-400/80 font-arabic">
                    حيث تلتقي الأصالة بالجودة
                </p>
            </div>

            {{-- Description --}}
            <p class="text-base md:text-lg text-stone-400 mb-10 max-w-2xl mx-auto leading-relaxed">
                Discover the finest selection of authentic herbs, premium spices,
                natural oils, and traditional remedies from the heart of the Arabian desert.
                <span class="text-amber-400">Quality you can trust, tradition you can taste.</span>
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="#gallery"
                    class="group inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-stone-900 bg-amber-400 rounded-full hover:bg-amber-300 focus:ring-4 focus:ring-amber-400/50 transition-all duration-300 shadow-lg hover:shadow-amber-400/30 hover:scale-105">
                    <svg class="w-5 h-5 me-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    View Gallery
                </a>
                <a href="#reviews"
                    class="group inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white border-2 border-stone-500 rounded-full hover:bg-white hover:text-stone-900 hover:border-white focus:ring-4 focus:ring-white/30 transition-all duration-300 hover:scale-105">
                    <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    Customer Reviews
                </a>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-3 gap-6 max-w-md mx-auto">
                <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm">
                    <p class="text-2xl md:text-3xl font-bold text-amber-400">
                        {{ isset($stats) ? $stats['total_reviews'] : '500' }}+
                    </p>
                    <p class="text-xs md:text-sm text-stone-400 mt-1">Happy Customers</p>
                </div>
                <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm border-x border-stone-700/50">
                    <p class="text-2xl md:text-3xl font-bold text-amber-400">
                        {{ isset($stats) ? number_format($stats['average_rating'], 1) : '4.9' }}
                    </p>
                    <p class="text-xs md:text-sm text-stone-400 mt-1">Avg Rating</p>
                </div>
                <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm">
                    <p class="text-2xl md:text-3xl font-bold text-amber-400">100%</p>
                    <p class="text-xs md:text-sm text-stone-400 mt-1">Authentic</p>
                </div>
            </div>

        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <a href="#gallery" class="text-stone-500 hover:text-amber-400 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </a>
    </div>

</section>