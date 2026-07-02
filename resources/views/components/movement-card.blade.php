@props(['movement'])
<article class="movement-card group" data-movement-order="{{ $movement->urutan }}" data-movement-url="{{ route('movements.show', $movement->slug) }}">
    <div class="relative aspect-[4/3] overflow-hidden rounded-2xl bg-gradient-to-br from-[#fffaf0] to-[#ddf4eb]">
        <img loading="lazy" src="{{ $movement->gambar_src }}" alt="Ilustrasi gerakan {{ $movement->nama }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
        <span class="absolute left-3 top-3 flex h-8 min-w-8 items-center justify-center rounded-full bg-emerald-700 px-2 text-sm font-extrabold text-white shadow">{{ $movement->urutan }}</span>
        <span class="progress-badge absolute right-3 top-3 hidden items-center gap-1 rounded-full bg-white/95 px-2.5 py-1 text-xs font-bold text-emerald-700 shadow"><i data-lucide="circle-check" class="h-3.5 w-3.5"></i> Dipelajari</span>
    </div>
    <div class="flex flex-1 flex-col p-4">
        <h3 class="line-clamp-2 text-base font-extrabold text-slate-900">{{ $movement->nama }}</h3>
        <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-600">{{ ($activeModeSlug ?? 'dewasa') === 'anak-anak' ? $movement->deskripsi_sederhana : $movement->deskripsi }}</p>
        <a href="{{ route('movements.show', $movement->slug) }}" class="btn-primary mt-4 w-full justify-center">Pelajari <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
    </div>
</article>
