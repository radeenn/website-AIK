<?php

namespace Database\Seeders;

use App\Models\Kelompok;
use Illuminate\Database\Seeder;

class KelompokSeeder extends Seeder
{
    public function run(): void
    {
        Kelompok::query()->updateOrCreate(
            ['nama_kelompok' => 'Kelompok Tuntun Sholat'],
            [
                'prodi' => 'Manajemen Bisnis Syariah',
                'mata_kuliah' => 'Pengembangan Aplikasi Web / Praktikum Pemrograman Web',
                'dosen' => 'Dedy Susanto, S.Pd.I., M.M.',
            ]
        );
    }
}
