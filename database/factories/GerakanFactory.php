<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GerakanFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);
        return [
            'kategori_id' => Kategori::factory(),
            'nama' => Str::title($name),
            'slug' => Str::slug($name),
            'urutan' => fake()->numberBetween(1, 99),
            'deskripsi' => fake()->paragraph(),
            'deskripsi_sederhana' => fake()->sentence(),
            'gambar_url' => null,
            'video_url' => null,
            'status_aktif' => true,
        ];
    }
}
