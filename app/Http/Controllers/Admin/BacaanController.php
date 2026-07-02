<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BacaanRequest;
use App\Models\Bacaan;
use App\Models\Gerakan;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BacaanController extends Controller
{
    public function __construct(private readonly MediaService $media)
    {
    }

    public function index(Request $request): View
    {
        $items = Bacaan::query()
            ->with(['gerakan.kategori'])
            ->when($request->filled('q'), fn ($query) => $query->where('judul', 'like', '%'.trim((string) $request->q).'%'))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.bacaan.index', compact('items'));
    }

    public function create(): View
    {
        $movements = Gerakan::query()->with('kategori')->orderBy('kategori_id')->orderBy('urutan')->get();
        return view('admin.bacaan.create', compact('movements'));
    }

    public function store(BacaanRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('audio');
        $data['audio_url'] = $this->media->store($request->file('audio'), 'media/audio');
        Bacaan::query()->create($data);

        return redirect()->route('admin.bacaan.index')->with('success', 'Bacaan berhasil ditambahkan.');
    }

    public function edit(Bacaan $bacaan): View
    {
        $movements = Gerakan::query()->with('kategori')->orderBy('kategori_id')->orderBy('urutan')->get();
        return view('admin.bacaan.edit', compact('bacaan', 'movements'));
    }

    public function update(BacaanRequest $request, Bacaan $bacaan): RedirectResponse
    {
        $data = $request->safe()->except('audio');
        if ($request->hasFile('audio')) {
            $this->media->delete($bacaan->audio_url);
            $data['audio_url'] = $this->media->store($request->file('audio'), 'media/audio');
        }
        $bacaan->update($data);

        return redirect()->route('admin.bacaan.index')->with('success', 'Bacaan berhasil diperbarui.');
    }

    public function destroy(Bacaan $bacaan): RedirectResponse
    {
        $this->media->delete($bacaan->audio_url);
        $bacaan->delete();

        return redirect()->route('admin.bacaan.index')->with('success', 'Bacaan berhasil dihapus.');
    }
}
