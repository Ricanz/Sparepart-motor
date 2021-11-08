<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'id' => '1',
            'kategori' => 'Elektronik',
            'deskripsi' => 'Garansi 3 bulan'
        ]);

        Kategori::create([
            'id' => '2',
            'kategori' => 'Barang',
            'deskripsi' => 'Garansi 3 bulan'
        ]);
    }
}
