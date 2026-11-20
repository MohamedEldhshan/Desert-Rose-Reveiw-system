<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ __('messages.admin_login_title') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-cream text-brand-ink antialiased font-sans min-h-screen flex flex-col">
    <div class="flex-grow flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <img src="{{ asset('images/desert-rose-logo.webp') }}" alt="Desert Rose" class="h-16 mx-auto mb-4">
                <h1 class="font-display text-2xl font-bold text-brand-ink">{{ __('messages.admin_login_title') }}</h1>
                <p class="mt-1 text-sm text-brand-muted">{{ __('messages.admin_login_subtitle') }}</p>
            </div>

            <div class="rounded-2xl border border-brand-beige bg-white p-6 sm:p-8 shadow-card">
                @if($errors->any())
                    <div class="mb-4 rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800">
                        <ul class="list-disc ps-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.login_email') }}</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus dir="ltr"
                               class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm focus:ring-2 focus:ring-brand-gold focus:border-brand-gold">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-brand-ink mb-1">{{ __('messages.password') }}</label>
                        <input type="password" id="password" name="password" required dir="ltr"
                               class="w-full rounded-lg border border-brand-beige px-4 py-3 text-sm focus:ring-2 focus:ring-brand-gold focus:border-brand-gold">
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="remember" name="remember" class="rounded border-brand-beige text-brand-gold focus:ring-brand-gold">
                        <label for="remember" class="text-sm text-brand-muted">{{ __('messages.remember_me') }}</label>
                    </div>

                    <button type="submit" class="btn-primary w-full mt-2">{{ __('messages.login') }}</button>
                </form>
            </div>

            <p class="mt-6 text-center text-xs text-brand-muted">
                <a href="{{ route('home') }}" class="hover:text-brand-gold">&larr; {{ __('messages.nav_home') }}</a>
            </p>
        </div>
    </div>
</body>
</html>
