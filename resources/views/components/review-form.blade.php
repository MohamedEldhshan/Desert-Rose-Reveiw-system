<section id="write-review" class="section-pad bg-brand-cream">
    <div class="section-inner">
        <div class="max-w-2xl mx-auto">
            <div class="text-center">
                <h2 class="font-display text-2xl sm:text-3xl font-bold text-brand-ink">{{ __('messages.review_form_title') }}</h2>
                <p class="mt-2 text-brand-muted">{{ __('messages.review_form_subtitle') }}</p>
            </div>

            @if(session('success'))
                <div class="mt-6 rounded-xl border border-brand-gold/40 bg-brand-gold/10 px-4 py-3 text-sm text-brand-overlay">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mt-6 rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="mt-6 rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800">
                    <ul class="list-disc ps-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reviews.store') }}" method="POST"
                  class="mt-8 rounded-2xl border border-brand-beige bg-white p-6 sm:p-8 shadow-card"
                  x-data="{ 
                      rating: {{ (int) old('rating', 0) }}, 
                      hover: 0,
                      isSubmitting: false,
                      idempotencyKey: '{{ Str::uuid() }}'
                  }"
                  @submit="isSubmitting = true">
                @csrf
                <input type="hidden" name="_idempotency_key" :value="idempotencyKey">
                <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.full_name') }} <span class="text-red-600">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm focus:ring-2 focus:ring-brand-gold focus:border-brand-gold">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.phone') }} <span class="text-red-600">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required dir="ltr"
                               class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm focus:ring-2 focus:ring-brand-gold focus:border-brand-gold">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.email') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" dir="ltr"
                               class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm focus:ring-2 focus:ring-brand-gold focus:border-brand-gold">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.nationality') }} <span class="text-red-600">*</span></label>
                        <x-nationality-select name="nationality" required />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-2">{{ __('messages.rating') }} <span class="text-red-600">*</span></label>
                        <input type="hidden" name="rating" :value="rating" required>
                        <div class="flex flex-wrap items-center gap-1">
                            <template x-for="star in [1,2,3,4,5]" :key="star">
                                <button type="button" @click="rating = star" @mouseenter="hover = star" @mouseleave="hover = 0"
                                        class="p-1 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-gold rounded">
                                    <svg class="w-9 h-9 transition-colors" :class="star <= (hover || rating) ? 'text-brand-gold' : 'text-brand-beige'" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </button>
                            </template>
                            <span x-show="rating === 0" class="text-sm text-brand-muted ms-2">{{ __('messages.rating_hint') }}</span>
                            <span x-show="rating > 0" x-text="rating + '/5'" class="text-sm font-medium text-brand-gold ms-2"></span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.review') }} <span class="text-red-600">*</span></label>
                        <textarea name="comment" rows="5" required
                                  class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm resize-none focus:ring-2 focus:ring-brand-gold focus:border-brand-gold"
                                  placeholder="{{ __('messages.review_placeholder') }}">{{ old('comment') }}</textarea>
                        <p class="mt-1 text-xs text-brand-muted">{{ __('messages.comment_min') }}</p>
                    </div>
                </div>

                <button type="submit" 
                        class="btn-primary w-full mt-6"
                        :disabled="isSubmitting"
                        x-text="isSubmitting ? 'Submitting...' : '{{ __('messages.submit_review') }}'">
                </button>
            </form>
        </div>
    </div>
</section>
