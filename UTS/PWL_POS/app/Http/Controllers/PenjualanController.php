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
// $penjualanCount = PenjualanModel::where('user_id', 1)->count();
// return view('penjualan', ['data' => $penjualanCount]);

//===== Jobsheet 4 Praktikum  2.4  Retreiving or Creating Models =====

// Menambah data penjualan jika tidak ada
// $penjualan = PenjualanModel::firstOrCreate(
//     [
//         'penjualan_kode' => 'PJ100',
//         'user_id' => 1,
//         'pembeli' => 'Rudi Hartono',
//         'penjualan_tanggal' => now(),
//     ]
// );

// return view('penjualan', ['data' => $penjualan]);

// Menambah data penjualan baru jika tidak ada
// $penjualan = PenjualanModel::firstOrNew(
//     [
//         'penjualan_kode' => 'PJ101',
//         'user_id' => 2,
//         'pembeli' => 'Maya Sari',
//     ]
// );
// $penjualan->save();

// return view('penjualan', ['data' => $penjualan]);

//===== Jobsheet 4 Praktikum  2.5  Attribute Changes =====

// Menambahkan penjualan baru dan memeriksa perubahan
$penjualan = PenjualanModel::create([
    'penjualan_kode' => 'PJ200',
    'user_id' => 1,
    'pembeli' => 'Siti Aminah',
    'penjualan_tanggal' => now(),
]);

$penjualan->penjualan_kode = 'PJ201';

// Mengecek apakah ada perubahan
$penjualan->isDirty(); // true
$penjualan->isDirty('penjualan_kode'); // true

$penjualan->save();

// Mengecek setelah disimpan
$penjualan->isDirty(); // false
$penjualan->isClean(); // true

return view('penjualan', ['data' => $penjualan]);
    }
}
