@extends('layouts.app')

@section('title', 'Daftar Gerakan Sholat | Tuntun Sholat')

@section('content')
<section x-data="movementProgress('{{ $activeCategory?->slug ?? 'dewasa' }}')" x-init="init()" class="container-shell section-space">
    <div class="page-header reveal-section">
        <div><span class="eyebrow">Belajar berurutan</span><h1>Daftar Gerakan Sholat</h1><p>Pilih gerakan untuk mempelajari tata cara, bacaan, audio, dan video.</p></div>
        <x-mode-switcher />
    </div>

    <div class="mt-7 grid gap-4 lg:grid-cols-[1fr_auto] lg:items-center">
        <form method="GET" action="{{ route('movements.index') }}" class="search-box">
            <i data-lucide="search" class="h-5 w-5"></i>
            <label class="sr-only" for="movement-search">Cari gerakan</label>
            <input id="movement-search" name="q" value="{{ $search }}" type="search" placeholder="Cari nama atau penjelasan gerakan...">
            @if($search)<a href="{{ route('movements.index') }}" class="icon-button"><span class="sr-only">Hapus pencarian</span><i data-lucide="x" class="h-4 w-4"></i></a>@endif
            <button class="btn-primary" type="submit">Cari</button>
        </form>
        <a x-bind:href="continueUrl" href="{{ $movements->first() ? route('movements.show', $movements->first()->slug) : '#' }}" class="btn-secondary justify-center"><i data-lucide="play-circle" class="h-5 w-5"></i> Lanjutkan Belajar</a>
    </div>

    <div class="progress-panel mt-5">
        <div class="flex items-center justify-between gap-3"><div><strong>Progress belajar</strong><p><span x-text="completed">0</span> dari {{ $movements->count() }} gerakan telah dibuka</p></div><span class="progress-percent" x-text="percentage + '%'">0%</span></div>
        <div class="progress-track"><span :style="`width:${percentage}%`"></span></div>
    </div>

    @if($search)<p class="mt-5 text-sm text-slate-600">Hasil pencarian untuk <strong>“{{ $search }}”</strong>: {{ $movements->count() }} gerakan.</p>@endif

    <div x-show="loading" class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4" aria-label="Memuat daftar gerakan">
        @for($i = 0; $i < 8; $i++)
            <div class="animate-pulse rounded-3xl border border-slate-200 bg-white p-3"><div class="aspect-[4/3] rounded-2xl bg-slate-200"></div><div class="mt-4 h-4 w-3/4 rounded bg-slate-200"></div><div class="mt-3 h-3 w-full rounded bg-slate-100"></div><div class="mt-2 h-3 w-2/3 rounded bg-slate-100"></div><div class="mt-4 h-11 rounded-xl bg-slate-200"></div></div>
        @endfor
    </div>
    <div x-show="!loading" x-cloak id="daftar-gerakan" class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @forelse($movements as $movement)
            <x-movement-card :movement="$movement" />
        @empty
            <div class="empty-state sm:col-span-2 lg:col-span-4"><i data-lucide="search-x" class="h-12 w-12"></i><h2>Gerakan tidak ditemukan</h2><p>Coba gunakan kata pencarian yang lebih umum.</p><a href="{{ route('movements.index') }}" class="btn-primary">Tampilkan Semua</a></div>
        @endforelse
    </div>
</section>
@endsection
