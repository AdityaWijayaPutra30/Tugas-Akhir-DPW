<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'stok',
        'tahun_terbit',
        'cover'
    ];

    public function buku(){
        return $this->hasMany(peminjaman::class);
    }
}
