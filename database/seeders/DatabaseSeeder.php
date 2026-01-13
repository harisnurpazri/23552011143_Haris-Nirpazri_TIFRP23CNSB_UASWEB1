<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produk;
use App\Models\Edukasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin Haris',
            'email' => 'admin@meubeul.test',
            'password' => Hash::make('Admin123'),
            'role' => 'admin',
        ]);

        // Create Demo User
        User::create([
            'name' => 'User Budi',
            'email' => 'user@meubeul.test',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        // Create Sample Products
        $products = [
            [
                'nama_produk' => 'Kursi Kantor Ergonomis',
                'deskripsi' => 'Kursi kantor dengan desain ergonomis yang nyaman untuk bekerja seharian. Dilengkapi dengan sandaran punggung yang adjustable dan roda yang smooth.',
                'harga' => 1200000,
                'stok' => 15,
                'gambar' => '1763491049_Kursi Kantor Ergonomis.jpg',
                'kategori' => 'Kursi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Meja Makan Kayu Trembesi',
                'deskripsi' => 'Meja makan kayu trembesi solid dengan serat alami yang eksotis. Cocok untuk ruang makan bergaya industrial atau natural.',
                'harga' => 3500000,
                'stok' => 5,
                'gambar' => '1763491171_Meja Makan Kayu Trembesi.jpg',
                'kategori' => 'Meja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Lemari Pakaian 3 Pintu Sliding',
                'deskripsi' => 'Lemari pakaian 3 pintu dengan sistem sliding door hemat tempat. Kapasitas besar untuk menyimpan semua pakaian Anda.',
                'harga' => 4500000,
                'stok' => 8,
                'gambar' => '1763491148_Lemari Pakaian 3 Pintu Sliding.jpg',
                'kategori' => 'Lemari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Rak Buku 5 Susun Kayu',
                'deskripsi' => 'Rak buku minimalis 5 tingkat. Konstruksi kokoh dan desain modern untuk menata koleksi buku Anda.',
                'harga' => 850000,
                'stok' => 20,
                'gambar' => '1763491036_Rak Buku 5 Susun Kayu.jpg',
                'kategori' => 'Rak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Nakas Samping Tempat Tidur',
                'deskripsi' => 'Nakas minimalis dengan laci penyimpanan. Cocok diletakkan di samping tempat tidur untuk lampu tidur dan barang kecil.',
                'harga' => 450000,
                'stok' => 25,
                'gambar' => '1763490898_nakas.jpg',
                'kategori' => 'Nakas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Dipan Tempat Tidur King Size',
                'deskripsi' => 'Dipan tempat tidur ukuran King Size (180x200). Desain elegan dan kuat menopang kasur Anda.',
                'harga' => 2800000,
                'stok' => 7,
                'gambar' => '1763491010_Dipan Tempat Tidur King Size.jpg',
                'kategori' => 'Tempat Tidur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kitchen Set Mini 2 Meter',
                'deskripsi' => 'Kitchen set minimalis panjang 2 meter. Solusi praktis untuk dapur bersih yang rapi dan fungsional.',
                'harga' => 5500000,
                'stok' => 3,
                'gambar' => '1763490924_Kitchen Set Mini 2 Meter.jpg',
                'kategori' => 'Kitchen Set',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Meja Rias dengan Cermin LED',
                'deskripsi' => 'Meja rias cantik dengan cermin yang dilengkapi lampu LED. Memudahkan Anda saat berdandan dengan pencahayaan yang pas.',
                'harga' => 1800000,
                'stok' => 10,
                'gambar' => '1763490955_Meja Rias dengan Cermin LED.jpg',
                'kategori' => 'Meja Rias',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($products as $product) {
            Produk::create($product);
        }

        // Create Sample Education Content
        $eduContents = [
            [
                'judul' => 'Mengenal Kayu Jati',
                'konten' => 'Kayu jati terkenal kuat dan tahan air. Kayu ini berasal dari pohon Tectona grandis yang banyak tumbuh di Asia Tenggara. Karakteristik utama kayu jati adalah seratnya yang indah, warnanya yang hangat kecoklatan, dan ketahanannya terhadap rayap serta cuaca ekstrem. Kayu jati banyak digunakan untuk furniture premium karena keindahan dan ketahanannya.',
                'gambar' => 'edu_jati.jpg',
            ],
            [
                'judul' => 'Ciri-ciri Kayu Solid Berkualitas',
                'konten' => 'Serat rapat, warna konsisten, dan tahan lama adalah ciri utama kayu solid berkualitas tinggi. Beberapa tips memilih kayu solid: periksa kepadatan kayu dengan mengetuknya, perhatikan pola serat yang teratur, dan pastikan tidak ada bekas rayap atau jamur.',
                'gambar' => 'edu_solid.jpg',
            ],
        ];

        foreach ($eduContents as $edu) {
            Edukasi::create($edu);
        }
    }
}
