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

// $data = [
//     'stok_jumlah' => 150,
// ];

// DB::table('t_stok')->where('stok_id', 1)->update($data);

// $stok = StokModel::all();
// return view('stok', ['data' => $stok]);

//===== Jobsheet 4 Praktikum 2.1 – Retrieving Single Models =====

// Mengambil stok berdasarkan ID
// $stok = StokModel::find(1);
// return view('stok', ['data' => $stok]);

// Mengambil stok berdasarkan barang_id
// $stok = StokModel::where('barang_id', 1)->first();
// return view('stok', ['data' => $stok]);

//===== Jobsheet 4 Praktikum  2.2 – Not Found Exceptions =====

// Menampilkan stok atau gagal jika tidak ada
// $stok = StokModel::findOrFail(1);
// return view('stok', ['data' => $stok]);

// Mengambil stok berdasarkan barang_id dengan firstOrFail
// $stok = StokModel::where('barang_id', 1)->firstOrFail();

// return view('stok', ['data' => $stok]);

//===== Jobsheet 4 Praktikum  2.3 – Retreiving Aggregrates =====

// Menghitung jumlah stok berdasarkan barang_id
// $stokCount = StokModel::where('barang_id', 1)->count();
// return view('stok', ['data' => $stokCount]);

//===== Jobsheet 4 Praktikum  2.4  Retreiving or Creating Models =====

// Menambah data stok jika tidak ada
// $stok = StokModel::firstOrCreate(
//     [
//         'barang_id' => 1,
//         'jumlah' => 200,
//         'harga' => 60000,
//         'tanggal_masuk' => now(),
//     ]
// );

// return view('stok', ['data' => $stok]);

// Menambah data stok baru jika tidak ada
// $stok = StokModel::firstOrNew(
//     [
//         'barang_id' => 2,
//         'jumlah' => 50,
//         'harga' => 30000,
//     ]
// );
// $stok->save();

// return view('stok', ['data' => $stok]);

//===== Jobsheet 4 Praktikum  2.5  Attribute Changes =====

// Menambahkan stok baru dan memeriksa perubahan
$stok = StokModel::create([
    'barang_id' => 3,
    'jumlah' => 150,
    'harga' => 25000,
    'tanggal_masuk' => now(),
]);

$stok->jumlah = 120;

// Mengecek apakah ada perubahan
$stok->isDirty(); // true
$stok->isDirty('jumlah'); // true

$stok->save();

// Mengecek setelah disimpan
$stok->isDirty(); // false
$stok->isClean(); // true


return view('stok', ['data' => $stok]);

    }
}
