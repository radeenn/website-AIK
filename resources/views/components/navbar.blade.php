<header x-data="{ open: false }" class="sticky top-0 z-50 border-b border-emerald-950/10 bg-[#fffdf8]/95 backdrop-blur-xl">
    <nav class="container-shell flex min-h-18 items-center justify-between gap-4" aria-label="Navigasi utama">
        <a href="{{ route('home') }}" class="group flex min-w-0 items-center gap-3 focus-ring rounded-xl">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo Tuntun Sholat" class="h-11 w-11 shrink-0 transition group-hover:scale-105">
            <span class="min-w-0">
                <span class="block truncate text-lg font-extrabold text-emerald-900">Tuntun Sholat</span>
                <span class="hidden truncate text-[11px] font-medium text-slate-500 sm:block">Panduan sesuai HPT Muhammadiyah</span>
            </span>
        </a>

        <div class="hidden items-center gap-1 lg:flex">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('movements.index') }}" class="nav-link {{ request()->routeIs('movements.*') ? 'active' : '' }}">Daftar Gerakan</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
            <a href="{{ route('guide') }}" class="nav-link {{ request()->routeIs('guide') ? 'active' : '' }}">Panduan</a>
            <a href="{{ route('team') }}" class="nav-link {{ request()->routeIs('team') ? 'active' : '' }}">Tentang Kami</a>
        </div>

        <div class="hidden items-center gap-3 lg:flex">
            <x-mode-switcher compact />
            <a href="{{ route('movements.index') }}" class="btn-primary">Mulai Belajar <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        <button @click="open = !open" :aria-expanded="open" aria-controls="mobile-menu" class="icon-button lg:hidden" type="button">
            <span class="sr-only">Buka menu</span>
            <i x-show="!open" data-lucide="menu" class="h-5 w-5"></i>
            <i x-show="open" x-cloak data-lucide="x" class="h-5 w-5"></i>
        </button>
    </nav>

    <div id="mobile-menu" x-show="open" x-transition x-cloak @click.outside="open = false" class="border-t border-emerald-950/10 bg-white px-4 py-4 lg:hidden">
        <div class="mx-auto grid max-w-xl gap-2">
            <a @click="open=false" href="{{ route('home') }}" class="mobile-link">Beranda</a>
            <a @click="open=false" href="{{ route('movements.index') }}" class="mobile-link">Daftar Gerakan</a>
            <a @click="open=false" href="{{ route('about') }}" class="mobile-link">Tentang</a>
            <a @click="open=false" href="{{ route('guide') }}" class="mobile-link">Panduan</a>
            <a @click="open=false" href="{{ route('team') }}" class="mobile-link">Tentang Kami</a>
            <div class="mt-2 border-t border-slate-100 pt-3"><x-mode-switcher /></div>
        </div>
    </div>

    <nav class="fixed inset-x-3 bottom-3 z-50 grid grid-cols-4 rounded-2xl border border-emerald-950/10 bg-white/95 p-2 shadow-2xl backdrop-blur md:hidden" aria-label="Navigasi bawah">
        <a href="{{ route('home') }}" class="bottom-link {{ request()->routeIs('home') ? 'active' : '' }}"><i data-lucide="house" class="h-5 w-5"></i><span>Beranda</span></a>
        <a href="{{ route('movements.index') }}" class="bottom-link {{ request()->routeIs('movements.*') ? 'active' : '' }}"><i data-lucide="list-checks" class="h-5 w-5"></i><span>Gerakan</span></a>
        <a href="{{ route('about') }}" class="bottom-link {{ request()->routeIs('about') ? 'active' : '' }}"><i data-lucide="circle-info" class="h-5 w-5"></i><span>Tentang</span></a>
        <a href="{{ route('guide') }}" class="bottom-link {{ request()->routeIs('guide') ? 'active' : '' }}"><i data-lucide="book-open" class="h-5 w-5"></i><span>Panduan</span></a>
    </nav>
</header>
