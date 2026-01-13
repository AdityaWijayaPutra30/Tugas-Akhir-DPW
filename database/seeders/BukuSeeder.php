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
        buku::updateOrCreate(
            ['id' => 1],
            [
                'judul'        => 'Manga Attack on Titan Vol. 33',
                'penulis'      => 'Hajime Isayama',
                'penerbit'     => 'Yuga Pratama',
                'stok'         => 10,
                'tahun_terbit' => '2020-06-10',
                'kategori'     => 'Manga',
                'cover'        => 'covers/aot33.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 2],
            [
                'judul'        => 'Kisah Malang Yuga TAMPAN',
                'penulis'      => 'Yuga',
                'penerbit'     => 'Yuga lagi aja',
                'stok'         => 123,
                'tahun_terbit' => '2024-01-02',
                'kategori'     => 'Novel',
                'cover'        => 'covers/naruto.jpeg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 3],
            [
                'judul'        => 'Ilmu Pengetaahuan Alam',
                'penulis'      => 'Wijay',
                'penerbit'     => 'Wijay Lagi',
                'stok'         => 10,
                'tahun_terbit' => '2017-06-20',
                'kategori'     => 'Pengetahuan',
                'cover'        => 'covers/ipa.jpg',
            ]
        );
    }
}
