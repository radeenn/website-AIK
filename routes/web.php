<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BacaanController as AdminBacaanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GerakanController as AdminGerakanController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\KelompokController as AdminKelompokController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModeController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/gerakan', [MovementController::class, 'index'])->name('movements.index');
Route::get('/gerakan/{slug}', [MovementController::class, 'show'])->name('movements.show');
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/panduan', [PageController::class, 'guide'])->name('guide');
Route::get('/tentang-kami', [PageController::class, 'team'])->name('team');
Route::get('/mode/{kategori}', ModeController::class)->name('mode.switch');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::middleware('guest')->group(function (): void {
        Route::get('/login', [AdminAuthController::class, 'create'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'store'])->name('login.store');
    });

    Route::middleware(['auth', 'admin'])->group(function (): void {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');
        Route::resource('kelompok', AdminKelompokController::class)->except('show');
        Route::resource('kategori', AdminKategoriController::class)->except('show');
        Route::resource('gerakan', AdminGerakanController::class)->except('show');
        Route::resource('bacaan', AdminBacaanController::class)->except('show');
    });
});
