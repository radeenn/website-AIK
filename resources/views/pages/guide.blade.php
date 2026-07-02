@extends('layouts.app')
@section('title', 'Panduan Penggunaan | Tuntun Sholat')
@section('content')
<section class="container-shell section-space">
    <div class="page-header reveal-section"><div><span class="eyebrow">Panduan penggunaan</span><h1>Gunakan semua fitur dengan mudah</h1><p>Ikuti langkah berikut untuk memanfaatkan mode pengguna, media pembelajaran, dan navigasi berurutan.</p></div></div>
    <div class="mt-8 grid gap-4">
        @foreach([
            ['Pilih mode pengguna', 'Gunakan tombol Dewasa atau Anak-anak di navbar. Pilihan tersimpan di session saat berpindah halaman.', 'toggle-right'],
            ['Pilih gerakan', 'Buka Daftar Gerakan, gunakan pencarian bila diperlukan, lalu tekan tombol Pelajari.', 'list-checks'],
            ['Putar audio', 'Tekan tombol putar pada pemutar audio. Anda dapat menggeser progres dan mengatur volume.', 'volume-2'],
            ['Lihat video', 'Tekan Tonton Video Gerakan. Modal dapat ditutup dengan tombol X, klik area luar, atau tombol Escape.', 'circle-play'],
            ['Aktifkan autoplay', 'Nyalakan Autoplay Audio pada halaman detail. Audio diputar berurutan dan aplikasi dapat melanjutkan ke gerakan berikutnya.', 'repeat-2'],
            ['Pindah gerakan', 'Gunakan tombol Sebelumnya dan Selanjutnya di bagian bawah halaman detail.', 'arrow-left-right'],
        ] as $index => [$title,$description,$icon])
        <article class="guide-item reveal-section"><span>{{ $index + 1 }}</span><i data-lucide="{{ $icon }}" class="h-7 w-7"></i><div><h2>{{ $title }}</h2><p>{{ $description }}</p></div></article>
        @endforeach
    </div>
</section>
@endsection
