# Tuntun Sholat

**Tuntunan Tata Cara Sholat Sesuai Sunnah Rasulullah ﷺ**  
Sumber gerakan dan bacaan: **Himpunan Putusan Tarjih (HPT) Muhammadiyah**

Tuntun Sholat adalah aplikasi web full-stack responsif untuk mempelajari urutan gerakan sholat melalui gambar, penjelasan, bacaan, audio, dan video. Aplikasi menyediakan mode Dewasa dan Anak-anak, pencatatan progres belajar, serta panel administrator untuk mengelola seluruh konten dari database.

> **Peringatan konten:** data bacaan bawaan berupa placeholder yang aman. Teks Arab, transliterasi, terjemahan, audio, video, dan sumber wajib diverifikasi dari sumber resmi HPT Muhammadiyah sebelum website dipublikasikan.

## Teknologi

- Laravel 13
- PHP 8.3 atau lebih baru
- Laravel Blade
- Tailwind CSS 4
- Alpine.js
- MySQL
- Laravel Storage
- Lucide Icons
- Vite

## Fitur F-01 sampai F-09

| Kode | Fitur | Implementasi |
|---|---|---|
| F-01 | Daftar gerakan sholat | Halaman `/gerakan`, pencarian, progress, dan 13 tahap dari database |
| F-02 | Detail gerakan | Gambar, deskripsi, Arab, Latin, terjemahan, dan sumber |
| F-03 | Audio bacaan | Pemutar MP3 kustom dengan play, pause, durasi, progress, dan volume |
| F-04 | Opsi video | Video HTML5 melalui modal yang dapat ditutup dengan Escape |
| F-05 | Next dan Previous | Navigasi gerakan sebelum dan berikutnya |
| F-06 | Autoplay berurutan | Audio berurutan dan perpindahan otomatis ke gerakan berikutnya |
| F-07 | Mode Dewasa dan Anak-anak | Tema, ukuran, deskripsi, dan terjemahan menyesuaikan mode |
| F-08 | Identitas pada header | Data tabel `kelompok` ditampilkan di desktop dan mobile |
| F-09 | Manajemen konten back-end | Login admin dan CRUD kelompok, kategori, gerakan, bacaan, gambar, audio, dan video |

## Halaman Publik

- `/` — Beranda
- `/gerakan` — Daftar gerakan
- `/gerakan/{slug}` — Detail gerakan
- `/tentang` — Tentang aplikasi
- `/panduan` — Panduan penggunaan
- `/tentang-kami` — Identitas dan pembagian peran tim
- `/mode/{kategori}` — Mengganti mode pengguna

## Halaman Admin

- `/admin/login` — Login administrator
- `/admin` — Dashboard statistik
- `/admin/kelompok` — CRUD identitas kelompok
- `/admin/kategori` — CRUD kategori pengguna
- `/admin/gerakan` — CRUD gerakan, gambar, dan video
- `/admin/bacaan` — CRUD bacaan dan audio

### Akun Admin Contoh

- Email: `admin@tuntunsholat.test`
- Kata sandi: `password123`

Ganti akun dan kata sandi tersebut sebelum deployment.

## Identitas Kelompok Bawaan

- Nama Kelompok: Kelompok Tuntun Sholat
- Program Studi: Manajemen Bisnis Syariah
- Mata Kuliah: Pengembangan Aplikasi Web / Praktikum Pemrograman Web
- Dosen: Dedy Susanto, S.Pd.I., M.M.

Nama anggota dan NIM pada halaman Tentang Kami masih berupa placeholder. Ubah data tersebut di `app/Http/Controllers/PageController.php` sebelum pengumpulan.

## Persyaratan

- PHP 8.3+
- Composer 2
- Node.js versi LTS yang kompatibel dengan Vite 8
- npm
- MySQL 8 atau MariaDB yang kompatibel
- Ekstensi PHP umum Laravel: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo
- Ekstensi GD disarankan untuk konversi gambar unggahan ke WebP. Jika GD tidak tersedia, gambar tetap disimpan dalam format aslinya.

## Instalasi

Jalankan perintah berikut dari folder project:

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
npm install
npm run dev
php artisan serve
```

Pada Linux atau macOS, ganti perintah `copy` menjadi:

```bash
cp .env.example .env
```

Buka aplikasi di `http://127.0.0.1:8000`.

## Membuat Database MySQL

1. Buka phpMyAdmin, MySQL Workbench, atau terminal MySQL.
2. Buat database:

```sql
CREATE DATABASE tuntun_sholat
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

3. Sesuaikan bagian berikut di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tuntun_sholat
DB_USERNAME=root
DB_PASSWORD=
```

