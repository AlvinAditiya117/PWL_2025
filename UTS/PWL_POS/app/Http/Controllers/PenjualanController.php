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

$data = [
    'pembeli' => 'Pelanggan Update',
];

DB::table('t_penjualan')->where('penjualan_kode', 'PJ001')->update($data);

$penjualan = PenjualanModel::all(); 
return view('penjualan', ['data' => $penjualan]);

    }
}
