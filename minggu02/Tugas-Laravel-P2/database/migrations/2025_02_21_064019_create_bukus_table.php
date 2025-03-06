<?php

use Illuminate\Database\Migrations\Migration; // Mengimpor class Migration yang penting untuk membuat migration
use Illuminate\Database\Schema\Blueprint; // Mengimpor class Blueprint untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // Mengimpor class Schema untuk berinteraksi dengan database

return new class extends Migration // Membuat class anonim yang extends dari class Migration
{
    /**
     * Run the migrations.  Fungsi ini akan dijalankan saat kita menjalankan perintah migrate
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) { // Membuat tabel 'bukus'
            $table->id(); // Membuat kolom 'id' sebagai primary key dan auto-increment (biasanya berupa integer unsigned big integer)
            $table->string('judul'); // Membuat kolom 'judul' dengan tipe data string (varchar)
            $table->integer('stok'); // Membuat kolom 'stok' dengan tipe data integer
            $table->string('penulis'); // Membuat kolom 'penulis' dengan tipe data string
            $table->integer('tahun_terbit'); // Membuat kolom 'tahun_terbit' dengan tipe data integer
            $table->string('jenis_buku'); // Membuat kolom 'jenis_buku' dengan tipe data string
            $table->timestamps(); // Membuat dua kolom 'created_at' dan 'updated_at' untuk menyimpan waktu pembuatan dan update data.
        });
    }

    /**
     * Reverse the migrations. Fungsi ini akan dijalankan saat kita menjalankan perintah migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus'); // Menghapus tabel 'bukus' jika tabel tersebut ada.  Ini digunakan untuk membatalkan migration.
    }
};
