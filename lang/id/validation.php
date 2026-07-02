<?php

return [
    'required' => ':attribute wajib diisi.',
    'email' => ':attribute harus berupa alamat email yang valid.',
    'unique' => ':attribute sudah digunakan.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'image' => ':attribute harus berupa gambar.',
    'mimes' => ':attribute harus berformat: :values.',
    'max' => [
        'file' => 'Ukuran :attribute maksimal :max kilobyte.',
        'string' => 'Panjang :attribute maksimal :max karakter.',
        'numeric' => 'Nilai :attribute maksimal :max.',
    ],
    'min' => [
        'numeric' => 'Nilai :attribute minimal :min.',
        'string' => 'Panjang :attribute minimal :min karakter.',
    ],
    'integer' => ':attribute harus berupa bilangan bulat.',
    'boolean' => ':attribute harus bernilai benar atau salah.',
    'url' => ':attribute harus berupa URL yang valid.',
    'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'attributes' => [
        'nama_kelompok' => 'nama kelompok', 'prodi' => 'program studi', 'mata_kuliah' => 'mata kuliah',
        'dosen' => 'dosen', 'nama' => 'nama', 'slug' => 'slug', 'deskripsi' => 'deskripsi',
        'warna' => 'warna', 'kategori_id' => 'kategori', 'urutan' => 'urutan', 'deskripsi_sederhana' => 'deskripsi sederhana',
        'gambar' => 'gambar', 'video_file' => 'video', 'video_url' => 'URL video', 'gerakan_id' => 'gerakan',
        'judul' => 'judul', 'teks_arab' => 'teks Arab', 'teks_latin' => 'transliterasi Latin',
        'terjemahan' => 'terjemahan', 'terjemahan_ringkas' => 'terjemahan ringkas', 'audio' => 'audio', 'sumber' => 'sumber',
        'password' => 'kata sandi',
    ],
];
