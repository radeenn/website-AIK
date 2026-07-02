@props(['src', 'title' => 'Audio Bacaan'])
<div x-data="audioPlayer()" class="audio-player" data-audio-item>
    <audio x-ref="audio" preload="metadata" src="{{ $src }}"></audio>
    <button @click="toggle" type="button" class="audio-play" :aria-label="playing ? 'Jeda audio' : 'Putar audio'">
        <i x-show="!playing" data-lucide="play" class="h-5 w-5"></i>
        <i x-show="playing" x-cloak data-lucide="pause" class="h-5 w-5"></i>
    </button>
    <div class="min-w-0 flex-1">
        <div class="mb-1 flex items-center justify-between gap-3 text-xs font-semibold text-slate-600">
            <span class="truncate">{{ $title }}</span>
            <span x-text="format(currentTime) + ' / ' + format(duration)">0:00 / 0:00</span>
        </div>
        <input x-model.number="currentTime" @input="seek" class="audio-range" type="range" min="0" :max="duration || 0" step="0.1" aria-label="Posisi audio">
    </div>
    <div class="hidden items-center gap-2 sm:flex">
        <i data-lucide="volume-2" class="h-4 w-4 text-slate-500"></i>
        <input x-model.number="volume" @input="setVolume" class="audio-volume" type="range" min="0" max="1" step="0.05" aria-label="Volume audio">
    </div>
</div>
