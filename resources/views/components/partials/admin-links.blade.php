<nav class="grid gap-1" aria-label="Navigasi admin">
    @foreach([
        ['admin.dashboard', 'layout-dashboard', 'Dashboard'],
        ['admin.kelompok.index', 'users-round', 'Identitas Kelompok'],
        ['admin.kategori.index', 'layers-3', 'Kategori'],
        ['admin.gerakan.index', 'list-checks', 'Gerakan'],
        ['admin.bacaan.index', 'audio-lines', 'Bacaan & Audio'],
    ] as [$route, $icon, $label])
        <a href="{{ route($route) }}" class="admin-nav-link {{ request()->routeIs(str_replace('.index', '.*', $route)) || request()->routeIs($route) ? 'active' : '' }}"><i data-lucide="{{ $icon }}" class="h-5 w-5"></i>{{ $label }}</a>
    @endforeach
</nav>
