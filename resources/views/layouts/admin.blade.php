<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') | Tuntun Sholat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">
    <div class="min-h-screen lg:flex">
        <x-admin-sidebar />
        <div class="min-w-0 flex-1">
            <header class="sticky top-0 z-30 flex min-h-16 items-center justify-between border-b border-slate-200 bg-white/95 px-4 backdrop-blur lg:px-8">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-emerald-700">Panel Manajemen</p>
                    <h1 class="text-lg font-bold text-slate-900">@yield('page-title', 'Dashboard')</h1>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="btn-secondary hidden sm:inline-flex">Lihat Website</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="btn-danger" type="submit">Keluar</button>
                    </form>
                </div>
            </header>
            <main class="p-4 lg:p-8">
                <x-alert />
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
