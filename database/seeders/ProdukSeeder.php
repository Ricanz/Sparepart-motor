<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'nama_produk' => 'Buku',
            'deskripsi' => 'ini buku',
            'harga' => '2000',
            'foto' => 'public/storage/Produk/Produk_023250.jpg',
            'kategori_id' => '1',
            'stok' => '3'
        ]);

        Produk::create([
            'nama_produk' => 'Kursi',
            'deskripsi' => 'ini kursi',
            'harga' => '200000',
            'foto' => 'Produk_023250.jpg',
            'kategori_id' => '2',
            'stok' => '6'
        ]);

        Produk::create([
            'nama_produk' => 'Meja',
            'deskripsi' => 'ini meja',
            'harga' => '400000',
            'foto' => 'Produk_023250.jpg',
            'kategori_id' => '1',
            'stok' => '3'
        ]);

        Produk::create([
            'nama_produk' => 'Kipas',
            'deskripsi' => 'ini kipas',
            'harga' => '40000',
            'foto' => 'Produk_023250.jpg',
            'kategori_id' => '2',
            'stok' => '4'
        ]);
    }
}
