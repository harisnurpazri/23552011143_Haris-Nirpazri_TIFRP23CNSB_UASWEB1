# Meubeul Dua Putra 🪑

Repository ini berisi source code aplikasi E-Commerce **Meubeul Dua Putra**, yang telah dimigrasikan dari Native PHP ke **Laravel 11**. Aplikasi ini dirancang untuk memudahkan pelanggan dalam mencari dan membeli produk furniture berkualitas, serta memberikan fitur manajemen lengkap bagi administrator.

## 🚀 Fitur Utama

### 1. Halaman Publik (Pelanggan)
- **Katalog Produk**: Menampilkan daftar produk dengan harga, stok, dan kategori.
- **Pencarian & Filter**: Mencari produk berdasarkan nama atau kategori.
- **Detail Produk**: Informasi lengkap produk, gambar, dan status stok.
- **Keranjang Belanja**: Menambahkan produk ke cart (membutuhkan login).
- **Checkout & Invoice**: Proses pemesanan sederhana dan cetak invoice otomatis.
- **Live Chat**: Fitur chat real-time dengan Admin (menggunakan AJAX polling).
- **Halaman Edukasi**: Artikel informatif seputar jenis kayu dan finishing.

### 2. Panel Admin
- **Dashboard**: Statistik ringkas (Total User, Produk, Order, Pendapatan) dan grafik penjualan.
- **Manajemen Produk**: Tambah, Edit, Hapus produk beserta upload gambar.
- **Manajemen Order**: Melihat detail pesanan dan update status (Pending -> Processing -> Completed).
- **Manajemen User**: Mengelola pengguna, reset password, dan mengubah role.
- **Manajemen Edukasi**: CRUD artikel edukasi.
- **Admin Chat**: Membalas pesan dari pelanggan secara real-time.

---

## 🛠️ Teknologi yang Digunakan
- **Backend**: Laravel 11
- **Frontend**: Blade Templates, Tailwind CSS
- **Interactivity**: Alpine.js (untuk Chat Widget & Dropdowns)
- **Database**: MySQL
- **Auth**: Laravel Breeze

---

## ⚙️ Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project di local environment:

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

### Langkah-langkah
1. **Clone Repository**
   ```bash
   git clone https://github.com/harisnurpazri/23552011143_Haris-Nirpazri_TIFRP23CNSB_UASWEB1.git
   cd 23552011143_Haris-Nirpazri_TIFRP23CNSB_UASWEB1
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Konfigurasi Environment**
   - Copy file `.env.example` ke `.env`
   - Atur konfigurasi database di file `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=meubeul_db
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Generate Key & Migrasi Database**
   ```bash
   php artisan key:generate
   php artisan migrate:fresh --seed
   ```
   *(Perintah `--seed` akan otomatis mengisi database dengan data dummy, user admin, dan produk sampel)*

5. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   ```
   Buka browser dan akses: `http://localhost:8000`

---

## 🔐 Akun Demo

Gunakan akun berikut untuk login:

### Administrator
- **Email**: `admin@meubeul.test`
- **Password**: `password`
- **Akses**: Full akses ke Panel Admin & Chat Management.

### User (Pelanggan)
- **Email**: `user@meubeul.test`
- **Password**: `user123`
- **Akses**: Belanja, Checkout, Chat dengan Admin.

---

## 👨‍💻 Pengembang
**Nama**: Haris Nirpazri
**NIM**: 23552011143
**Kelas**: TIFRP23CNSB
**Mata Kuliah**: Pemrograman Web 1

---
*Dibuat dengan ❤️ menggunakan Laravel*
