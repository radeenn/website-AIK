# Laporan Pemeriksaan Project Tuntun Sholat

Tanggal pemeriksaan: 25 Juni 2026

## Pemeriksaan yang berhasil dijalankan

- Seluruh file PHP pada folder `app`, `bootstrap`, `config`, `database`, `public`, `routes`, dan `tests` lolos `php -l` tanpa kesalahan sintaks.
- `resources/js/app.js` lolos pemeriksaan sintaks Node.js.
- `npm install` berhasil dan menghasilkan `package-lock.json`.
- `npm run build` berhasil menggunakan Vite 8; manifest, CSS produksi, dan JavaScript produksi tersedia di `public/build`.
- `composer.json` dan `package.json` merupakan JSON valid.
- Semua 35 referensi named route yang dipakai kode memiliki definisi route yang sesuai.
- Semua Blade component yang digunakan tersedia.
- Semua aset statis yang dirujuk dari Blade tersedia.
- Seluruh media seed tersedia: 13 ilustrasi gerakan, satu MP3 contoh, dan satu MP4 contoh.
- File MP3 contoh dapat dibaca oleh `ffprobe` dengan durasi sekitar 2 detik.
- File MP4 contoh dapat dibaca oleh `ffprobe` dengan durasi 4 detik.
- Project berisi migration, model, factory, seeder, controller, Form Request, middleware, service, Blade component, halaman publik, CRUD admin, dan feature test.

## Pemeriksaan yang belum dapat dijalankan di lingkungan pembuatan

`composer` tidak tersedia di lingkungan pembuatan. Karena dependency PHP belum dapat dipasang, proses berikut belum dapat dijalankan langsung di sini:

- `composer install`
- booting framework melalui `php artisan`
- migration MySQL secara nyata
- browser test end-to-end
- `php artisan test`

Hal ini bukan berarti perintah tersebut gagal; pengujian runtime perlu diselesaikan pada komputer yang memiliki Composer dan akses pemasangan dependency.

## Pemeriksaan runtime yang perlu dijalankan setelah ekstraksi

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate:fresh --seed
npm install
npm run build
php artisan route:list
php artisan test
php artisan serve
```

Untuk mode pengembangan aset, gunakan `npm run dev` sebagai pengganti `npm run build`.

## Akun uji admin

- Email: `admin@tuntunsholat.test`
- Kata sandi: `password123`

Ganti kata sandi sebelum deployment.

## Catatan konten keagamaan

Semua bacaan seed masih berupa placeholder yang disengaja. Jangan memublikasikan aplikasi sebelum teks Arab, transliterasi, terjemahan, sumber, audio, dan video diverifikasi dari sumber resmi HPT Muhammadiyah.
