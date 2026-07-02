<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KategoriRequest;
use App\Models\Kategori;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function __construct(private readonly MediaService $media)
    {
    }
    public function index(): View
    {
        $items = Kategori::query()->withCount('gerakan')->latest()->paginate(10);
        return view('admin.kategori.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.kategori.create');
    }

    public function store(KategoriRequest $request): RedirectResponse
    {
        Kategori::query()->create($request->validated());
        Cache::forget('site.categories');
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori): View
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(KategoriRequest $request, Kategori $kategori): RedirectResponse
    {
        $kategori->update($request->validated());
        Cache::forget('site.categories');
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori): RedirectResponse
    {
        $kategori->load('gerakan.bacaan');
        foreach ($kategori->gerakan as $gerakan) {
            $this->media->delete($gerakan->gambar_url);
            $this->media->delete($gerakan->video_url);
            foreach ($gerakan->bacaan as $bacaan) {
                $this->media->delete($bacaan->audio_url);
            }
        }
        $kategori->delete();
        Cache::forget('site.categories');
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori beserta data terkait berhasil dihapus.');
    }
}
