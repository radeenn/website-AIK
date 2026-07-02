@props(['src', 'title' => 'Video Gerakan'])
<div x-data="videoModal()" @keydown.escape.window="close" class="mt-4">
    <button @click="open" type="button" class="btn-secondary w-full justify-center"><i data-lucide="circle-play" class="h-5 w-5"></i> Tonton Video Gerakan</button>
    <template x-teleport="body">
        <div x-show="visible" x-cloak x-transition.opacity class="fixed inset-0 z-[100] grid place-items-center bg-slate-950/75 p-4" role="dialog" aria-modal="true" aria-label="{{ $title }}">
            <div @click.outside="close" x-transition.scale class="w-full max-w-4xl overflow-hidden rounded-3xl bg-white shadow-2xl">
                <header class="flex items-center justify-between border-b px-5 py-4">
                    <h2 class="font-extrabold text-slate-900">{{ $title }}</h2>
                    <button @click="close" type="button" class="icon-button"><span class="sr-only">Tutup modal</span><i data-lucide="x" class="h-5 w-5"></i></button>
                </header>
                <div class="bg-black">
                    <video x-ref="video" class="aspect-video w-full" controls preload="metadata" src="{{ $src }}"></video>
                </div>
                <p class="px-5 py-4 text-sm text-slate-600">Video contoh bersifat placeholder. Ganti dengan materi yang telah diverifikasi sebelum publikasi.</p>
            </div>
        </div>
    </template>
</div>
