<?php
 
 namespace App\Models;
 
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 
 class StokModel extends Model
 {

    //== Jobsheet 3 Praktikum 6 ==
    use HasFactory;

    protected $table = 't_stok'; // Nama tabel di database
    protected $primaryKey = 'stok_id'; // Primary key

      //==Jobsheet 4 Praktikum 1==
      protected $fillable = [
        'supplier_id',
        'barang_id',
        'user_id',
        'stok_tanggal',
        'stok_jumlah'
    ];

    
}