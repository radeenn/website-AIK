<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin | Tuntun Sholat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="grid min-h-screen place-items-center bg-emerald-950 p-4 antialiased">
    <div class="islamic-pattern fixed inset-0 opacity-10" aria-hidden="true"></div>
    <main class="relative z-10 w-full max-w-md rounded-3xl bg-white p-6 shadow-2xl sm:p-8">
        <a href="{{ route('home') }}" class="mb-7 flex items-center justify-center gap-3"><img src="{{ asset('images/logo.svg') }}" alt="Logo Tuntun Sholat" class="h-14 w-14"><span><strong class="block text-xl text-emerald-950">Tuntun Sholat</strong><small class="text-slate-500">Panel Administrator</small></span></a>
        <h1 class="text-2xl font-extrabold text-slate-900">Masuk ke Admin</h1><p class="mt-2 text-sm leading-6 text-slate-600">Kelola identitas, kategori, gerakan, bacaan, serta media pembelajaran.</p>
        @if(session('success'))<div class="mt-4 rounded-xl bg-emerald-50 p-3 text-sm text-emerald-800">{{ session('success') }}</div>@endif
        <form method="POST" action="{{ route('admin.login.store') }}" class="mt-6 grid gap-4">@csrf
            <x-form-input label="Email" name="email" type="email" required autocomplete="email" placeholder="admin@tuntunsholat.test" />
            <x-form-input label="Kata Sandi" name="password" type="password" required autocomplete="current-password" placeholder="Masukkan kata sandi" />
            <label class="flex items-center gap-2 text-sm text-slate-600"><input type="checkbox" name="remember" value="1" class="rounded border-slate-300 text-emerald-700 focus:ring-emerald-600"> Ingat saya</label>
            <button class="btn-primary mt-2 w-full justify-center" type="submit">Masuk <i data-lucide="log-in" class="h-5 w-5"></i></button>
        </form>
        <div class="mt-6 rounded-2xl bg-slate-50 p-4 text-xs leading-6 text-slate-600"><strong>Akun contoh:</strong><br>Email: admin@tuntunsholat.test<br>Kata sandi: password123</div>
    </main>
</body>
</html>
