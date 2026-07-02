@if(session('success') || session('error') || $errors->any())
<div x-data="{ show: true }" x-show="show" x-transition class="container-shell mt-4">
    <div class="flex items-start gap-3 rounded-2xl border px-4 py-3 shadow-sm {{ session('error') || $errors->any() ? 'border-red-200 bg-red-50 text-red-800' : 'border-emerald-200 bg-emerald-50 text-emerald-800' }}" role="alert">
        <i data-lucide="{{ session('error') || $errors->any() ? 'circle-alert' : 'circle-check' }}" class="mt-0.5 h-5 w-5 shrink-0"></i>
        <div class="min-w-0 flex-1 text-sm">
            @if(session('success'))<p>{{ session('success') }}</p>@endif
            @if(session('error'))<p>{{ session('error') }}</p>@endif
            @if($errors->any())
                <p class="font-bold">Periksa kembali data berikut:</p>
                <ul class="mt-1 list-inside list-disc">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            @endif
        </div>
        <button @click="show=false" type="button" class="rounded-lg p-1 hover:bg-black/5"><span class="sr-only">Tutup</span><i data-lucide="x" class="h-4 w-4"></i></button>
    </div>
</div>
@endif
