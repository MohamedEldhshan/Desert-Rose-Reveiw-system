@extends('layouts.app')

@section('title', 'Reviews | Desert Rose | زهرة الصحراء')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-stone-900 via-stone-800 to-amber-900 py-16 lg:py-24 overflow-hidden">
    
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

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">
            Customer Reviews
        </h1>
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-amber-400 font-arabic mb-6">
            آراء العملاء
        </h2>
        <p class="text-xl text-stone-300 max-w-2xl mx-auto">
            Read what our customers have to say about their experience with Desert Rose
        </p>
    </div>
</section>

{{-- Review Form Section --}}
@include('components.review-form')

{{-- Reviews List Section --}}
<section class="py-16 lg:py-20 bg-stone-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold mb-4">
                ⭐ Customer Feedback
            </span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-stone-900 mb-3">
                Recent Reviews
                <span class="text-amber-600 font-arabic ms-2">أحدث المراجعات</span>
            </h2>
            <p class="text-stone-600 text-lg max-w-2xl mx-auto">
                Real experiences from real customers who trust Desert Rose for their herbal needs
            </p>
        </div>

        {{-- Reviews Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            {{-- Sample Review 1 --}}
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center">
                        <span class="text-amber-600 font-bold text-lg">A</span>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-semibold text-stone-900">Ahmed Mohamed</h4>
                        <div class="flex items-center">
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-sm text-stone-500">2 days ago</span>
                        </div>
                    </div>
                </div>
                <p class="text-stone-600 leading-relaxed">
                    Excellent quality herbs and spices! The saffron I purchased was authentic and the aroma is incredible. 
                    Customer service was also very helpful in recommending the right products for my needs.
                </p>
                <div class="mt-4 pt-4 border-t border-stone-100">
                    <span class="inline-block px-2 py-1 bg-amber-50 text-amber-700 text-xs rounded-full">Verified Purchase</span>
                </div>
            </div>

            {{-- Sample Review 2 --}}
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-green-600 font-bold text-lg">F</span>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-semibold text-stone-900">Fatima Al-Rashid</h4>
                        <div class="flex items-center">
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-sm text-stone-500">1 week ago</span>
                        </div>
                    </div>
                </div>
                <p class="text-stone-600 leading-relaxed">
                    Traditional blends that remind me of my grandmother's recipes! The quality is outstanding and 
                    the prices are very reasonable. I've been a loyal customer for over a year now.
                </p>
                <div class="mt-4 pt-4 border-t border-stone-100">
                    <span class="inline-block px-2 py-1 bg-green-50 text-green-700 text-xs rounded-full">Regular Customer</span>
                </div>
            </div>

            {{-- Sample Review 3 --}}
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 font-bold text-lg">K</span>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-semibold text-stone-900">Khalid Hassan</h4>
                        <div class="flex items-center">
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= 4; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                                <svg class="w-4 h-4 text-stone-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-stone-500">2 weeks ago</span>
                        </div>
                    </div>
                </div>
                <p class="text-stone-600 leading-relaxed">
                    Great selection of organic herbs! The store is always clean and well-organized. 
                    Staff are knowledgeable and always willing to help. Only wish they had more parking space.
                </p>
                <div class="mt-4 pt-4 border-t border-stone-100">
                    <span class="inline-block px-2 py-1 bg-blue-50 text-blue-700 text-xs rounded-full">First-time Buyer</span>
                </div>
            </div>

            {{-- Sample Review 4 --}}
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                        <span class="text-purple-600 font-bold text-lg">M</span>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-semibold text-stone-900">Mariam Saleh</h4>
                        <div class="flex items-center">
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-sm text-stone-500">3 weeks ago</span>
                        </div>
                    </div>
                </div>
                <p class="text-stone-600 leading-relaxed">
                    The essential oils are absolutely amazing! I use them for aromatherapy and the quality is 
                    exceptional. The lavender oil helped me sleep better. Highly recommend!
                </p>
                <div class="mt-4 pt-4 border-t border-stone-100">
                    <span class="inline-block px-2 py-1 bg-purple-50 text-purple-700 text-xs rounded-full">Wellness Product</span>
                </div>
            </div>

            {{-- Sample Review 5 --}}
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <span class="text-red-600 font-bold text-lg">R</span>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-semibold text-stone-900">Rashid Al-Mansoori</h4>
                        <div class="flex items-center">
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-sm text-stone-500">1 month ago</span>
                        </div>
                    </div>
                </div>
                <p class="text-stone-600 leading-relaxed">
                    Authentic Arabian spices at their finest! The frankincense and myrrh are of exceptional quality. 
                    This is my go-to place for all traditional herbal remedies. Keep up the great work!
                </p>
                <div class="mt-4 pt-4 border-t border-stone-100">
                    <span class="inline-block px-2 py-1 bg-red-50 text-red-700 text-xs rounded-full">Traditional Products</span>
                </div>
            </div>

            {{-- Sample Review 6 --}}
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                        <span class="text-indigo-600 font-bold text-lg">S</span>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-semibold text-stone-900">Sara Abdullah</h4>
                        <div class="flex items-center">
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= 4; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                                <svg class="w-4 h-4 text-stone-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-stone-500">1 month ago</span>
                        </div>
                    </div>
                </div>
                <p class="text-stone-600 leading-relaxed">
                    Very good quality products and friendly service. The herbal teas are excellent for digestion. 
                    Would definitely recommend to friends and family. Packaging could be improved though.
                </p>
                <div class="mt-4 pt-4 border-t border-stone-100">
                    <span class="inline-block px-2 py-1 bg-indigo-50 text-indigo-700 text-xs rounded-full">Herbal Teas</span>
                </div>
            </div>

        </div>

        {{-- Load More Button --}}
        <div class="text-center mt-12">
            <button class="inline-flex items-center px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-full transition-colors duration-300 shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Load More Reviews
            </button>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // ============================================
        // 1. STAR RATING HANDLER (Same as home page)
        // ============================================
        const starBtns = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('rating-input');
        const ratingText = document.getElementById('rating-text');
        const ratingLabels = ['', 'Poor 😞', 'Fair 😐', 'Good 🙂', 'Very Good 😊', 'Excellent 🤩'];

        if (starBtns.length > 0 && ratingInput && ratingText) {

            // Click handler
            starBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const rating = parseInt(this.dataset.rating);
                    ratingInput.value = rating;
                    ratingText.textContent = ratingLabels[rating];
                    ratingText.classList.remove('text-stone-500');
                    ratingText.classList.add('text-amber-600', 'font-semibold');

                    updateStars(rating);
                });

                // Hover effect
                btn.addEventListener('mouseenter', function() {
                    const hoverRating = parseInt(this.dataset.rating);
                    starBtns.forEach((star, index) => {
                        if (index < hoverRating) {
                            star.classList.add('text-amber-300');
                        }
                    });
                });

                btn.addEventListener('mouseleave', function() {
                    const currentRating = parseInt(ratingInput.value) || 0;
                    starBtns.forEach(star => star.classList.remove('text-amber-300'));
                    updateStars(currentRating);
                });
            });

            // Update stars function
            function updateStars(rating) {
                starBtns.forEach((star, index) => {
                    if (index < rating) {
                        star.classList.remove('text-stone-300');
                        star.classList.add('text-amber-400');
                    } else {
                        star.classList.remove('text-amber-400');
                        star.classList.add('text-stone-300');
                    }
                });
            }

            // Restore rating from old input (validation error)
            const oldRating = parseInt(ratingInput.value);
            if (oldRating > 0) {
                updateStars(oldRating);
                ratingText.textContent = ratingLabels[oldRating];
                ratingText.classList.remove('text-stone-500');
                ratingText.classList.add('text-amber-600', 'font-semibold');
            }
        }

        // ============================================
        // 2. CHARACTER COUNTER
        // ============================================
        const comment = document.getElementById('comment');
        const charCount = document.getElementById('char-count');

        if (comment && charCount) {
            // Set initial count
            charCount.textContent = comment.value.length;

            comment.addEventListener('input', function() {
                const count = this.value.length;
                charCount.textContent = count;

                // Color feedback
                charCount.classList.remove('text-red-500', 'text-amber-500', 'text-stone-400');
                if (count >= 900) {
                    charCount.classList.add('text-red-500');
                } else if (count >= 700) {
                    charCount.classList.add('text-amber-500');
                } else {
                    charCount.classList.add('text-stone-400');
                }
            });
        }

        // ============================================
        // 3. FORM VALIDATION ENHANCEMENT
        // ============================================
        const reviewForm = document.querySelector('form[action*="reviews"]');

        if (reviewForm) {
            reviewForm.addEventListener('submit', function(e) {
                const rating = document.getElementById('rating-input').value;
                const submitBtn = document.getElementById('submit-btn');

                // Check if rating is selected
                if (!rating || rating === '0') {
                    e.preventDefault();
                    alert('Please select a rating before submitting.');
                    return false;
                }

                // Show loading state
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                    <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Submitting...</span>
                `;
                }
            });
        }

        // ============================================
        // 4. PHONE INPUT FORMATTING
        // ============================================
        const phoneInput = document.getElementById('phone');

        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                // Allow only numbers, spaces, +, -
                let value = this.value.replace(/[^\d\s\+\-]/g, '');
                this.value = value;
            });
        }

        // ============================================
        // 5. AUTO-HIDE SUCCESS/ERROR ALERTS
        // ============================================
        const alerts = document.querySelectorAll('[role="alert"]');

        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';

                setTimeout(() => {
                    alert.remove();
                }, 500);
            }, 7000); // Hide after 7 seconds
        });

        console.log('🌹 Desert Rose Reviews - All scripts loaded successfully!');
    });
</script>
@endsection
