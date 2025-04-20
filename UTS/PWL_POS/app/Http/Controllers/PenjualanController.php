<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Shared\Date;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
   

    //     $now = Carbon::now();

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
    // $penjualan = PenjualanModel::create([
    //     'penjualan_kode' => 'PJ200',
    //     'user_id' => 1,
    //     'pembeli' => 'Siti Aminah',
    //     'penjualan_tanggal' => now(),
    // ]);

    // $penjualan->penjualan_kode = 'PJ201';

    // // Mengecek apakah ada perubahan
    // $penjualan->isDirty(); // true
    // $penjualan->isDirty('penjualan_kode'); // true

    // $penjualan->save();

    // // Mengecek setelah disimpan
    // $penjualan->isDirty(); // false
    // $penjualan->isClean(); // true

    // return view('penjualan', ['data' => $penjualan]);

    //===== Jobsheet 4 Praktikum  2.6  Create, Read, Update, Delete (CRUD) =====


    // public function index()
    // {
    //     $penjualan = PenjualanModel::all();
    //     return view('penjualan', ['data' => $penjualan]);
    // }

    // public function tambah()
    // {
    //     return view('penjualan_tambah');
    // }

    // public function tambah_simpan(Request $request)
    // {
    //     PenjualanModel::create([
    //         'penjualan_kode' => $request->penjualan_kode,
    //         'penjualan_tanggal' => $request->penjualan_tanggal,
    //         'user_id' => $request->user_id,
    //     ]);

    //     return redirect('/penjualan');
    // }

    // public function ubah($id)
    // {
    //     $penjualan = PenjualanModel::find($id);
    //     return view('penjualan_ubah', ['data' => $penjualan]);
    // }

    // public function ubah_simpan($id, Request $request)
    // {
    //     $penjualan = PenjualanModel::find($id);

    //     $penjualan->penjualan_kode = $request->penjualan_kode;
    //     $penjualan->penjualan_tanggal = $request->penjualan_tanggal;
    //     $penjualan->user_id = $request->user_id;

    //     $penjualan->save();

    //     return redirect('/penjualan');
    // }

    // public function hapus($id)
    // {
    //     $penjualan = PenjualanModel::find($id);
    //     $penjualan->delete();

    //     return redirect('/penjualan');
    // }

    //===== Jobsheet 4 Praktikum  2.6  Create, Read, Update, Delete (CRUD) =====

    //========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
    public function index(){
    $breadcrumb = (object) [
        'title' => 'Daftar Penjualan',
        'list'  => ['Home', 'Penjualan']
    ];

    $page = (object) [
        'title' => 'Daftar penjualan yang terdaftar dalam sistem'
    ];

    $activeMenu = 'penjualan';


    $users = UserModel::all();

    return view('penjualan.index', [
        'breadcrumb' => $breadcrumb,
        'page'       => $page,
        'users'      => $users,
        'activeMenu' => $activeMenu
    ]);
}

//========================================================================================Jobsheet 4 Praktikum 2.6============================================================================================
public function tambah()
{
    $users = UserModel::all();
    return view('penjualan_tambah', ['users' => $users]);
}

public function tambah_simpan(Request $request)
{
    PenjualanModel::create([
        'user_id' => $request->user_id,
        'pembeli' => $request->pembeli,
        'penjualan_kode' => $request->penjualan_kode,
        'penjualan_tanggal' => $request->penjualan_tanggal,
    ]);

    return redirect('/penjualan');
}

public function ubah($id)
{
    $penjualan = PenjualanModel::find($id);
    $users = UserModel::all();
    return view('penjualan_ubah', ['data' => $penjualan, 'users' => $users]);
}

public function ubah_simpan($id, Request $request)
{
    $penjualan = PenjualanModel::find($id);

    $penjualan->user_id = $request->user_id;
    $penjualan->pembeli = $request->pembeli;
    $penjualan->penjualan_kode = $request->penjualan_kode;
    $penjualan->penjualan_tanggal = $request->penjualan_tanggal;

    $penjualan->save();

    return redirect('/penjualan');
}

public function hapus($id)
{
    $penjualan = PenjualanModel::find($id);
    $penjualan->delete();

    return redirect('/penjualan');
}
//==================================================================================================================================================================================================

