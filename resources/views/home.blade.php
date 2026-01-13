@extends('layouts.app')

@section('title', 'Desert Rose | زهرة الصحراء - Authentic Desert Herbs & Spices')

@section('content')

{{-- Hero / Welcome Section --}}
@include('components.hero')

{{-- Gallery Carousel Section --}}
@include('components.gallery')

{{-- Testimonials Section --}}
@include('components.testimonials')

{{-- Review Form Section --}}
@include('components.review-form')

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ============================================
        // 1. STAR RATING HANDLER
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
        // 3. GALLERY THUMBNAILS HANDLER
        // ============================================
        const thumbs = document.querySelectorAll('.gallery-thumb');
        const galleryCarousel = document.getElementById('gallery-carousel');

        if (thumbs.length > 0 && galleryCarousel) {
            thumbs.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    const slideIndex = this.dataset.slide;
                    const indicator = galleryCarousel.querySelector(`[data-carousel-slide-to="${slideIndex}"]`);

                    if (indicator) {
                        indicator.click();
                    }

                    // Update active thumbnail styling
                    thumbs.forEach(t => {
                        t.classList.remove('border-amber-500', 'ring-2', 'ring-amber-400');
                        t.classList.add('border-transparent');
                    });
                    this.classList.remove('border-transparent');
                    this.classList.add('border-amber-500', 'ring-2', 'ring-amber-400');
                });
            });

            // Sync thumbnails with carousel indicators
            const carouselIndicators = galleryCarousel.querySelectorAll('[data-carousel-slide-to]');
            carouselIndicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function() {
                    thumbs.forEach((t, i) => {
                        if (i === index) {
                            t.classList.remove('border-transparent');
                            t.classList.add('border-amber-500', 'ring-2', 'ring-amber-400');
                        } else {
                            t.classList.remove('border-amber-500', 'ring-2', 'ring-amber-400');
                            t.classList.add('border-transparent');
                        }
                    });
                });
            });
        }

        // ============================================
        // 4. SMOOTH SCROLL FOR ANCHOR LINKS
        // ============================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');

                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    e.preventDefault();

                    const navbarHeight = 64; // h-16 = 64px
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Update URL without scrolling
                    history.pushState(null, null, targetId);
                }
            });
        });

        // ============================================
        // 5. FORM VALIDATION ENHANCEMENT
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
        // 6. NAVBAR SCROLL EFFECT
        // ============================================
        const navbar = document.querySelector('nav');

        if (navbar) {
            let lastScroll = 0;

            window.addEventListener('scroll', function() {
                const currentScroll = window.pageYOffset;

                // Add shadow on scroll
                if (currentScroll > 50) {
                    navbar.classList.add('shadow-xl');
                } else {
                    navbar.classList.remove('shadow-xl');
                }

                lastScroll = currentScroll;
            });
        }

        // ============================================
        // 7. TESTIMONIAL CAROUSEL AUTO-SYNC INDICATORS
        // ============================================
        const testimonialCarousel = document.getElementById('testimonial-carousel');

        if (testimonialCarousel) {
            const indicators = testimonialCarousel.querySelectorAll('[data-carousel-slide-to]');

            // Observe carousel changes
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'data-carousel-item') {
                        const items = testimonialCarousel.querySelectorAll('[data-carousel-item]');
                        items.forEach((item, index) => {
                            if (item.getAttribute('data-carousel-item') === 'active') {
                                indicators.forEach((ind, i) => {
                                    if (i === index) {
                                        ind.classList.remove('w-2', 'bg-stone-300');
                                        ind.classList.add('w-8', 'bg-amber-600');
                                    } else {
                                        ind.classList.remove('w-8', 'bg-amber-600');
                                        ind.classList.add('w-2', 'bg-stone-300');
                                    }
                                });
                            }
                        });
                    }
                });
            });

            const items = testimonialCarousel.querySelectorAll('[data-carousel-item]');
            items.forEach(item => {
                observer.observe(item, {
                    attributes: true
                });
            });
        }

        // ============================================
        // 8. PHONE INPUT FORMATTING
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
        // 9. AUTO-HIDE SUCCESS/ERROR ALERTS
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

        // ============================================
        // 10. LAZY LOADING FOR IMAGES
        // ============================================
        if ('IntersectionObserver' in window) {
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');

            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.classList.add('fade-in');
                        observer.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(img => imageObserver.observe(img));
        }

        console.log('🌹 Desert Rose - All scripts loaded successfully!');
    });
</script>

{{-- Additional CSS for animations --}}
<style>
    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Smooth transitions for interactive elements */
    .star-btn,
    .gallery-thumb {
        transition: all 0.2s ease;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f5f5f4;
    }

    ::-webkit-scrollbar-thumb {
        background: #d6d3d1;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #a8a29e;
    }
</style>
@endpush