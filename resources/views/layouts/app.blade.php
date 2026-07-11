<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', __('messages.site_description'))">
    <title>@yield('title', __('messages.site_title'))</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32 (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-cream text-brand-ink antialiased font-sans">
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>
    @stack('scripts')
</body>
</html>
