<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KelompokFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_kelompok' => 'Kelompok '.fake()->numberBetween(1, 10),
            'prodi' => 'Manajemen Bisnis Syariah',
            'mata_kuliah' => 'Pengembangan Aplikasi Web',
            'dosen' => fake()->name().', M.M.',
        ];
    }
}
