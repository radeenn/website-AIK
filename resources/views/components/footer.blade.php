<footer class="mt-16 border-t border-emerald-950/10 bg-emerald-950 text-emerald-50">
    <div class="container-shell grid gap-8 py-10 md:grid-cols-[1.3fr_1fr_1fr]">
        <div>
            <div class="flex items-center gap-3"><img src="{{ asset('images/logo.svg') }}" alt="" class="h-11 w-11"><span class="text-xl font-extrabold">Tuntun Sholat</span></div>
            <p class="mt-4 max-w-xl text-sm leading-7 text-emerald-100/80">Media edukasi untuk mempelajari gerakan dan bacaan sholat secara terstruktur. Seluruh materi keagamaan wajib diverifikasi dari sumber resmi HPT Muhammadiyah sebelum dipublikasikan.</p>
        </div>
        <div>
            <h2 class="font-bold">Navigasi</h2>
            <div class="mt-3 grid gap-2 text-sm text-emerald-100/80"><a href="{{ route('movements.index') }}">Daftar Gerakan</a><a href="{{ route('guide') }}">Panduan</a><a href="{{ route('about') }}">Tentang Aplikasi</a><a href="{{ route('team') }}">Tentang Kami</a></div>
        </div>
        <div>
            <h2 class="font-bold">Sumber Konten</h2>
            <p class="mt-3 text-sm leading-7 text-emerald-100/80">Himpunan Putusan Tarjih Muhammadiyah, Kitab Shalat.</p>
            <a href="{{ route('admin.login') }}" class="mt-4 inline-flex text-sm font-semibold text-amber-300">Masuk Admin</a>
        </div>
    </div>
    <div class="border-t border-white/10 py-4 text-center text-xs text-emerald-100/70">&copy; {{ date('Y') }} {{ $siteIdentity?->nama_kelompok ?? 'Kelompok Tuntun Sholat' }}. Dibuat untuk keperluan pembelajaran.</div>
</footer>
