# Meubel Dua Putra (Meubeul Harisproject)

> A modern Laravel-based e‑commerce catalogue for furniture — visual-first homepage, product management, and admin features.

---

## Konsep Aplikasi

Meubeul Harisproject adalah aplikasi katalog dan toko online furniture yang menekankan kualitas produk, pengalaman visual, dan kemudahan manajemen. Aplikasi ini menggabungkan katalog produk, kategori, fitur edukasi, sistem pesanan, dan komunikasi (chat) antar pengguna dan admin.

Fokus utama:
- Menampilkan koleksi produk secara menarik (lihat `resources/views/home.blade.php`).
- Backend sederhana untuk mengelola produk, kategori, pesanan, dan pengguna.
- UI yang responsif dan mudah disesuaikan.

---

## Ringkasan Fitur
- Halaman beranda dengan hero visual dan highlight produk
- Manajemen Produk & Kategori
- Sistem Pesanan (Orders)
- Chat / Messaging untuk dukungan pelanggan
- Panel Admin untuk pengelolaan (routes: `/admin` atau area admin disesuaikan di konfigurasi)
- Skrip bantu dan dump DB (`scripts/create_db.php`, `meubeul_db.sql`)

---

## Struktur Proyek (lokasi penting)

- `app/` — Logika aplikasi: Models, Controllers, Middleware, Providers
- `bootstrap/` — Bootstrapping Laravel
- `config/` — Konfigurasi aplikasi
- `database/` — Migrations, Seeders, dan dump `meubeul_db.sql`
- `public/` — Aset publik (gambar di `public/images/`, compiled assets di `public/build/` jika ada)
- `resources/views/` — Blade templates (utama: `home.blade.php`)
- `resources/js/` & `resources/css/` — sumber frontend
- `routes/` — route definitions (`web.php`, `auth.php`, dsb.)
- `scripts/` — utilitas proyek (mis. `create_db.php`)

---

## Teknologi & Stack

- Backend: PHP (Laravel)
- Database: MySQL / MariaDB
- Frontend build: Node.js, npm, Vite (atau mix sesuai `package.json`)
- Styling: Tailwind-like utility classes (inline and compiled CSS)
- Version control: Git (remote GitHub repository)

---

## Cara Menjalankan (singkat)
1. Clone repo dan masuk ke folder:

```bash
git clone <repo-url>
cd <project-folder>
```

2. Install dependensi:

```bash
composer install
npm install
```

3. Siapkan environment:

```bash
cp .env.example .env
# Edit .env sesuai konfigurasi lokal (DB_CONNECTION, DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
```

4. Buat database lokal (opsi):

```bash
php scripts/create_db.php
# atau impor meubeul_db.sql lewat phpMyAdmin / mysql client
```

5. Jalankan migrasi dan seed (jika ada):

```bash
php artisan key:generate
php artisan config:clear
php artisan migrate
php artisan db:seed
```

6. Jalankan server lokal dan build frontend:

```bash
npm run dev
php artisan serve
```

---

## Host / Demo

Jika sudah dideploy, masukkan URL hasil hosting di bawah ini (jangan sertakan kredensial):

- Demo / Hosting: https://example.com  <!-- Ganti dengan URL hosting Anda -->

Tambahkan URL aktual di file ini agar tim dan reviewer mudah mengakses demo.

---

## Akses Admin & Login

Keterangan lokasi (tanpa menyebutkan kredensial):
- Halaman login pengguna: `/login`
- Halaman dashboard/admin (umumnya): `/admin` atau `/dashboard` (tergantung konfigurasi route). Periksa controller dan route di `routes/web.php` untuk path pasti.

Catatan: Jangan menyimpan username/password nyata di repo. Simpan kredensial admin di password manager atau environment saat deploy.

---

## Keamanan & Sensitivitas

- Hindari menambahkan file yang berisi kredensial ke repo (mis. `.env` atau dump berisi password). Gunakan `.gitignore` untuk mengecualikannya.
- Skrip `scripts/create_db.php` hanya berfungsi untuk lingkungan pengembangan lokal; tinjau sebelum menjalankan di server produksi.

---

## Kontribusi

- Buat branch baru dari `main` untuk perubahan baru: `git checkout -b feature/nama-fitur`
- Buat commit kecil dan deskriptif, jalankan tes lokal, lalu buka Pull Request ke `main`.

---

## Kontak & Lisensi

- Jika perlu bantuan, hubungi pemilik repository atau maintainer.
- Tidak ada lisensi eksplisit — tambahkan `LICENSE` jika perlu menentukan penggunaan.

---

_README ini dirancang untuk menampilkan konsep aplikasi, struktur, teknologi, dan cara mengakses demo serta area admin tanpa menyertakan informasi sensitif._

Generated on 2026-01-30.
