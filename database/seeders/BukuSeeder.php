<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\buku;
class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        buku::create([
            'judul'=>'Kisah Malang Yuga TAMPAN',
            'penulis'=>'Yuga',
            'penerbit'=>'Yuga lagi aja',
            'stok'=> 123,
            'tahun_terbit' => '2024-01-02'
        ]);
    }
}
