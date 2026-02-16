<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Penjual;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User Admin (Sesuai Flowchart Login kamu)
        $admin = User::create([
            'name' => 'Admin Sholahuddin',
            'email' => 'admin@toko.com',
            'password' => Hash::make('password123'),
            'alamat' => 'Madiun, Jawa Timur',
            'no_hp' => '085641286778',
            'role' => 'admin',
        ]);

        // 2. Buat User Biasa / Penjual
        $user = User::create([
            'name' => 'Si Penjual',
            'email' => 'penjual@toko.com',
            'password' => Hash::make('password123'),
            'alamat' => 'Cilacap, Jawa Tengah',
            'no_hp' => '085150755886',
            'role' => 'user',
        ]);

        // 3. Buat Profil Toko (Relasi ke User Penjual)
        $penjual = Penjual::create([
            'user_id' => $user->user_id,
            'nama_toko' => 'Sholahuddin Tech Store',
            'email' => 'toko@sholahuddin.com',
            'no_hp' => '085641286778',
        ]);

        // 4. Buat Kategori (Sesuai ERD)
        $kat1 = Kategori::create(['nama_kategori' => 'Elektronik']);
        $kat2 = Kategori::create(['nama_kategori' => 'Pakaian']);
        $kat3 = Kategori::create(['nama_kategori' => 'Makanan']);

        // 5. Buat Sample Produk untuk Testing CRUD
        // Kategori Elektronik
        Produk::create([
            'penjual_id' => $penjual->penjual_id,
            'kategori_id' => $kat1->kategori_id,
            'nama_produk' => 'Laptop ASUS',
            'harga' => 8500000,
            'stok' => 5,
            'foto' => null,
        ]);

        Produk::create([
            'penjual_id' => $penjual->penjual_id,
            'kategori_id' => $kat1->kategori_id,
            'nama_produk' => 'Mouse Wireless',
            'harga' => 150000,
            'stok' => 20,
            'foto' => null,
        ]);

        Produk::create([
            'penjual_id' => $penjual->penjual_id,
            'kategori_id' => $kat1->kategori_id,
            'nama_produk' => 'Keyboard Mekanik',
            'harga' => 350000,
            'stok' => 10,
            'foto' => null,
        ]);

        // Kategori Pakaian
        Produk::create([
            'penjual_id' => $penjual->penjual_id,
            'kategori_id' => $kat2->kategori_id,
            'nama_produk' => 'Kaos Polos Putih',
            'harga' => 45000,
            'stok' => 50,
            'foto' => null,
        ]);

        Produk::create([
            'penjual_id' => $penjual->penjual_id,
            'kategori_id' => $kat2->kategori_id,
            'nama_produk' => 'Celana Jeans',
            'harga' => 120000,
            'stok' => 30,
            'foto' => null,
        ]);

        // Kategori Makanan
        Produk::create([
            'penjual_id' => $penjual->penjual_id,
            'kategori_id' => $kat3->kategori_id,
            'nama_produk' => 'Snack Keripik Sagu',
            'harga' => 25000,
            'stok' => 100,
            'foto' => null,
        ]);

        Produk::create([
            'penjual_id' => $penjual->penjual_id,
            'kategori_id' => $kat3->kategori_id,
            'nama_produk' => 'Chocolate Cokelat Belgia',
            'harga' => 80000,
            'stok' => 25,
            'foto' => null,
        ]);
    }
}