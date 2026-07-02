<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KategoriFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->word();
        return [
            'nama' => Str::title($name),
            'slug' => Str::slug($name),
            'deskripsi' => fake()->sentence(),
            'warna' => '#087A5B',
        ];
    }
}
