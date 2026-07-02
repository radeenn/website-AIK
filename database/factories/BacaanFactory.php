<?php

namespace Database\Factories;

use App\Models\Gerakan;
use Illuminate\Database\Eloquent\Factories\Factory;

class BacaanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'gerakan_id' => Gerakan::factory(),
            'urutan' => 1,
            'judul' => 'Bacaan Gerakan',
            'teks_arab' => '[Masukkan teks Arab yang telah diverifikasi dari HPT Muhammadiyah]',
            'teks_latin' => '[Masukkan transliterasi resmi]',
            'terjemahan' => '[Masukkan terjemahan resmi]',
            'terjemahan_ringkas' => '[Masukkan terjemahan ringkas yang tetap mempertahankan makna]',
            'audio_url' => 'media/audio/audio-contoh.mp3',
            'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah, Kitab Shalat',
        ];
    }
}
