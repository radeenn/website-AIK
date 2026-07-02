<aside x-data="{ open: false }" class="lg:w-72 lg:shrink-0">
    <div class="flex h-16 items-center justify-between bg-emerald-950 px-4 text-white lg:hidden">
        <span class="font-extrabold">Admin Tuntun Sholat</span>
        <button @click="open=!open" class="icon-button border-white/20 bg-white/10 text-white" type="button"><i data-lucide="menu" class="h-5 w-5"></i></button>
    </div>
    <div x-show="open" x-cloak @click.outside="open=false" class="fixed inset-x-0 top-16 z-40 bg-emerald-950 p-4 text-white shadow-xl lg:hidden">
        @include('components.partials.admin-links')
    </div>
    <div class="fixed inset-y-0 hidden w-72 overflow-y-auto bg-emerald-950 p-5 text-white lg:block">
        <a href="{{ route('admin.dashboard') }}" class="mb-8 flex items-center gap-3"><img src="{{ asset('images/logo.svg') }}" alt="" class="h-12 w-12"><span><strong class="block text-lg">Tuntun Sholat</strong><small class="text-emerald-200">Panel Administrator</small></span></a>
        @include('components.partials.admin-links')
    </div>
</aside>
