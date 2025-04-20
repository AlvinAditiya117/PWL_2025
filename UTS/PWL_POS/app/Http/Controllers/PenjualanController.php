<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function index()
    {

        $now = Carbon::now();

        // DB::insert('insert into t_penjualan(penjualan_id, user_id, pembeli, penjualan_kode, penjualan_tanggal) values (?,?,?,?,?)', [9, 3, 'Maya Sari', 'PJ009', Carbon::now()->subDays(5)]);
        // DB::insert('insert into t_penjualan(penjualan_id, user_id, pembeli, penjualan_kode, penjualan_tanggal) values (?,?,?,?,?)', [10, 3, 'Dedi Kurniawan', 'PJ010', Carbon::now()->subDays(2)]);
          
   
//         $row = DB::table('t_penjualan')
//     ->where('penjualan_kode', 'PJ001')
//     ->update(['pembeli' => 'Budi S.']);

// return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

// $data = [
//     'pembeli' => 'Pelanggan Update',
// ];

// DB::table('t_penjualan')->where('penjualan_kode', 'PJ001')->update($data);

// $penjualan = PenjualanModel::all(); 
// return view('penjualan', ['data' => $penjualan]);

//===== Jobsheet 4 Praktikum 2.1 – Retrieving Single Models =====

// Mengambil penjualan berdasarkan ID
// $penjualan = PenjualanModel::find(1);
// return view('penjualan', ['data' => $penjualan]);

// Mengambil penjualan berdasarkan kode
// $penjualan = PenjualanModel::where('penjualan_kode', 'PJ001')->first();


//===== Jobsheet 4 Praktikum  2.2 – Not Found Exceptions =====

// Menampilkan penjualan atau gagal jika tidak ada
// $penjualan = PenjualanModel::findOrFail(1);
// return view('penjualan', ['data' => $penjualan]);

// Mengambil penjualan berdasarkan kode dengan firstOrFail
// $penjualan = PenjualanModel::where('penjualan_kode', 'PJ001')->firstOrFail();
// return view('penjualan', ['data' => $penjualan]);

//===== Jobsheet 4 Praktikum  2.3 – Retreiving Aggregrates =====

// Menghitung jumlah penjualan berdasarkan user_id
$penjualanCount = PenjualanModel::where('user_id', 1)->count();
return view('penjualan', ['data' => $penjualanCount]);

    }
}
