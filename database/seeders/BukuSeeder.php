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
                'penerbit'     => 'Elex Media Komputindo',
                'stok'         => 10,
                'tahun_terbit' => '2020-06-10',
                'kategori'     => 'Manga',
                'cover'        => 'covers/aot33.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 2],
            [
                'judul'        => 'Manga Attack on Titan Vol. 28',
                'penulis'      => 'Hajime Isayama',
                'penerbit'     => 'Elex Media Komputindo',
                'stok'         => 10,
                'tahun_terbit' => '2020-06-10',
                'kategori'     => 'Manga',
                'cover'        => 'covers/aot28.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 3],
            [
                'judul'        => 'Manga Attack on Titan Vol. 20',
                'penulis'      => 'Hajime Isayama',
                'penerbit'     => 'Elex Media Komputindo',
                'stok'         => 10,
                'tahun_terbit' => '2020-06-10',
                'kategori'     => 'Manga',
                'cover'        => 'covers/aot20.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 4],
            [
                'judul'        => 'Manga Attack on Titan Vol. 30',
                'penulis'      => 'Hajime Isayama',
                'penerbit'     => 'Elex Media Komputindo',
                'stok'         => 10,
                'tahun_terbit' => '2020-06-10',
                'kategori'     => 'Manga',
                'cover'        => 'covers/aot30.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 5],
            [
                'judul'        => 'Manga Attack on Titan Vol. 25',
                'penulis'      => 'Hajime Isayama',
                'penerbit'     => 'Elex Media Komputindo',
                'stok'         => 10,
                'tahun_terbit' => '2020-06-10',
                'kategori'     => 'Manga',
                'cover'        => 'covers/aot25.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 6],
            [
                'judul'        => 'Bumi',
                'penulis'      => 'Tereliye',
                'penerbit'     => 'Gramedia',
                'stok'         => 25,
                'tahun_terbit' => '2024-01-02',
                'kategori'     => 'Novel',
                'cover'        => 'covers/bumi.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 7],
            [
                'judul'        => 'Bintang',
                'penulis'      => 'Tereliye',
                'penerbit'     => 'Gramedia',
                'stok'         => 25,
                'tahun_terbit' => '2024-01-02',
                'kategori'     => 'Novel',
                'cover'        => 'covers/bintang.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 8],
            [
                'judul'        => 'Bulan',
                'penulis'      => 'Tereliye',
                'penerbit'     => 'Gramedia',
                'stok'         => 25,
                'tahun_terbit' => '2024-01-02',
                'kategori'     => 'Novel',
                'cover'        => 'covers/bulan.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 9],
            [
                'judul'        => 'Komet',
                'penulis'      => 'Tereliye',
                'penerbit'     => 'Gramedia',
                'stok'         => 25,
                'tahun_terbit' => '2024-01-02',
                'kategori'     => 'Novel',
                'cover'        => 'covers/komet.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 10],
            [
                'judul'        => 'Matahari',
                'penulis'      => 'Tereliye',
                'penerbit'     => 'Gramedia',
                'stok'         => 25,
                'tahun_terbit' => '2024-01-02',
                'kategori'     => 'Novel',
                'cover'        => 'covers/Matahari.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 11],
            [
                'judul'        => 'Dibalik Tragedi 1965',
                'penulis'      => 'Sulastomo',
                'penerbit'     => 'Yayasan Pustaka Ummat',
                'stok'         => 10,
                'tahun_terbit' => '2017-06-20',
                'kategori'     => 'Pengetahuan',
                'cover'        => 'covers/1965.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 12],
            [
                'judul'        => 'Sejarah Dunia Versi Islam Yang Dihilangkan',
                'penulis'      => 'Tamim Ansary',
                'penerbit'     => 'Grasindo',
                'stok'         => 20,
                'tahun_terbit' => '2019-06-22',
                'kategori'     => 'Pengetahuan',
                'cover'        => 'covers/islam.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 13],
            [
                'judul'        => 'Bukan 350 Tahun Dijajah',
                'penulis'      => 'G.J.Resink',
                'penerbit'     => 'A.B.Lapian',
                'stok'         => 30,
                'tahun_terbit' => '2020-10-11',
                'kategori'     => 'Pengetahuan',
                'cover'        => 'covers/bukan350.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 14],
            [
                'judul'        => 'Sebuah Seni Untuk Bersikap Bodoamat',
                'penulis'      => 'Mark Manson',
                'penerbit'     => 'Grasindo',
                'stok'         => 15,
                'tahun_terbit' => '2017-06-20',
                'kategori'     => 'Pengetahuan',
                'cover'        => 'covers/bodoamat.jpg',
            ]
        );
        buku::updateOrCreate(
            ['id' => 15],
            [
                'judul'        => 'Sejarah Raja-Raja Jawa',
                'penulis'      => 'Sri Wintala Achmad',
                'penerbit'     => 'Grasindo',
                'stok'         => 20,
                'tahun_terbit' => '2018-12-10',
                'kategori'     => 'Pengetahuan',
                'cover'        => 'covers/rajajawa.jpg',
            ]
        );
    }
}
