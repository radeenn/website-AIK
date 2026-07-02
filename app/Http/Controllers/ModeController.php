<?php

namespace App\Http\Controllers;

use App\Models\Gerakan;
use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ModeController extends Controller
{
    public function __invoke(Request $request, Kategori $kategori): RedirectResponse
    {
        session(['mode' => $kategori->slug]);

        if ($request->filled('urutan')) {
            $movement = Gerakan::query()
                ->where('kategori_id', $kategori->id)
                ->where('urutan', (int) $request->query('urutan'))
                ->where('status_aktif', true)
                ->first();

            if ($movement) {
                return redirect()->route('movements.show', $movement->slug)
                    ->with('success', "Mode {$kategori->nama} diaktifkan.");
            }
        }

        return redirect()->back()->with('success', "Mode {$kategori->nama} diaktifkan.");
    }
}