4. Jalankan:

```bash
php artisan migrate:fresh --seed
```

## Menjalankan Aplikasi

Terminal pertama:

```bash
php artisan serve
```

Terminal kedua:

```bash
npm run dev
```

Untuk aset produksi:

```bash
npm run build
php artisan optimize
```

## Penyimpanan Media

Media unggahan admin disimpan pada disk `public`:

```text
storage/app/public/media/images
storage/app/public/media/audio
storage/app/public/media/videos
```

Perintah berikut wajib dijalankan satu kali:

```bash
php artisan storage:link
```

Gambar JPG, JPEG, PNG, dan WebP yang diunggah akan dikonversi ke WebP saat ekstensi GD tersedia. Audio dibatasi ke MP3, sedangkan video dibatasi ke MP4 atau URL HTTP/HTTPS yang valid.

## Struktur Folder Utama

```text
app/
├── Http/
│   ├── Controllers/
│   │   └── Admin/
│   ├── Middleware/
│   └── Requests/Admin/
├── Models/
├── Providers/
└── Services/
database/
├── factories/
├── migrations/
└── seeders/
resources/
├── css/
├── js/
└── views/
    ├── admin/
    ├── components/
    ├── layouts/
    ├── movements/
    └── pages/
routes/
storage/app/public/media/
tests/Feature/
```

## Database

### `kelompok`

Menyimpan nama kelompok, program studi, mata kuliah, dan dosen.

### `kategori`

Menyimpan mode Dewasa dan Anak-anak.

### `gerakan`

Menyimpan kategori, nama, slug, urutan, dua versi deskripsi, gambar, video, dan status aktif.

### `bacaan`

Menyimpan judul, Arab, Latin, terjemahan lengkap, terjemahan ringkas, audio, dan sumber.

Relasi menggunakan foreign key dan `cascadeOnDelete`. Kolom slug, urutan, status, dan foreign key telah diberi indeks.

## Keamanan

- CSRF aktif pada seluruh form POST, PUT, dan DELETE.
- Login admin menggunakan autentikasi session Laravel.
- Middleware `admin` membatasi panel manajemen.
- Form Request melakukan validasi server-side.
- Blade melakukan escaping output secara default.
- File dibatasi berdasarkan tipe dan ukuran.
- Konfirmasi ditampilkan sebelum penghapusan data.
- Detail error teknis tidak ditampilkan ketika `APP_DEBUG=false`.

## Progress dan Preferensi

- Mode pengguna disimpan dalam session Laravel.
- Progress, favorit, dan autoplay disimpan dalam `localStorage` browser.
- Progress ditandai saat halaman detail gerakan dibuka.

## Pengujian

```bash
php artisan test
```

Feature test mencakup halaman publik, pergantian mode, proteksi admin, dan login admin bawaan.

## Mengatasi Error Umum

### `vite is not recognized`

Pastikan berada di folder project lalu jalankan:

```bash
npm install
npm run dev
```

Jika masih gagal, hapus instalasi lama dan ulangi:

```bash
rmdir /s /q node_modules
del package-lock.json
npm cache clean --force
npm install
npm run dev
```

Pada PowerShell gunakan `Remove-Item -Recurse -Force node_modules`.

### Gambar atau audio tidak tampil

```bash
php artisan storage:link
php artisan optimize:clear
```

### Tabel sudah ada

Untuk lingkungan pengembangan yang boleh direset:

```bash
php artisan migrate:fresh --seed
```

Perintah tersebut menghapus seluruh tabel dan data lama.

## Deployment

URL online: `[ISI URL APLIKASI ONLINE]`

Checklist produksi:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com
```

Lalu jalankan:

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Pastikan folder `storage` dan `bootstrap/cache` dapat ditulis oleh web server.

## Anggota dan Peran

| Nama | NIM | Peran |
|---|---|---|
| [Nama Anggota 1] | [NIM Anggota 1] | Project Manager |
| [Nama Anggota 2] | [NIM Anggota 2] | UI/UX Designer |
| [Nama Anggota 3] | [NIM Anggota 3] | Back-end Developer |
| [Nama Anggota 4] | [NIM Anggota 4] | Front-end Developer |
| [Nama Anggota 5] | [NIM Anggota 5] | Quality Assurance |

## Sumber Konten

Himpunan Putusan Tarjih Muhammadiyah, Kitab Shalat.

Project ini sengaja tidak menyertakan bacaan keagamaan yang dibuat sendiri atau diambil secara acak dari internet. Seluruh placeholder harus diganti setelah diverifikasi dari sumber resmi.
