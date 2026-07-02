@if($siteIdentity)
<section x-data="{ identityOpen: false }" class="border-b border-emerald-950/5 bg-white/70">
    <div class="container-shell py-3">
        <button @click="identityOpen = !identityOpen" class="flex min-h-11 w-full items-center justify-between rounded-xl border border-emerald-900/10 bg-white px-4 text-sm font-bold text-emerald-900 shadow-sm md:hidden" type="button">
            <span class="flex items-center gap-2"><i data-lucide="users-round" class="h-4 w-4"></i> Identitas Kelompok</span>
            <i data-lucide="chevron-down" class="h-4 w-4 transition" :class="identityOpen && 'rotate-180'"></i>
        </button>
        <div x-show="identityOpen" x-cloak class="mt-3 grid gap-2 md:hidden">
            @foreach([
                ['Nama Kelompok', $siteIdentity->nama_kelompok, 'users-round'],
                ['Program Studi', $siteIdentity->prodi, 'graduation-cap'],
                ['Mata Kuliah', $siteIdentity->mata_kuliah, 'book-marked'],
                ['Dosen', $siteIdentity->dosen, 'user-round'],
            ] as [$label, $value, $icon])
                <div class="identity-card"><i data-lucide="{{ $icon }}" class="h-5 w-5"></i><span><small>{{ $label }}</small><strong>{{ $value }}</strong></span></div>
            @endforeach
        </div>
        <div class="hidden grid-cols-4 gap-3 md:grid">
            @foreach([
                ['Nama Kelompok', $siteIdentity->nama_kelompok, 'users-round'],
                ['Program Studi', $siteIdentity->prodi, 'graduation-cap'],
                ['Mata Kuliah', $siteIdentity->mata_kuliah, 'book-marked'],
                ['Dosen', $siteIdentity->dosen, 'user-round'],
            ] as [$label, $value, $icon])
                <div class="identity-card"><i data-lucide="{{ $icon }}" class="h-5 w-5"></i><span><small>{{ $label }}</small><strong>{{ $value }}</strong></span></div>
            @endforeach
        </div>
    </div>
</section>
@endif
