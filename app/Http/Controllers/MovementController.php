<?php

namespace App\Http\Controllers;

use App\Models\Gerakan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovementController extends Controller
{
    public function index(Request $request): View
    {
        $activeCategory = $this->activeCategory();
        $search = trim((string) $request->query('q'));

        $movements = Gerakan::query()
            ->with(['kategori', 'bacaan'])
            ->where('kategori_id', $activeCategory?->id)
            ->where('status_aktif', true)
            ->when($search !== '', fn ($query) => $query->where(function ($inner) use ($search) {
                $inner->where('nama', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('deskripsi_sederhana', 'like', "%{$search}%");
            }))
            ->orderBy('urutan')
            ->get();

        return view('movements.index', compact('activeCategory', 'movements', 'search'));
    }

    public function show(string $slug): View
    {
        $activeCategory = $this->activeCategory();

        $movement = Gerakan::query()
            ->with(['kategori', 'bacaan'])
            ->where('kategori_id', $activeCategory?->id)
            ->where('slug', $slug)
            ->where('status_aktif', true)
            ->firstOrFail();

        $allMovements = Gerakan::query()
            ->where('kategori_id', $activeCategory?->id)
            ->where('status_aktif', true)
            ->orderBy('urutan')
            ->get(['id', 'nama', 'slug', 'urutan']);

        $previous = $allMovements->where('urutan', '<', $movement->urutan)->sortByDesc('urutan')->first();
        $next = $allMovements->where('urutan', '>', $movement->urutan)->sortBy('urutan')->first();

        return view('movements.show', compact('activeCategory', 'movement', 'allMovements', 'previous', 'next'));
    }

    private function activeCategory(): ?Kategori
    {
        $slug = session('mode', 'dewasa');

        return Kategori::query()->where('slug', $slug)->first()
            ?? Kategori::query()->orderBy('id')->first();
    }
}
