{{-- ============================================== --}}
{{-- REVIEW FORM SECTION                            --}}
{{-- ============================================== --}}

<section id="contact" class="py-16 lg:py-20 bg-white">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-2 bg-stone-100 text-stone-700 rounded-full text-sm font-semibold mb-4">
                ✍️ Share Your Experience
            </span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-stone-900 mb-3">
                Write a Review
                <span class="text-amber-600 font-arabic ms-2">اكتب مراجعة</span>
            </h2>
            <p class="text-stone-600 text-lg">We'd love to hear about your experience with our products</p>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
        <div class="flex items-center gap-3 p-4 mb-6 text-green-800 bg-green-50 rounded-xl border border-green-200" role="alert">
            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <p class="font-semibold">Thank you!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        {{-- Error Alert --}}
        @if($errors->any())
        <div class="p-4 mb-6 text-red-800 bg-red-50 rounded-xl border border-red-200" role="alert">
            <div class="flex items-center gap-2 mb-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                <span class="font-semibold">Please fix the following errors:</span>
            </div>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Review Form --}}
        <form action="{{ route('reviews.store') }}"
            method="POST"
            class="bg-gradient-to-br from-stone-50 to-stone-100 p-6 md:p-8 lg:p-10 rounded-3xl shadow-xl border border-stone-200">
            @csrf

            {{-- Honeypot (Spam Protection) --}}
            <div class="hidden" aria-hidden="true">
                <input type="text" name="website" tabindex="-1" autocomplete="off">
            </div>

            {{-- Row 1: Name & Email --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-5">

                {{-- Name Field --}}
                <div>
                    <label for="name" class="block mb-2 text-sm font-semibold text-stone-800">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <svg class="w-5 h-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full ps-12 pe-4 py-3.5 bg-white border border-stone-300 rounded-xl text-stone-900 placeholder-stone-400 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all @error('name') border-red-500 ring-1 ring-red-500 @enderror"
                            placeholder="Enter your full name"
                            required>
                    </div>
                    @error('name')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email Field --}}
                <div>
                    <label for="email" class="block mb-2 text-sm font-semibold text-stone-800">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <svg class="w-5 h-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full ps-12 pe-4 py-3.5 bg-white border border-stone-300 rounded-xl text-stone-900 placeholder-stone-400 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all @error('email') border-red-500 ring-1 ring-red-500 @enderror"
                            placeholder="your.email@example.com"
                            required>
                    </div>
                    @error('email')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Row 2: Phone & Nationality --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-5">

                {{-- Phone Field --}}
                <div>
                    <label for="phone" class="block mb-2 text-sm font-semibold text-stone-800">
                        Phone Number <span class="text-stone-400 font-normal">(Optional)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <svg class="w-5 h-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <input type="tel"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="w-full ps-12 pe-4 py-3.5 bg-white border border-stone-300 rounded-xl text-stone-900 placeholder-stone-400 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all"
                            placeholder="+971 50 123 4567">
                    </div>
                </div>

                {{-- Nationality Field --}}
                <div>
                    <label for="nationality" class="block mb-2 text-sm font-semibold text-stone-800">
                        Nationality <span class="text-stone-400 font-normal">(Optional)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <svg class="w-5 h-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <select id="nationality"
                            name="nationality"
                            class="w-full ps-12 pe-4 py-3.5 bg-white border border-stone-300 rounded-xl text-stone-900 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all appearance-none cursor-pointer">
                            <option value="">Select your country</option>
                            <option value="UAE" {{ old('nationality') == 'UAE' ? 'selected' : '' }}>🇦🇪 United Arab Emirates</option>
                            <option value="Saudi Arabia" {{ old('nationality') == 'Saudi Arabia' ? 'selected' : '' }}>🇸🇦 Saudi Arabia</option>
                            <option value="Egypt" {{ old('nationality') == 'Egypt' ? 'selected' : '' }}>🇪🇬 Egypt</option>
                            <option value="Jordan" {{ old('nationality') == 'Jordan' ? 'selected' : '' }}>🇯🇴 Jordan</option>
                            <option value="Kuwait" {{ old('nationality') == 'Kuwait' ? 'selected' : '' }}>🇰🇼 Kuwait</option>
                            <option value="Qatar" {{ old('nationality') == 'Qatar' ? 'selected' : '' }}>🇶🇦 Qatar</option>
                            <option value="Bahrain" {{ old('nationality') == 'Bahrain' ? 'selected' : '' }}>🇧🇭 Bahrain</option>
                            <option value="Oman" {{ old('nationality') == 'Oman' ? 'selected' : '' }}>🇴🇲 Oman</option>
                            <option value="Lebanon" {{ old('nationality') == 'Lebanon' ? 'selected' : '' }}>🇱🇧 Lebanon</option>
                            <option value="Morocco" {{ old('nationality') == 'Morocco' ? 'selected' : '' }}>🇲🇦 Morocco</option>
                            <option value="Iraq" {{ old('nationality') == 'Iraq' ? 'selected' : '' }}>🇮🇶 Iraq</option>
                            <option value="Syria" {{ old('nationality') == 'Syria' ? 'selected' : '' }}>🇸🇾 Syria</option>
                            <option value="Palestine" {{ old('nationality') == 'Palestine' ? 'selected' : '' }}>🇵🇸 Palestine</option>
                            <option value="India" {{ old('nationality') == 'India' ? 'selected' : '' }}>🇮🇳 India</option>
                            <option value="Pakistan" {{ old('nationality') == 'Pakistan' ? 'selected' : '' }}>🇵🇰 Pakistan</option>
                            <option value="UK" {{ old('nationality') == 'UK' ? 'selected' : '' }}>🇬🇧 United Kingdom</option>
                            <option value="USA" {{ old('nationality') == 'USA' ? 'selected' : '' }}>🇺🇸 United States</option>
                            <option value="Other" {{ old('nationality') == 'Other' ? 'selected' : '' }}>🌍 Other</option>
                        </select>
                        <div class="absolute inset-y-0 end-0 flex items-center pe-4 pointer-events-none">
                            <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Rating Field --}}
            <div class="mb-5">
                <label class="block mb-3 text-sm font-semibold text-stone-800">
                    Your Rating <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center gap-1" id="star-rating">
                    @for($i = 1; $i <= 5; $i++)
                        <button type="button"
                        class="star-btn p-1 text-stone-300 hover:text-amber-400 transition-all duration-200 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-amber-300 rounded"
                        data-rating="{{ $i }}"
                        aria-label="{{ $i }} star">
                        <svg class="w-9 h-9 md:w-10 md:h-10" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        </button>
                        @endfor
                        <span id="rating-text" class="ms-4 text-sm text-stone-500 font-medium">Click to rate</span>
                </div>
                <input type="hidden" name="rating" id="rating-input" value="{{ old('rating') }}" required>
                @error('rating')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Comment Field --}}
            <div class="mb-6">
                <label for="comment" class="block mb-2 text-sm font-semibold text-stone-800">
                    Your Review <span class="text-red-500">*</span>
                </label>
                <textarea id="comment"
                    name="comment"
                    rows="5"
                    class="w-full px-4 py-3.5 bg-white border border-stone-300 rounded-xl text-stone-900 placeholder-stone-400 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all resize-none @error('comment') border-red-500 ring-1 ring-red-500 @enderror"
                    placeholder="Share your experience with our products and services. What did you like? How was the quality? Would you recommend us?"
                    required
                    minlength="10"
                    maxlength="1000">{{ old('comment') }}</textarea>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-xs text-stone-400">Minimum 10 characters</span>
                    <span class="text-xs text-stone-400">
                        <span id="char-count" class="font-medium">0</span>/1000
                    </span>
                </div>
                @error('comment')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button (Black Theme) --}}
            <button type="submit"
                id="submit-btn"
                class="w-full py-4 px-6 bg-stone-900 text-white font-bold text-lg rounded-xl hover:bg-stone-800 focus:ring-4 focus:ring-stone-300 active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-3 shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
                <span>Submit Review</span>
            </button>

            {{-- Privacy Note --}}
            <p class="text-xs text-stone-400 text-center mt-5 leading-relaxed">
                By submitting this review, you agree that your feedback may be published on our website.
                Your email will never be shared publicly. Reviews are subject to approval.
            </p>

        </form>

    </div>
</section>