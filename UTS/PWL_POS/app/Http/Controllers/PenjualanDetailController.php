<?php

namespace App\Http\Controllers;

use App\Models\PenjualanDetailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class PenjualanDetailController extends Controller
{
    public function index()
    {

        // DB::insert('insert into t_penjualan_detail(detail_id, penjualan_id, barang_id, harga, jumlah) values (?,?,?,?,?)', [21, 10, 6, 5000, 1]);
        // DB::insert('insert into t_penjualan_detail(detail_id, penjualan_id, barang_id, harga, jumlah) values (?,?,?,?,?)', [22, 10, 10, 45000, 2]);

//         $row = DB::table('t_penjualan_detail')
//     ->where('detail_id', 1)
//     ->update([
//         'jumlah' => 3,
//         'harga' => 1250000
//     ]);

// return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';


// $data = [
//     'harga' => 999999,
//     'jumlah' => 5,
// ];

// DB::table('t_penjualan_detail')->where('detail_id', 1)->update($data);

// $detail = PenjualanDetailModel::all();
// return view('penjualan_detail', ['data' => $detail]);

//===== Jobsheet 4 Praktikum 2.1 – Retrieving Single Models =====

// Mengambil detail penjualan berdasarkan ID
// $penjualanDetail = PenjualanDetailModel::find(1);
// return view('penjualan_detail', ['data' => $penjualanDetail]);

// Mengambil detail penjualan berdasarkan penjualan_id
$penjualanDetail = PenjualanDetailModel::where('penjualan_id', 1)->get();
return view('penjualan_detail', ['data' => $penjualanDetail]);


  }
}
