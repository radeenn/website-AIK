<?php

namespace App\Http\Controllers;

use App\Models\Gerakan;
use App\Models\Kategori;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $activeCategory = $this->activeCategory();

        $popularMovements = Gerakan::query()
            ->with('kategori')
            ->where('kategori_id', $activeCategory?->id)
            ->where('status_aktif', true)
            ->orderBy('urutan')
            ->limit(4)
            ->get();

        return view('home', compact('activeCategory', 'popularMovements'));
    }

    private function activeCategory(): ?Kategori
    {
        $slug = session('mode', 'dewasa');

        return Kategori::query()->where('slug', $slug)->first()
            ?? Kategori::query()->orderBy('id')->first();
    }
}
