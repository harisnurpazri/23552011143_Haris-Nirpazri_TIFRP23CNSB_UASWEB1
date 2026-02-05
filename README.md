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

- Demo / Hosting: https://meubelku.my.id

Tambahkan URL aktual di file ini agar tim dan reviewer mudah mengakses demo.

---

## Akses Admin & Login

Keterangan lokasi (tanpa menyebutkan kredensial):
- Halaman login pengguna: `/login`
- Halaman dashboard/admin (umumnya): `/admin` atau `/dashboard` (tergantung konfigurasi route). Periksa controller dan route di `routes/web.php` untuk path pasti.

Catatan: Jangan menyimpan username/password nyata di repo. Simpan kredensial admin di password manager atau environment saat deploy.
- username: admin@meubel.com
- password: Admin123

---

## Keamanan & Sensitivitas

- Hindari menambahkan file yang berisi kredensial ke repo (mis. `.env` atau dump berisi password). Gunakan `.gitignore` untuk mengecualikannya.
- Skrip `scripts/create_db.php` hanya berfungsi untuk lingkungan pengembangan lokal; tinjau sebelum menjalankan di server produksi.

---

---

## 📸 Dokumentasi Sistem

![01](Dokumentasi/03CA79C1-8D1A-4121-918A-CC41606690A2.png)
![02](Dokumentasi/11432B56-4286-4A1A-9629-E40B207B2D5D.png)
![03](Dokumentasi/1D54CE03-ECE7-486C-B5DC-E7809DABE15A.png)
![04](Dokumentasi/23A64AD5-AEFE-4480-8388-FAEEDC8DA1D6.png)
![05](Dokumentasi/25E13D1E-E222-4350-9AB8-8721458589DE.png)
![06](Dokumentasi/27FA6C64-4C17-4607-8F8C-974079879D22.png)
![07](Dokumentasi/2857C037-00B2-4241-AC24-89B1B7E05A04.png)
![08](Dokumentasi/2A8E1955-C103-4C6D-8E6C-AAD339FFD9DF.png)
![09](Dokumentasi/51A2A0ED-128A-431A-BFB0-F6EE503ABAAD.png)
![10](Dokumentasi/67D7194F-9E85-4414-AA07-E419843B0AF8.png)
![11](Dokumentasi/68859A08-D110-413E-91E7-ED274CB88658.png)
![12](Dokumentasi/68DADB9E-92F0-4D20-B13B-54424176E211.png)
![13](Dokumentasi/6BE1CEC9-159F-4D3C-8C63-756C820C6213.png)
![14](Dokumentasi/70E1703C-5A76-4C1F-8537-19E7FFA3C28C.png)
![15](Dokumentasi/7D09B628-B937-4351-8EEA-3CF18687FF28.png)
![16](Dokumentasi/85AD60C8-E2E4-46BF-B195-F04E857A59B7.png)
![17](Dokumentasi/8887C9A6-4728-4123-9A03-B73B0ACCEEA7.png)
![18](Dokumentasi/8F77BECF-69AD-4036-A737-56964742844F.png)
![19](Dokumentasi/9CA55078-1FB5-4047-8C6D-CB0E250D1BC7.png)
![20](Dokumentasi/AF6B63E7-41C6-4C2C-906E-82C01AE429A4.png)
![21](Dokumentasi/B49D8565-3FA2-447C-AA36-F1FEF3A9F08B.png)
![22](Dokumentasi/BEED3A3B-8E2D-4C45-83E5-C4CAD3731A53.png)
![23](Dokumentasi/CF73E8D5-90BE-43B0-8CD9-16B8716FFCAD.png)
![24](Dokumentasi/DA3082F0-6A8F-49A8-9976-9AB8FF020FEE.png)
![25](Dokumentasi/DBA72CF1-17E3-4BEC-8154-A7851DC9E4D1.png)
![26](Dokumentasi/DBB3D56C-1164-451D-B5BC-51967FAC80F6.png)
![27](Dokumentasi/E0C0A949-7181-4508-AC27-BD974877CA3E.png)
![28](Dokumentasi/EB234367-7CFB-4A0D-B5F1-F673A8BCBEF5.png)
![29](Dokumentasi/F29A573C-55BC-40DE-854C-8123D864EE18.png)
![30](Dokumentasi/FC44C5F5-31D5-4690-AF2A-3A696F920128.png)

---


