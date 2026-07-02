<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('tuntun:info', function () {
    $this->info('Tuntun Sholat siap digunakan.');
})->purpose('Menampilkan informasi singkat aplikasi');
