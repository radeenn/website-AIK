@props(['previous' => null, 'next' => null])
<nav class="mt-8 grid gap-3 sm:grid-cols-2" aria-label="Navigasi gerakan">
    @if($previous)
        <a href="{{ route('movements.show', $previous->slug) }}" class="navigation-card">
            <i data-lucide="arrow-left" class="h-5 w-5"></i>
            <span><small>Sebelumnya</small><strong>{{ $previous->nama }}</strong></span>
        </a>
    @else
        <span></span>
    @endif
    @if($next)
        <a href="{{ route('movements.show', $next->slug) }}" class="navigation-card justify-end text-right">
            <span><small>Selanjutnya</small><strong>{{ $next->nama }}</strong></span>
            <i data-lucide="arrow-right" class="h-5 w-5"></i>
        </a>
    @endif
</nav>
