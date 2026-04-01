{{-- ============================================== --}}
{{-- NAVBAR - مثبت + اللوجو جوه                     --}}
{{-- ============================================== --}}

<nav class="fixed w-full z-50 top-0 bg-white shadow-lg">

    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex items-center justify-between h-32">

            {{-- ===== Left Side - Navigation ===== --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="#home" class="px-4 py-2 text-stone-600 hover:text-amber-600 hover:bg-amber-50 rounded-lg font-medium transition-all">
                    Home
                </a>
                <a href="#gallery" class="px-4 py-2 text-stone-600 hover:text-amber-600 hover:bg-amber-50 rounded-lg font-medium transition-all">
                    Gallery
                </a>
            </div>

            {{-- ===== CENTER - LOGO ===== --}}

            <a href="/" class="flex flex-col items-center group">
                <div class="relative">
                    <div class="h-16 w-16 rounded-full bg-gradient-to-br from-amber-400 via-amber-500 to-amber-600 p-1 shadow-lg group-hover:shadow-xl group-hover:shadow-amber-400/30 transition-all duration-300 group-hover:scale-105">
                        <div class="h-full w-full rounded-full bg-white flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/desert-rose-logo.png') }}"
                                class="h-12 w-12 object-contain"
                                alt="Desert Rose Logo" />
                        </div>
                    </div>
                </div>
                {{-- اسم البراند --}}
                <div class="text-center mt-1">
                    <span class="text-sm font-bold text-stone-800">Desert Rose</span>
                    <span class="block text-xs text-amber-600 font-arabic">زهرة الصحراء</span>
                </div>
            </a>

            {{-- ===== Right Side - Navigation ===== --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="#reviews" class="px-4 py-2 text-stone-600 hover:text-amber-600 hover:bg-amber-50 rounded-lg font-medium transition-all">
                    Reviews
                </a>
                <a href="#contact" class="px-5 py-2.5 text-white bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 rounded-full font-medium shadow-md hover:shadow-lg transition-all">
                    Contact
                </a>
            </div>

            {{-- ===== Mobile Menu Button ===== --}}
            <button type="button"
                class="md:hidden p-2 text-stone-600 hover:bg-stone-100 rounded-lg"
                data-collapse-toggle="mobile-menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="hidden md:hidden bg-white border-t" id="mobile-menu">
        <div class="px-4 py-4 space-y-2">
            <a href="#home" class="block px-4 py-3 text-stone-600 hover:bg-amber-50 rounded-lg">Home</a>
            <a href="#reviews" class="block px-4 py-3 text-stone-600 hover:bg-amber-50 rounded-lg">Reviews</a>
            <a href="#reviews" class="block px-4 py-3 text-stone-600 hover:bg-amber-50 rounded-lg">Reviews</a>
            <a href="#contact" class="block px-4 py-3 text-white bg-amber-500 rounded-lg text-center">Contact</a>
        </div>
    </div>
</nav>

{{--
    ✏️ SPACER مهم جداً!
    لازم يكون نفس ارتفاع الـ Navbar
    h-32 = 128px (نفس h-32 اللي فوق)
--}}
<div class="h-32"></div>