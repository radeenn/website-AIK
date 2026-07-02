@extends('layouts.app')
@section('title', 'Tentang Aplikasi | Tuntun Sholat')
@section('content')
<section class="container-shell section-space">
    <div class="page-header reveal-section"><div><span class="eyebrow">Tentang aplikasi</span><h1>Media belajar sholat yang terstruktur</h1><p>Tuntun Sholat dirancang sebagai aplikasi pembelajaran full-stack untuk menyajikan gerakan, bacaan, audio, dan video secara responsif.</p></div><img src="{{ asset('images/about-illustration.svg') }}" alt="Ilustrasi buku dan masjid" class="hidden h-40 md:block"></div>
    <div class="mt-8 grid gap-5 md:grid-cols-2">
        @foreach([
            ['Tujuan Aplikasi', 'Membantu pengguna mempelajari urutan gerakan sholat secara bertahap melalui materi visual dan media interaktif.', 'target'],
            ['Sumber HPT Muhammadiyah', 'Setiap bacaan memiliki kolom sumber. Isi placeholder wajib diverifikasi dari Himpunan Putusan Tarjih Muhammadiyah sebelum publikasi.', 'shield-check'],
            ['Dua Mode Pengguna', 'Mode Dewasa menyajikan materi lengkap, sedangkan Mode Anak-anak menggunakan bahasa lebih sederhana dan visual lebih cerah.', 'users-round'],
            ['Teknologi', 'Laravel, Blade, Tailwind CSS, Alpine.js, MySQL, dan Laravel Storage digunakan agar aplikasi mudah dikelola dan dikembangkan.', 'code-2'],
        ] as [$title,$description,$icon])
            <article class="info-card reveal-section"><i data-lucide="{{ $icon }}" class="h-8 w-8"></i><h2>{{ $title }}</h2><p>{{ $description }}</p></article>
        @endforeach
    </div>
</section>
@endsection
