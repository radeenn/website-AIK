<?php

namespace App\Providers;

use App\Models\Kategori;
use App\Models\Kelompok;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useTailwind();
        View::composer('*', function ($view): void {
            try {
                $identity = Schema::hasTable('kelompok')
                    ? Cache::remember('site.identity', now()->addHour(), fn () => Kelompok::query()->first())
                    : null;

                $categories = Schema::hasTable('kategori')
                    ? Cache::remember('site.categories', now()->addHour(), fn () => Kategori::query()->orderBy('id')->get())
                    : collect();
            } catch (Throwable) {
                $identity = null;
                $categories = collect();
            }

            $view->with([
                'siteIdentity' => $identity,
                'siteCategories' => $categories,
                'activeModeSlug' => session('mode', 'dewasa'),
            ]);
        });
    }
}
