<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        DB::insert('insert into t_penjualan_detail(detail_id, penjualan_id, barang_id, harga, jumlah) values (?,?,?,?,?)', [21, 10, 6, 5000, 1]);
        DB::insert('insert into t_penjualan_detail(detail_id, penjualan_id, barang_id, harga, jumlah) values (?,?,?,?,?)', [22, 10, 10, 45000, 2]);
    }
}
