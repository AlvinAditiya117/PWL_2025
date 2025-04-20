<?php

namespace App\Http\Controllers;

use App\Models\PenjualanDetailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class PenjualanDetailController extends Controller
{
    // public function index()
    // {

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

// // Mengambil detail penjualan berdasarkan penjualan_id
// $penjualanDetail = PenjualanDetailModel::where('penjualan_id', 1)->get();
// return view('penjualan_detail', ['data' => $penjualanDetail]);

//===== Jobsheet 4 Praktikum  2.2 – Not Found Exceptions =====

// Menampilkan detail penjualan atau gagal jika tidak ada
// $penjualanDetail = PenjualanDetailModel::findOrFail(1);
// return view('penjualan_detail', ['data' => $penjualanDetail]);

// Mengambil detail penjualan berdasarkan penjualan_id dengan firstOrFail
// $penjualanDetail = PenjualanDetailModel::where('penjualan_id', 1)->firstOrFail();
// return view('penjualan_detail', ['data' => $penjualanDetail]);

//===== Jobsheet 4 Praktikum  2.3 – Retreiving Aggregrates =====

// Menghitung jumlah barang yang dijual berdasarkan penjualan_id
// $penjualanDetailCount = PenjualanDetailModel::where('penjualan_id', 1)->count();
// return view('penjualan_detail', ['data' => $penjualanDetailCount]);

//===== Jobsheet 4 Praktikum  2.4  Retreiving or Creating Models =====

// Menambah data detail penjualan jika tidak ada
// $penjualanDetail = PenjualanDetailModel::firstOrCreate(
//     [
//         'penjualan_id' => 1,
//         'barang_id' => 1,
//         'harga' => 1200000,
//         'jumlah' => 2,
//     ]
// );

// return view('penjualan_detail', ['data' => $penjualanDetail]);

// Menambah data detail penjualan baru jika tidak ada
// $penjualanDetail = PenjualanDetailModel::firstOrNew(
//     [
//         'penjualan_id' => 1,
//         'barang_id' => 2,
//         'harga' => 50000,
//         'jumlah' => 1,
//     ]
// );
// $penjualanDetail->save();

// return view('penjualan_detail', ['data' => $penjualanDetail]);

//===== Jobsheet 4 Praktikum  2.5  Attribute Changes =====

// Menambahkan detail penjualan baru dan memeriksa perubahan
// $penjualanDetail = PenjualanDetailModel::create([
//     'penjualan_id' => 1,
//     'barang_id' => 3,
//     'harga' => 300000,
//     'jumlah' => 2,
// ]);

// $penjualanDetail->jumlah = 5;

// // Mengecek apakah ada perubahan
// $penjualanDetail->isDirty(); // true
// $penjualanDetail->isDirty('jumlah'); // true

// $penjualanDetail->save();

// // Mengecek setelah disimpan
// $penjualanDetail->isDirty(); // false
// $penjualanDetail->isClean(); // true


// return view('penjualan_detail', ['data' => $penjualanDetail]);
//   }

//===== Jobsheet 4 Praktikum  2.6  Create, Read, Update, Delete (CRUD) =====

// Jobsheet 4 Praktikum 2.6

public function index()
{
    $detail = PenjualanDetailModel::all();
    return view('penjualan_detail', ['data' => $detail]);
}

public function tambah()
{
    return view('penjualan_detail_tambah');
}

public function tambah_simpan(Request $request)
{
    PenjualanDetailModel::create([
        'penjualan_id' => $request->penjualan_id,
        'barang_id' => $request->barang_id,
        'harga' => $request->harga,
        'jumlah' => $request->jumlah,
    ]);

    return redirect('/penjualan_detail');
}

public function ubah($id)
{
    $detail = PenjualanDetailModel::find($id);
    return view('penjualan_detail_ubah', ['data' => $detail]);
}

public function ubah_simpan($id, Request $request)
{
    $detail = PenjualanDetailModel::find($id);

    $detail->penjualan_id = $request->penjualan_id;
    $detail->barang_id = $request->barang_id;
    $detail->harga = $request->harga;
    $detail->jumlah = $request->jumlah;

    $detail->save();

    return redirect('/penjualan_detail');
}

public function hapus($id)
{
    $detail = PenjualanDetailModel::find($id);
    $detail->delete();

    return redirect('/penjualan_detail');
}



}
