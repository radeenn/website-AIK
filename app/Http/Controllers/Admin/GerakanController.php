<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GerakanRequest;
use App\Models\Gerakan;
use App\Models\Kategori;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GerakanController extends Controller
{
    public function __construct(private readonly MediaService $media)
    {
    }

    public function index(Request $request): View
    {
        $items = Gerakan::query()
            ->with('kategori')
            ->withCount('bacaan')
            ->when($request->filled('q'), fn ($query) => $query->where('nama', 'like', '%'.trim((string) $request->q).'%'))
            ->orderBy('kategori_id')
            ->orderBy('urutan')
            ->paginate(15)
            ->withQueryString();

        return view('admin.gerakan.index', compact('items'));
    }

    public function create(): View
    {
        $categories = Kategori::query()->orderBy('nama')->get();
        return view('admin.gerakan.create', compact('categories'));
    }

    public function store(GerakanRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['gambar', 'video_file']);
        $data['gambar_url'] = $this->media->storeImageAsWebp($request->file('gambar'), 'media/images');
        if ($request->hasFile('video_file')) {
            $data['video_url'] = $this->media->store($request->file('video_file'), 'media/videos');
        }

        Gerakan::query()->create($data);

        return redirect()->route('admin.gerakan.index')->with('success', 'Gerakan berhasil ditambahkan.');
    }

    public function edit(Gerakan $gerakan): View
    {
        $categories = Kategori::query()->orderBy('nama')->get();
        return view('admin.gerakan.edit', compact('gerakan', 'categories'));
    }

    public function update(GerakanRequest $request, Gerakan $gerakan): RedirectResponse
    {
        $data = $request->safe()->except(['gambar', 'video_file']);

        if ($request->hasFile('gambar')) {
            $this->media->delete($gerakan->gambar_url);
            $data['gambar_url'] = $this->media->storeImageAsWebp($request->file('gambar'), 'media/images');
        }

        if ($request->hasFile('video_file')) {
            $this->media->delete($gerakan->video_url);
            $data['video_url'] = $this->media->store($request->file('video_file'), 'media/videos');
        } elseif ($request->filled('video_url')) {
            $this->media->delete($gerakan->video_url);
            $data['video_url'] = $request->string('video_url')->toString();
        } else {
            unset($data['video_url']);
        }

        $gerakan->update($data);

        return redirect()->route('admin.gerakan.index')->with('success', 'Gerakan berhasil diperbarui.');
    }

    public function destroy(Gerakan $gerakan): RedirectResponse
    {
        $this->media->delete($gerakan->gambar_url);
        $this->media->delete($gerakan->video_url);
        foreach ($gerakan->bacaan as $bacaan) {
            $this->media->delete($bacaan->audio_url);
        }
        $gerakan->delete();

        return redirect()->route('admin.gerakan.index')->with('success', 'Gerakan berhasil dihapus.');
    }
}
