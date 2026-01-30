# Meubel Dua Putra (Meubeul Harisproject)

Singkat: aplikasi e‑commerce katalog furniture berbasis Laravel — UI yang sudah diperbarui di branch `feature/ui-redesign` dan sekarang digabung ke `main`.

**Fitur Utama**
- Halaman beranda yang kaya visual (`resources/views/home.blade.php`).
- Manajemen produk, kategori, pesanan, edukasi, dan chat.
- Styling modern dengan Tailwind-like utilities dan asset gambar di `public/images/`.
- Skrip bantu untuk membuat database: `scripts/create_db.php` dan SQL dump `meubeul_db.sql`.

**Persyaratan**
- PHP 8.x
- Composer
- MySQL (atau MariaDB)
- Node.js & npm (untuk build frontend)
- Laravel 10+ (sesuaikan dengan `composer.json`)

**Instalasi Lokal**
1. Clone repo dan masuk folder proyek:

```bash
git clone https://github.com/harisnurpazri/23552011143_Haris-Nirpazri_TIFRP23CNSB_UASWEB1.git
cd 23552011143_Haris-Nirpazri_TIFRP23CNSB_UASWEB1
```

2. Install dependensi PHP dan JS:

```bash
composer install
npm install
```

3. Buat file environment dari contoh (atau salin `.env.example`) dan sesuaikan:

```bash
cp .env.example .env
# lalu edit .env (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
```

File penting: `/.env` (kolom `DB_DATABASE` default sekarang `meubeul_db`).

4. Buat database lokal (opsi):
- Jalankan skrip PHP bawaan jika Anda menggunakan konfigurasi `root` tanpa password:

```bash
php scripts/create_db.php
```

- Atau buat manual lewat MySQL/phpMyAdmin:

```sql
CREATE DATABASE meubeul_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

- Jika ingin menggunakan dump yang disertakan: impor `meubeul_db.sql` ke server MySQL.

5. Bersihkan cache config dan jalankan migrasi:

```bash
php artisan key:generate
php artisan config:clear
php artisan migrate --force
php artisan db:seed # jika ada seeders yang relevan
```

6. Build frontend (development):

```bash
npm run dev
# atau build produksi
npm run build
```

7. Jalankan server lokal:

```bash
php artisan serve
```

Akses di `http://localhost:8000` (atau sesuai `APP_URL` di `.env`).

**Catatan penting**
- Jika `.env` diubah dan perubahan tidak terbaca, jalankan `php artisan config:clear`.
- Jika push Git gagal karena RPC/curl, saya menaikkan `http.postBuffer` saat push yang bermasalah:

```bash
git config http.postBuffer 524288000
git push origin <branch>
```

- File skrip pembuatan DB sementara ada di `scripts/create_db.php` — hapus jika tidak ingin disimpan di repo publik.

**Testing**
- Jalankan unit/feature tests (jika ada):

```bash
./vendor/bin/phpunit
```

**Struktur penting**
- `app/` — Controllers, Models, Providers
- `resources/views/` — Blade views (lihat `home.blade.php` untuk hero UI)
- `public/images/` — aset gambar yang digunakan oleh UI
- `scripts/` — skrip bantu seperti `create_db.php` dan `create_test_db.php`

**Kontribusi & PR**
- Buat branch dari `main` bernama deskriptif, lakukan perubahan, tes lokal, lalu buka Pull Request ke `main`.

**License & Kontak**
- Tidak ada lisensi eksplisit di repo — tambahkan `LICENSE` jika perlu.
- Untuk pertanyaan, hubungi pemilik repo atau pembuat PR.

---
Generated on 2026-01-30 via workspace helper.
