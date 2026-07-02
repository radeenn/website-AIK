<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KelompokRequest;
use App\Models\Kelompok;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class KelompokController extends Controller
{
    public function index(): View
    {
        $items = Kelompok::query()->latest()->paginate(10);
        return view('admin.kelompok.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.kelompok.create');
    }

    public function store(KelompokRequest $request): RedirectResponse
    {
        Kelompok::query()->create($request->validated());
        Cache::forget('site.identity');
        return redirect()->route('admin.kelompok.index')->with('success', 'Identitas kelompok berhasil ditambahkan.');
    }

    public function edit(Kelompok $kelompok): View
    {
        return view('admin.kelompok.edit', compact('kelompok'));
    }

    public function update(KelompokRequest $request, Kelompok $kelompok): RedirectResponse
    {
        $kelompok->update($request->validated());
        Cache::forget('site.identity');
        return redirect()->route('admin.kelompok.index')->with('success', 'Identitas kelompok berhasil diperbarui.');
    }

    public function destroy(Kelompok $kelompok): RedirectResponse
    {
        $kelompok->delete();
        Cache::forget('site.identity');
        return redirect()->route('admin.kelompok.index')->with('success', 'Identitas kelompok berhasil dihapus.');
    }
}
