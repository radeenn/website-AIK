<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bacaan;
use App\Models\Gerakan;
use App\Models\Kategori;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            'gerakan' => Gerakan::query()->count(),
            'bacaan' => Bacaan::query()->count(),
            'kategori' => Kategori::query()->count(),
            'audio' => Bacaan::query()->whereNotNull('audio_url')->count(),
            'video' => Gerakan::query()->whereNotNull('video_url')->count(),
        ];

        $latestMovements = Gerakan::query()->with('kategori')->latest()->limit(6)->get();
        $latestRecitations = Bacaan::query()->with('gerakan')->latest()->limit(6)->get();

        return view('admin.dashboard', compact('stats', 'latestMovements', 'latestRecitations'));
    }
}
