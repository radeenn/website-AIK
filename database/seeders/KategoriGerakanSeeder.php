<?php

namespace Database\Seeders;

use App\Models\Bacaan;
use App\Models\Gerakan;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriGerakanSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function (): void {
            $adult = Kategori::query()->updateOrCreate(
                ['slug' => 'dewasa'],
                [
                    'nama' => 'Dewasa',
                    'deskripsi' => 'Penyajian lengkap, formal, dan tenang untuk pengguna dewasa.',
                    'warna' => '#087A5B',
                ]
            );

            $child = Kategori::query()->updateOrCreate(
                ['slug' => 'anak-anak'],
                [
                    'nama' => 'Anak-anak',
                    'deskripsi' => 'Penyajian lebih sederhana, visual, dan ramah untuk anak-anak.',
                    'warna' => '#4A9FD8',
                ]
            );

            $movements = [
                ['Berdiri Tegak Menghadap Kiblat', 'Berdiri dengan posisi tenang dan bersiap mengikuti panduan yang telah diverifikasi.', 'Berdiri tegak dan bersiap dengan tenang.'],
                ['Takbiratul Ihram', 'Pelajari posisi dan urutan takbiratul ihram berdasarkan materi HPT yang telah diverifikasi.', 'Ikuti contoh gerakan takbir dengan perlahan.'],
                ['Bersedekap', 'Pelajari posisi bersedekap melalui gambar, penjelasan, audio, dan video yang tersedia.', 'Letakkan tangan sesuai contoh yang sudah diperiksa.'],
                ['Berdiri Membaca Al-Fatihah', 'Tahap berdiri dan membaca ditampilkan bersama sumber bacaan resmi yang harus diverifikasi.', 'Berdiri tenang sambil mengikuti bacaan.'],
                ['Rukuk', 'Pelajari posisi rukuk secara bertahap dan lakukan dengan tenang sesuai panduan terverifikasi.', 'Membungkuk dengan tenang mengikuti contoh.'],
                ["I'tidal", "Pelajari perpindahan dari rukuk menuju i'tidal melalui materi yang telah diverifikasi.", 'Kembali berdiri dengan tenang.'],
                ['Sujud Pertama', 'Pelajari urutan sujud pertama melalui gambar dan media pembelajaran yang tersedia.', 'Ikuti posisi sujud dari gambar.'],
                ['Duduk di Antara Dua Sujud', 'Pelajari posisi duduk di antara dua sujud melalui penjelasan terstruktur.', 'Duduk dengan tenang sesuai contoh.'],
                ['Sujud Kedua', 'Pelajari urutan sujud kedua dengan bantuan ilustrasi, audio, dan video.', 'Lakukan sujud kedua mengikuti contoh.'],
                ['Berdiri ke Rakaat Berikutnya', 'Pelajari perpindahan menuju rakaat berikutnya berdasarkan materi terverifikasi.', 'Berdiri kembali dengan perlahan.'],
                ['Tasyahud Awal', 'Pelajari posisi dan bacaan tasyahud awal dari sumber resmi yang telah diverifikasi.', 'Duduk dan ikuti panduan tasyahud awal.'],
                ['Tasyahud Akhir', 'Pelajari posisi dan bacaan tasyahud akhir dari sumber resmi yang telah diverifikasi.', 'Duduk dan ikuti panduan tasyahud akhir.'],
                ['Salam', 'Pelajari tahap salam sebagai penutup rangkaian melalui materi yang telah diverifikasi.', 'Ikuti gerakan salam sesuai contoh.'],
            ];

            foreach ([$adult, $child] as $category) {
                foreach ($movements as $index => [$name, $adultDescription, $childDescription]) {
                    $order = $index + 1;
                    $baseSlug = Str::slug($name);
                    $slug = $category->slug === 'dewasa' ? $baseSlug : $baseSlug.'-anak';

                    $movement = Gerakan::query()->updateOrCreate(
                        ['kategori_id' => $category->id, 'urutan' => $order],
                        [
                            'nama' => $name,
                            'slug' => $slug,
                            'deskripsi' => $adultDescription,
                            'deskripsi_sederhana' => $childDescription,
                            'gambar_url' => sprintf('media/images/movement-%02d.svg', $order),
                            'video_url' => 'media/videos/video-contoh.mp4',
                            'status_aktif' => true,
                        ]
                    );

                    Bacaan::query()->updateOrCreate(
                        ['gerakan_id' => $movement->id, 'urutan' => 1],
                        [
                            'judul' => 'Bacaan '.$name,
                            // WAJIB diganti dengan teks yang telah diverifikasi dari sumber resmi HPT Muhammadiyah sebelum publikasi.
                            'teks_arab' => '[Masukkan teks Arab yang telah diverifikasi dari HPT Muhammadiyah]',
                            'teks_latin' => '[Masukkan transliterasi resmi]',
                            'terjemahan' => '[Masukkan terjemahan resmi]',
                            'terjemahan_ringkas' => '[Masukkan terjemahan ringkas yang tetap mempertahankan makna]',
                            'audio_url' => 'media/audio/audio-contoh.mp3',
                            'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah, Kitab Shalat',
                        ]
                    );
                }
            }
        });
    }
}
