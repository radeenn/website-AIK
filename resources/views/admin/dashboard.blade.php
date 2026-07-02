@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('content')
<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
    @foreach([
        ['Gerakan', $stats['gerakan'], 'list-checks'], ['Bacaan', $stats['bacaan'], 'book-open-text'], ['Kategori', $stats['kategori'], 'layers-3'], ['File Audio', $stats['audio'], 'audio-lines'], ['Video', $stats['video'], 'video'],
    ] as [$label,$value,$icon])
    <article class="admin-stat"><i data-lucide="{{ $icon }}" class="h-6 w-6"></i><div><span>{{ $label }}</span><strong>{{ $value }}</strong></div></article>
    @endforeach
</div>
<div class="mt-6 grid gap-6 xl:grid-cols-2">
    <section class="admin-panel"><div class="admin-panel-header"><div><h2>Gerakan Terbaru</h2><p>Data yang terakhir ditambahkan.</p></div><a href="{{ route('admin.gerakan.index') }}" class="text-link">Kelola</a></div><div class="divide-y divide-slate-100">@forelse($latestMovements as $item)<div class="flex items-center justify-between gap-3 py-3"><div><strong class="block text-sm">{{ $item->nama }}</strong><small class="text-slate-500">{{ $item->kategori?->nama }} · urutan {{ $item->urutan }}</small></div><span class="status-badge {{ $item->status_aktif ? 'active' : '' }}">{{ $item->status_aktif ? 'Aktif' : 'Nonaktif' }}</span></div>@empty<p class="py-4 text-sm text-slate-500">Belum ada data.</p>@endforelse</div></section>
    <section class="admin-panel"><div class="admin-panel-header"><div><h2>Bacaan Terbaru</h2><p>Materi bacaan yang terakhir ditambahkan.</p></div><a href="{{ route('admin.bacaan.index') }}" class="text-link">Kelola</a></div><div class="divide-y divide-slate-100">@forelse($latestRecitations as $item)<div class="py-3"><strong class="block text-sm">{{ $item->judul }}</strong><small class="text-slate-500">{{ $item->gerakan?->nama }}</small></div>@empty<p class="py-4 text-sm text-slate-500">Belum ada data.</p>@endforelse</div></section>
</div>
@endsection
