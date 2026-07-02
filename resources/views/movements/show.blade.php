@extends('layouts.app')

@section('title', $movement->urutan.'. '.$movement->nama.' | Tuntun Sholat')

@section('content')
<section x-data="movementPage({ nextUrl: @js($next ? route('movements.show', $next->slug) : null), mode: @js($activeCategory?->slug ?? 'dewasa'), order: {{ $movement->urutan }} })" x-init="init()" class="container-shell section-space">
    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
        <a href="{{ route('movements.index') }}" class="text-link"><i data-lucide="arrow-left" class="h-4 w-4"></i> Kembali ke daftar</a>
        <x-mode-switcher :urutan="$movement->urutan" />
    </div>

    <div class="detail-layout">
        <aside class="detail-sidebar">
            <label for="movement-select" class="form-label lg:hidden">Pilih gerakan lain</label>
            <select id="movement-select" class="form-control lg:hidden" onchange="if(this.value) location.href=this.value">
                @foreach($allMovements as $item)<option value="{{ route('movements.show', $item->slug) }}" {{ $item->id === $movement->id ? 'selected' : '' }}>{{ $item->urutan }}. {{ $item->nama }}</option>@endforeach
            </select>
            <div class="hidden lg:block">
                <h2>Daftar Gerakan</h2>
                <nav class="mt-4 grid gap-1" aria-label="Daftar gerakan">
                    @foreach($allMovements as $item)
                        <a href="{{ route('movements.show', $item->slug) }}" class="sidebar-movement {{ $item->id === $movement->id ? 'active' : '' }}"><span>{{ $item->urutan }}</span><strong>{{ $item->nama }}</strong></a>
                    @endforeach
                </nav>
            </div>
        </aside>

        <article class="movement-visual-panel">
            <div class="flex items-start justify-between gap-4"><div><span class="eyebrow">Gerakan ke-{{ $movement->urutan }}</span><h1>{{ $movement->urutan }}. {{ $movement->nama }}</h1></div><button type="button" class="icon-button favorite-button" @click="toggleFavorite" :class="favorite && 'active'" :aria-pressed="favorite"><span class="sr-only">Tambah ke favorit</span><i data-lucide="heart" class="h-5 w-5"></i></button></div>
            <p class="mt-3 leading-7 text-slate-600">{{ ($activeCategory?->slug ?? 'dewasa') === 'anak-anak' ? $movement->deskripsi_sederhana : $movement->deskripsi }}</p>
            <div class="movement-image-wrap mt-6"><img src="{{ $movement->gambar_src }}" alt="Ilustrasi {{ $movement->nama }}" class="h-full w-full object-contain"></div>
            <div class="mt-4 flex items-center justify-between gap-3 rounded-2xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm"><span class="flex items-center gap-2 font-semibold text-emerald-900"><i data-lucide="circle-check" class="h-5 w-5"></i> Gerakan otomatis tercatat sebagai telah dipelajari.</span><span class="font-bold text-emerald-700">{{ $movement->urutan }}/{{ $allMovements->count() }}</span></div>
        </article>

        <div class="reading-panel">
            <div class="flex items-center justify-between gap-3"><div><span class="eyebrow">Bacaan dan Media</span><h2>Materi Gerakan</h2></div><label class="autoplay-toggle"><input x-model="autoplay" @change="saveAutoplay" type="checkbox"><span></span><b>Autoplay Audio</b></label></div>

            <div class="mt-5 grid gap-4">
                @forelse($movement->bacaan as $reading)
                    <section class="reading-card">
                        <h3>{{ $reading->judul }}</h3>
                        <div class="reading-block"><span>Bacaan Arab</span><p dir="rtl" lang="ar" class="arabic-text">{{ $reading->teks_arab }}</p></div>
                        <div class="reading-block"><span>Transliterasi Latin</span><p class="font-medium italic text-emerald-950">{{ $reading->teks_latin }}</p></div>
                        <div class="reading-block"><span>{{ ($activeCategory?->slug ?? 'dewasa') === 'anak-anak' ? 'Arti Singkat' : 'Terjemahan' }}</span><p>{{ ($activeCategory?->slug ?? 'dewasa') === 'anak-anak' ? $reading->terjemahan_ringkas : $reading->terjemahan }}</p></div>
                        <div class="source-note"><i data-lucide="book-marked" class="h-4 w-4"></i><span><b>Sumber:</b> {{ $reading->sumber }}</span></div>
                        @if($reading->audio_src)<x-audio-player :src="$reading->audio_src" :title="$reading->judul" />@endif
                    </section>
                @empty
                    <div class="empty-state"><i data-lucide="audio-lines" class="h-10 w-10"></i><h3>Belum ada bacaan</h3><p>Administrator dapat menambahkan bacaan melalui panel admin.</p></div>
                @endforelse
            </div>

            @if($movement->video_src)<x-video-modal :src="$movement->video_src" :title="'Video '.$movement->nama" />@endif
            <button x-show="autoplay" x-cloak @click="stopAutoplay" type="button" class="btn-danger mt-3 w-full justify-center"><i data-lucide="square" class="h-4 w-4"></i> Hentikan Autoplay</button>
        </div>
    </div>

    <x-previous-next :previous="$previous" :next="$next" />
</section>
@endsection
