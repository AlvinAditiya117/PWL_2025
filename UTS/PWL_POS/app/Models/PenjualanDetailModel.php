<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetailModel extends Model
{
     //==Jobsheet 3 Praktikum 6 ==
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';

    //== Jobsheet 4 Praktikum 1 ==
    protected $fillable = [
        'user_id',
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal'
    ];

     //== Jobsheet 4 Praktikum 2.7 ==
     public function penjualan(): BelongsTo {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id', 'penjualan_id');
    }

    public function barang(): BelongsTo {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
