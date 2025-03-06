<?php

namespace App\Models; // Mendefinisikan namespace untuk model ini

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk menggunakan factory (untuk seeding data)
use Illuminate\Database\Eloquent\Model; // Mengimpor class Model yang merupakan class dasar untuk model Eloquent

class buku extends Model // Mendefinisikan class model 'buku' yang наследуется dari class Model
{
    use HasFactory; // Menggunakan trait HasFactory

    protected $fillable = [ // Mendefinisikan properti $fillable yang berisi daftar atribut yang boleh diisi (mass assignment)
        'judul', // Atribut judul buku
        'stok', // Atribut stok buku
        'penulis', // Atribut penulis buku
        'tahun_terbit', // Atribut tahun terbit buku
        'jenis_buku', // Atribut jenis buku
    ];
}
