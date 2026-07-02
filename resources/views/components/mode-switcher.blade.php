@props(['compact' => false, 'urutan' => null])
@if(($siteCategories ?? collect())->isNotEmpty())
<div class="mode-switcher {{ $compact ? 'mode-switcher-compact' : '' }}" role="group" aria-label="Pilih mode pengguna">
    @foreach($siteCategories as $category)
        <a href="{{ route('mode.switch', ['kategori' => $category, 'urutan' => $urutan]) }}"
           class="mode-option {{ ($activeModeSlug ?? 'dewasa') === $category->slug ? 'active' : '' }}"
           style="--mode-color: {{ $category->warna }}">
            {{ $category->nama }}
        </a>
    @endforeach
</div>
@endif
