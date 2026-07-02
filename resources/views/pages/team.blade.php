@extends('layouts.app')
@section('title', 'Tentang Kami | Tuntun Sholat')
@section('content')
<section class="container-shell section-space">
    <div class="page-header reveal-section"><div><span class="eyebrow">Tentang kami</span><h1>{{ $siteIdentity?->nama_kelompok ?? 'Kelompok Tuntun Sholat' }}</h1><p>Tim pengembang aplikasi Tuntun Sholat untuk mata kuliah {{ $siteIdentity?->mata_kuliah ?? 'Pengembangan Aplikasi Web' }}.</p></div><a href="https://github.com/username/tuntun-sholat" target="_blank" rel="noopener" class="btn-secondary"><i data-lucide="github" class="h-5 w-5"></i> Repositori GitHub</a></div>
    <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($members as $member)
            <article class="team-card reveal-section"><div class="team-avatar"><i data-lucide="user-round" class="h-8 w-8"></i></div><h2>{{ $member['nama'] }}</h2><p class="font-semibold text-emerald-700">{{ $member['nim'] }}</p><span>{{ $member['peran'] }}</span><p>{{ $member['kontribusi'] }}</p></article>
        @endforeach
    </div>
    <div class="mt-8 rounded-3xl border border-amber-200 bg-amber-50 p-5 text-sm leading-7 text-amber-900"><strong>Catatan:</strong> Ganti placeholder nama anggota, NIM, kontribusi, serta tautan GitHub sebelum pengumpulan tugas.</div>
</section>
@endsection
