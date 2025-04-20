<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenjualanModel extends Model
{
    use HasFactory;

    //== Jobsheet 3 Praktikum 6 ==
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';

    
}