//========================================================================================Jobsheet 5================================================================================================
public function list(Request $request)
{
    // Select kolom yang akan ditampilkan di list
    $penjualans = PenjualanModel::select(
        'penjualan_id',
        'user_id',
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal'
    )
    ->with('user'); // Relasi ke model user

    // Filter data berdasarkan user_id
    $user_id = $request->input('user_id');
    if (!empty($user_id)) {
        $penjualans->where('user_id', $user_id);
    }

    return DataTables::of($penjualans)
        ->addIndexColumn() // kolom DT_RowIndex
        ->addColumn('aksi', function ($penjualans) {
            // Tombol Detail, Edit, dan Hapus
            $btn = '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualans->penjualan_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
            // $btn .= '<a href="'.url('/penjualan/' . $penjualans->penjualan_id . '/edit').'"
            //             class="btn btn-warning btn-sm">Edit</a> ';

            // $btn .= '<form class="d-inline-block" method="POST"
            //             action="'.url('/penjualan/'.$penjualans->penjualan_id).'">'
            //         . csrf_field()
            //         . method_field('DELETE')
            //         . '<button type="submit" class="btn btn-danger btn-sm"
            //             onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">
            //             Hapus
            //           </button></form>';
            $btn .= '<a href="' . url('/penjualan/' . $penjualans->penjualan_id . '/receipt_pdf') . '" class="btn btn-sm btn-warning mr-1">Cetak Struk</a>';
            $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualans->penjualan_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';

            return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
}

// Menampilkan halaman form tambah penjualan
public function create()
{
    $breadcrumb = (object) [
        'title' => 'Tambah Penjualan',
        'list'  => ['Home', 'Penjualan', 'Tambah']
    ];

    $page = (object) [
        'title' => 'Tambah penjualan baru'
    ];

    $activeMenu = 'penjualan';

    // Ambil data user untuk keperluan pemilihan kasir / user
    $users = UserModel::all();

    return view('penjualan.create', [
        'breadcrumb' => $breadcrumb,
        'page'       => $page,
        'activeMenu' => $activeMenu,
        'users'      => $users
    ]);
}

// Menyimpan data penjualan baru
public function store(Request $request)
{
    $request->validate([
        'user_id'          => 'required|integer',
        'pembeli'          => 'required|string|max:100',
        'penjualan_kode'   => 'required|string|max:20|unique:t_penjualan,penjualan_kode',
        'penjualan_tanggal'=> 'required|date',
    ]);

    PenjualanModel::create([
        'user_id'          => $request->user_id,
        'pembeli'          => $request->pembeli,
        'penjualan_kode'   => $request->penjualan_kode,
        'penjualan_tanggal'=> $request->penjualan_tanggal,
    ]);

    return redirect('/penjualan')->with('success', 'Data penjualan berhasil disimpan');
}

// Menampilkan detail penjualan
public function show(string $id)
{
    // Gunakan with('user') agar info user (kasir) dapat ditampilkan
    $penjualan = PenjualanModel::with('user')->find($id);

    $breadcrumb = (object) [
        'title' => 'Detail Penjualan',
        'list'  => ['Home', 'Penjualan', 'Detail']
    ];

    $page = (object) [
        'title' => 'Detail penjualan'
    ];

    $activeMenu = 'penjualan';

    return view('penjualan.show', [
        'breadcrumb' => $breadcrumb,
        'page'       => $page,
        'penjualan'  => $penjualan,
        'activeMenu' => $activeMenu
    ]);
}

// Menampilkan halaman form edit penjualan
public function edit(string $id)
{
    $penjualan = PenjualanModel::find($id);
    if (!$penjualan) {
        return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
    }

    $breadcrumb = (object) [
        'title' => 'Edit Penjualan',
        'list'  => ['Home', 'Penjualan', 'Edit']
    ];

    $page = (object) [
        'title' => 'Edit penjualan'
    ];

    $activeMenu = 'penjualan';

    // Ambil data user untuk mengisi dropdown user
    $users = UserModel::all();

    return view('penjualan.edit', [
        'breadcrumb' => $breadcrumb,
        'page'       => $page,
        'penjualan'  => $penjualan,
        'users'      => $users,
        'activeMenu' => $activeMenu
    ]);
}

// Menyimpan perubahan data penjualan
public function update(Request $request, string $id)
{
    $request->validate([
        'user_id'          => 'required|integer',
        'pembeli'          => 'required|string|max:100',
        'penjualan_kode'   => 'required|string|max:20|unique:t_penjualan,penjualan_kode,'.$id.',penjualan_id',
        'penjualan_tanggal'=> 'required|date',
    ]);

    $penjualan = PenjualanModel::find($id);
    if (!$penjualan) {
        return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
    }

    $penjualan->update([
        'user_id'          => $request->user_id,
        'pembeli'          => $request->pembeli,
        'penjualan_kode'   => $request->penjualan_kode,
        'penjualan_tanggal'=> $request->penjualan_tanggal,
    ]);

    return redirect('/penjualan')->with('success', 'Data penjualan berhasil diubah');
}

// Menghapus data penjualan
public function destroy(string $id)
{
    $check = PenjualanModel::find($id);
    if (!$check) {
        return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
    }

    try {
        PenjualanModel::destroy($id);
        return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
    } catch (\Illuminate\Database\QueryException $e) {
        // Jika ada constraint foreign key, dsb.
        return redirect('/penjualan')->with(
            'error',
            'Data penjualan gagal dihapus karena masih ada data lain yang terkait'
        );
    }
}
//==================================================================================================================================================================================================

//========================================================================================Jobsheet 6================================================================================================
public function create_ajax()
{
    $users = UserModel::all();
    $barangs = BarangModel::all();
    return view('penjualan.create_ajax')->with(['users' => $users, 'barangs' => $barangs]);
}

public function store_ajax(Request $request)
{
    $rules = [
        'pembeli'           => ['required', 'string', 'max:100'],
        'penjualan_kode'    => ['required', 'string', 'max:20', 'unique:t_penjualan,penjualan_kode'],
        'details'           => ['required', 'array', 'min:1'],
        'details.*.barang_id' => ['required', 'integer'],
        'details.*.jumlah'    => ['required', 'integer', 'min:1'],
        'details.*.harga'     => ['required', 'numeric'],
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json([
            'status'   => false,
            'message'  => 'Validasi Gagal',
            'msgField' => $validator->errors()
        ]);
    }

    DB::beginTransaction();
    try {

        $dataPenjualan = $request->only([
            'pembeli', 'penjualan_kode'
        ]);
        $dataPenjualan['user_id'] = auth()->id();
        $dataPenjualan['penjualan_tanggal'] =  now();

        $penjualan = PenjualanModel::create($dataPenjualan);

        foreach ($request->details as $index => $detail) {
            $barang = BarangModel::where('barang_id', $detail['barang_id'])->first();

            if (!$barang || $barang->barang_stok < 1) {
                DB::rollBack();
                return response()->json([
                    'status'  => false,
                    'message' => 'Stok barang tidak tersedia atau habis pada baris ke-' . ($index + 1)
                ]);
            }

            if ($detail['jumlah'] > $barang->barang_stok) {
                DB::rollBack();
                return response()->json([
                    'status'  => false,
                    'message' => 'Jumlah yang diminta melebihi stok yang tersedia pada baris ke-' . ($index + 1)
                ]);
            }

            $barang->barang_stok -= $detail['jumlah'];
            $barang->save();

            PenjualanDetailModel::create([
                'penjualan_id' => $penjualan->penjualan_id,
                'barang_id'    => $detail['barang_id'],
                'jumlah'       => $detail['jumlah'],
                'harga'        => $detail['harga'],
            ]);
        }

        DB::commit();

        return response()->json([
            'status'  => true,
            'message' => 'Data penjualan beserta detail berhasil disimpan'
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'status'  => false,
            'message' => 'Terjadi kesalahan saat menyimpan data. ' . $e->getMessage()
        ]);
    }
}

public function show_ajax($id)
{
    $penjualan = PenjualanModel::with(['user', 'penjualanDetail.barang'])->find($id);

    $penjualanDetail = $penjualan->penjualanDetail;

    return view('penjualan.show_ajax', ['penjualanDetail' => $penjualanDetail]);
}

public function confirm_ajax($id)
{
    $penjualan = PenjualanModel::with(['penjualanDetail.barang', 'user'])->find($id);
    return view('penjualan.confirm_ajax', ['penjualan' => $penjualan]);
}

public function delete_ajax(Request $request, $id)
{
    if ($request->ajax() || $request->wantsJson()) {
        $penjualan = PenjualanModel::find($id);
        if ($penjualan) {
            $penjualan->delete();
            return response()->json([
                'status'  => true,
                'message' => 'Data penjualan beserta detailnya berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Data penjualan tidak ditemukan'
            ]);
        }
    }
}

public function import()
{
    return view('penjualan.import');
}

public function import_ajax(Request $request)
{
    if (! $request->ajax() && ! $request->wantsJson()) {
        return redirect()->back();
    }

    // 1) validasi file
    $validator = Validator::make($request->all(), [
        'file_penjualan' => ['required','mimes:xlsx','max:2048'],
    ]);
    if ($validator->fails()) {
        return response()->json([
            'status'   => false,
            'message'  => 'Validasi gagal',
            'msgField' => $validator->errors()
        ]);
    }

    // 2) load spreadsheet
    $path        = $request->file('file_penjualan')->getPathname();
    $reader      = IOFactory::createReader('Xlsx');
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($path);

    // Sheet pertama = header penjualan, sheet kedua = detail
    $sheetH = $spreadsheet->getSheet(0)->toArray(null, true, true, true);
    $sheetD = $spreadsheet->getSheet(1)->toArray(null, true, true, true);

    DB::beginTransaction();
    try {
        // Mengimport penjualan
        $mapKode = []; // [ penjualan_kode => penjualan_id ]
        foreach ($sheetH as $rowNum => $row) {
            if ($rowNum === 1) {
                // anggap baris 1 adalah header kolom: skip
                continue;
            }

            // baca kolom A:D sesuai template:
            $userId  = intval($row['A'] ?? 0);
            $pembeli = trim($row['B']  ?? '');
            $kode    = trim($row['C']  ?? '');
            $tgl     = trim($row['D']  ?? '');

            // jika salah satu field wajib kosong, skip baris ini
            if (! $userId || $kode === '' || ! $tgl) {
                continue;
            }

            // insert penjualan baru
            $p = PenjualanModel::create([
                'user_id'           => $userId,
                'pembeli'           => $pembeli,
                'penjualan_kode'    => $kode,
                'penjualan_tanggal' => date('Y-m-d H:i:s', strtotime($tgl)),
            ]);

            // simpan mapping untuk detail
            $mapKode[$kode] = $p->penjualan_id;
        }

        // Mengimport detail penjualan serta update stok di barang
        foreach ($sheetD as $rowNum => $row) {
            if ($rowNum === 1) {
                // skip header kolom
                continue;
            }

            $kode      = trim($row['A'] ?? '');
            $barangId  = intval($row['B'] ?? 0);
            $jumlah    = intval($row['C'] ?? 0);
            $harga     = floatval($row['D'] ?? 0);

            // pastikan header dengan kode ini sudah di‐import
            if (! isset($mapKode[$kode])) {
                throw new \Exception("Header penjualan kode “{$kode}” tidak ditemukan (baris {$rowNum}).");
            }
            $penjualanId = $mapKode[$kode];

            // cek & kurangi stok di BarangModel
            $barang = BarangModel::find($barangId);
            if (! $barang) {
                throw new \Exception("Barang dengan ID {$barangId} tidak ditemukan (baris {$rowNum}).");
            }
            if ($barang->barang_stok < $jumlah) {
                throw new \Exception("Stok tidak mencukupi untuk barang “{$barang->barang_nama}” (baris {$rowNum}).");
            }
            // kurangi stok
            $barang->decrement('barang_stok', $jumlah);

            // simpan detail
            PenjualanDetailModel::create([
                'penjualan_id' => $penjualanId,
                'barang_id'    => $barangId,
                'jumlah'       => $jumlah,
                'harga'        => $harga,
            ]);
        }

        DB::commit();

        return response()->json([
            'status'  => true,
            'message' => 'Import berhasil: data penjualan & detail tersimpan, stok terupdate.'
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'status'  => false,
            'message' => 'Import gagal: ' . $e->getMessage()
        ]);
    }
}

public function export_excel()
{
    // Ambil semua penjualan beserta relasi user dan detail->barang
    $penjualans = PenjualanModel::with(['user', 'penjualanDetail.barang'])
        ->orderBy('penjualan_tanggal')
        ->get();

    // Buat objek spreadsheet dan sheet pertama
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet1 = $spreadsheet->getActiveSheet();
    $sheet1->setTitle('Master Penjualan');

    // Header untuk sheet Master
    $sheet1->setCellValue('A1', 'No');
    $sheet1->setCellValue('B1', 'User');
    $sheet1->setCellValue('C1', 'Pembeli');
    $sheet1->setCellValue('D1', 'Kode Penjualan');
    $sheet1->setCellValue('E1', 'Tanggal Penjualan');
    $sheet1->getStyle('A1:E1')->getFont()->setBold(true);

    // Isi data master
    $row = 2;
    $no = 1;
    foreach ($penjualans as $penjualan) {
        $sheet1->setCellValue("A{$row}", $no);
        $sheet1->setCellValue("B{$row}", $penjualan->user->username);
        $sheet1->setCellValue("C{$row}", $penjualan->pembeli);
        $sheet1->setCellValue("D{$row}", $penjualan->penjualan_kode);
        $sheet1->setCellValue("E{$row}", date('Y-m-d H:i:s', strtotime($penjualan->penjualan_tanggal)));
        $no++;
        $row++;
    }

    // Auto‑size kolom sheet1
    foreach (range('A','E') as $col) {
        $sheet1->getColumnDimension($col)->setAutoSize(true);
    }

    // Buat sheet kedua untuk detail
    $sheet2 = $spreadsheet->createSheet();
    $sheet2->setTitle('Detail Penjualan');

    // Header untuk sheet Detail
    $sheet2->setCellValue('A1', 'No');
    $sheet2->setCellValue('B1', 'Kode Penjualan');
    $sheet2->setCellValue('C1', 'Nama Barang');
    $sheet2->setCellValue('D1', 'Jumlah');
    $sheet2->setCellValue('E1', 'Harga');
    $sheet2->getStyle('A1:E1')->getFont()->setBold(true);

    // Isi data detail
    $row = 2;
    $no = 1;
    foreach ($penjualans as $penjualan) {
        foreach ($penjualan->penjualanDetail as $detail) {
            $sheet2->setCellValue("A{$row}", $no);
            $sheet2->setCellValue("B{$row}", $penjualan->penjualan_kode);
            $sheet2->setCellValue("C{$row}", $detail->barang->barang_nama);
            $sheet2->setCellValue("D{$row}", $detail->jumlah);
            $sheet2->setCellValue("E{$row}", $detail->harga);
            $no++;
            $row++;
        }
    }

    // Auto‑size kolom sheet2
    foreach (range('A','E') as $col) {
        $sheet2->getColumnDimension($col)->setAutoSize(true);
    }

    // Kirim header untuk download
    $writer   = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $filename = 'Data_Penjualan_Detail_' . date('Y-m-d_H-i-s') . '.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'. $filename .'"');
    header('Cache-Control: max-age=0');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: '. gmdate('D, d M Y H:i:s') .' GMT');
    header('Cache-Control: cache, must-revalidate');
    header('Pragma: public');

    $writer->save('php://output');
    exit;
}

public function export_pdf(){
    $penjualan = PenjualanModel::with(['user','penjualanDetail'])
        ->orderBy('penjualan_id')
        ->orderBy('penjualan_kode')
        ->get();


    // use Barryvdh\DomPDF\Facade\Pdf;
    $pdf = PDF::loadView('penjualan.export_pdf', ['penjualan' => $penjualan]);
    $pdf->setPaper('A4', 'portrait'); // set ukuran kertas dan orientasi
    $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari url
    $pdf->render(); // render pdf

    return $pdf->stream('Data Supplier '.date('Y-m-d H-i-s').'.pdf');
}


}