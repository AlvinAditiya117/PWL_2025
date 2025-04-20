<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index()
    {
        // DB::insert('insert into t_stok(stok_id, supplier_id, barang_id, user_id, stok_tanggal, stok_jumlah) values (?,?,?,?,?,?)', [10, 5, 9, 1, now(), 25]);
        // DB::insert('insert into t_stok(stok_id, supplier_id, barang_id, user_id, stok_tanggal, stok_jumlah) values (?,?,?,?,?,?)', [11, 5, 10, 1, now(), 35]);

//         $row = DB::table('t_stok')
//     ->where('stok_id', 1)
//     ->update(['stok_jumlah' => 75]);

// return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

$data = [
    'stok_jumlah' => 150,
];

DB::table('t_stok')->where('stok_id', 1)->update($data);

$stok = StokModel::all();
return view('stok', ['data' => $stok]);
    }
}
