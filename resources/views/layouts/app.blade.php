<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Tuntun Sholat, media belajar tata cara sholat sesuai HPT Muhammadiyah.">
    <title>@yield('title', 'Tuntun Sholat')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen overflow-x-hidden bg-cream text-slate-800 antialiased {{ ($activeModeSlug ?? 'dewasa') === 'anak-anak' ? 'mode-child' : 'mode-adult' }}">
    <a href="#main-content" class="skip-link">Lewati ke konten utama</a>
    <div class="islamic-pattern fixed inset-0 -z-20 opacity-50" aria-hidden="true"></div>
    <x-navbar />
    <x-identity-header />
    <x-alert />

    <main id="main-content" class="pb-24 md:pb-0">
        @yield('content')
    </main>

    <x-footer />
    @stack('scripts')
</body>
</html>
