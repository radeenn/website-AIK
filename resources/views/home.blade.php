@extends('layouts.app')

@section('title', 'Tuntun Sholat - Belajar Sholat Sesuai HPT Muhammadiyah')

@section('content')
<section class="container-shell pt-6 md:pt-10">
    <div class="hero-panel reveal-section">
        <div class="relative z-10 max-w-2xl">
            <span class="eyebrow"><i data-lucide="book-open-check" class="h-4 w-4"></i> Tuntunan Sesuai Sumber Terverifikasi</span>
            <p class="mt-4 text-sm font-bold text-emerald-800">Tuntunan Tata Cara Sholat Sesuai Sunnah Rasulullah ﷺ</p>
            <h1 class="mt-5 text-4xl font-extrabold leading-tight text-emerald-950 sm:text-5xl lg:text-6xl">Pelajari Tata Cara Sholat dengan Mudah dan Terstruktur</h1>
            <p class="mt-5 max-w-xl text-base leading-8 text-slate-600 sm:text-lg">Pelajari gerakan, bacaan, audio, dan video tuntunan sholat berdasarkan Himpunan Putusan Tarjih Muhammadiyah.</p>
            <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('movements.index') }}" class="btn-primary justify-center">Mulai Belajar <i data-lucide="arrow-right" class="h-5 w-5"></i></a>
                <a href="{{ route('movements.index') }}#daftar-gerakan" class="btn-secondary justify-center">Lihat Daftar Gerakan</a>
            </div>
        </div>
        <div class="pointer-events-none relative mt-8 min-h-72 lg:absolute lg:inset-y-0 lg:right-0 lg:mt-0 lg:w-[48%]">
            <img src="{{ asset('images/hero-family.svg') }}" alt="Ilustrasi keluarga belajar tata cara sholat" class="absolute inset-0 h-full w-full object-contain object-bottom">
        </div>
    </div>

    <div class="mt-5 grid grid-cols-2 gap-3 lg:grid-cols-4">
        @foreach([
            ['badge-check', 'Sesuai HPT Muhammadiyah'],
            ['audio-lines', 'Audio dan video interaktif'],
            ['clock-3', 'Belajar kapan saja'],
            ['users-round', 'Mode dewasa dan anak'],
        ] as [$icon, $label])
            <div class="feature-pill reveal-section"><i data-lucide="{{ $icon }}" class="h-5 w-5"></i><span>{{ $label }}</span></div>
        @endforeach
    </div>
</section>

<section class="container-shell section-space reveal-section">
    <div class="section-heading">
        <div><span class="eyebrow">Pilih pengalaman belajar</span><h2>Dua mode untuk kebutuhan berbeda</h2></div>
        <p>Gerakan dan bacaan tetap sama, sedangkan gaya visual dan penyajiannya menyesuaikan pengguna.</p>
    </div>
    <div class="mt-8 grid gap-5 lg:grid-cols-2">
        @php($adult = $siteCategories->firstWhere('slug', 'dewasa'))
        @php($child = $siteCategories->firstWhere('slug', 'anak-anak'))
        @if($adult)
        <article class="mode-card mode-card-adult">
            <div class="max-w-md"><span class="mode-badge">Mode Dewasa</span><h3>Penjelasan lengkap dan tenang</h3><p>Teks Arab, transliterasi, terjemahan, sumber, audio, video, dan panduan gerakan disajikan secara menyeluruh.</p><a href="{{ route('mode.switch', $adult) }}" class="btn-primary mt-5">Pilih Mode Dewasa <i data-lucide="arrow-right" class="h-4 w-4"></i></a></div>
            <img src="{{ asset('images/mode-adult.svg') }}" alt="Ilustrasi mode dewasa" loading="lazy">
        </article>
        @endif
        @if($child)
        <article class="mode-card mode-card-child">
            <div class="max-w-md"><span class="mode-badge">Mode Anak-anak</span><h3>Lebih cerah dan mudah dipahami</h3><p>Tombol lebih besar, bahasa lebih sederhana, serta ilustrasi ramah anak tanpa mengubah makna bacaan.</p><a href="{{ route('mode.switch', $child) }}" class="btn-primary mt-5">Pilih Mode Anak-anak <i data-lucide="arrow-right" class="h-4 w-4"></i></a></div>
            <img src="{{ asset('images/mode-child.svg') }}" alt="Ilustrasi mode anak-anak" loading="lazy">
        </article>
        @endif
    </div>
</section>

<section class="bg-white/70 py-16 reveal-section">
    <div class="container-shell">
        <div class="section-heading"><div><span class="eyebrow">Cara menggunakan</span><h2>Mulai belajar dalam empat langkah</h2></div></div>
        <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach([
                ['1', 'Pilih mode', 'Gunakan mode Dewasa atau Anak-anak sesuai kebutuhan.', 'toggle-right'],
                ['2', 'Pilih gerakan', 'Buka daftar dan pilih tahapan yang ingin dipelajari.', 'mouse-pointer-click'],
                ['3', 'Pelajari materi', 'Baca penjelasan, dengarkan audio, dan lihat video.', 'book-open'],
                ['4', 'Lanjutkan urutan', 'Gunakan tombol berikutnya atau aktifkan autoplay.', 'route'],
            ] as [$number, $title, $description, $icon])
            <article class="step-card"><span>{{ $number }}</span><i data-lucide="{{ $icon }}" class="h-7 w-7"></i><h3>{{ $title }}</h3><p>{{ $description }}</p></article>
            @endforeach
        </div>
    </div>
</section>

@if($popularMovements->isNotEmpty())
<section id="daftar-gerakan" class="container-shell section-space reveal-section">
    <div class="section-heading"><div><span class="eyebrow">Gerakan populer</span><h2>Mulai dari tahapan awal</h2></div><a href="{{ route('movements.index') }}" class="text-link">Lihat semua <i data-lucide="arrow-right" class="h-4 w-4"></i></a></div>
    <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($popularMovements as $movement)<x-movement-card :movement="$movement" />@endforeach
    </div>
</section>
@endif

<section class="container-shell pb-8 reveal-section">
    <div class="source-panel">
        <div><span class="eyebrow"><i data-lucide="shield-check" class="h-4 w-4"></i> Sumber Konten</span><h2>Berlandaskan HPT Muhammadiyah</h2><p>Struktur aplikasi telah disiapkan untuk menyimpan sumber setiap bacaan. Teks Arab, transliterasi, terjemahan, audio, dan video contoh harus diganti serta diverifikasi dari sumber resmi sebelum dipublikasikan.</p></div>
        <div class="source-seal"><i data-lucide="book-marked" class="h-10 w-10"></i><strong>HPT Muhammadiyah</strong><span>Kitab Shalat</span></div>
    </div>
</section>

<section class="container-shell pb-16 reveal-section">
    <div class="cta-panel"><div><h2>Siap memulai pembelajaran?</h2><p>Pilih gerakan pertama dan ikuti urutannya sampai selesai.</p></div><a href="{{ route('movements.index') }}" class="btn-light">Mulai Sekarang <i data-lucide="arrow-right" class="h-5 w-5"></i></a></div>
</section>
@endsection
