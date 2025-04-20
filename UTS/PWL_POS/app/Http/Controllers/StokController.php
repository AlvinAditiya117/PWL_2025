<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\SupplierModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    // public function index()
    // {
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
// $stok = StokModel::create([
//     'barang_id' => 3,
//     'jumlah' => 150,
//     'harga' => 25000,
//     'tanggal_masuk' => now(),
// ]);

// $stok->jumlah = 120;

// // Mengecek apakah ada perubahan
// $stok->isDirty(); // true
// $stok->isDirty('jumlah'); // true

// $stok->save();

// // Mengecek setelah disimpan
// $stok->isDirty(); // false
// $stok->isClean(); // true


// return view('stok', ['data' => $stok]);

//     }

//===== Jobsheet 4 Praktikum  2.6  Create, Read, Update, Delete (CRUD) =====

// Jobsheet 4 Praktikum 2.6


    // public function index()
    // {
    //     $breadcrumb = (object) [
    //         'title' => 'Daftar Stok',
    //         'list' => ['Home', 'Stok']
    //     ];

    //     $page = (object) [
    //         'title' => 'Daftar stok barang'
    //     ];

    //     $activeMenu = 'stok';

    //     $barang = BarangModel::all();
    //     $users = UserModel::all();
    //     $supplier = SupplierModel::all();

    //     return view('stok.index', [
    //         'breadcrumb' => $breadcrumb,
    //         'page' => $page,
    //         'barang' => $barang,
    //         'users' => $users,
    //         'supplier' => $supplier,
    //         'activeMenu' => $activeMenu
    //     ]);
    // }

    // public function list(Request $request)
    // {
    //     $stok = StokModel::with('barang', 'user', 'supplier')->select('stok_id', 'barang_id', 'user_id', 'supplier_id', 'stok_tanggal', 'stok_jumlah');

    //     // Filter data user berdasarkan stok_id
    //     if ($request->stok_id) {
    //         $stok->where('stok_id', $request->stok_id);
    //     }
    //     return DataTables::of($stok)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($stok) {
    //             return '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a>
    //                     <a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>
    //                     <form method="POST" action="' . url('/stok/' . $stok->stok_id) . '" class="d-inline-block">
    //                         ' . csrf_field() . method_field('DELETE') . '
    //                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\');">Hapus</button>
    //                     </form>';
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    // }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Stok',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah stok baru'
        ];

        $barang = BarangModel::all();
        $users = UserModel::all();
        $supplier = SupplierModel::all();
        $activeMenu = 'stok';

        return view('stok.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'barang' => $barang,
            'users' => $users,
            'supplier' => $supplier,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|integer',
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer|min:1'
        ]);

        StokModel::create($request->all());

        return redirect('/stok')->with('success', 'Data stok berhasil disimpan');
    }

    public function show(string $id)
    {
        $stok = StokModel::with('barang', 'user', 'supplier')->find($id);

        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Detail Stok',
            'list' => ['Home', 'Stok', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail informasi stok'
        ];

        $activeMenu = 'stok';

        return view('stok.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'stok' => $stok,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $stok = StokModel::find($id);
        $barang = BarangModel::all();
        $users = UserModel::all();
        $supplier = SupplierModel::all();

        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Edit Stok',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit stok'
        ];

        $activeMenu = 'stok';

        return view('stok.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'stok' => $stok,
            'barang' => $barang,
            'users' => $users,
            'supplier' => $supplier,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'supplier_id' => 'required|integer',
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer|min:1'
        ]);

        $stok = StokModel::find($id);

        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        $stok->update([
            'supplier_id' => $request->supplier_id,
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $stok = StokModel::find($id);

        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        try {
            $stok->delete();
            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/stok')->with('error', 'Data stok gagal dihapus karena masih terkait dengan tabel lain');
        }
    }

 // == Jobsheet 6 Praktikum 1

 public function index()
 {
     $breadcrumb = (object) [
         'title' => 'Daftar Stock Barang',
         'list' => ['Home', 'Stock Barang']
     ];

     $page = (object) [
         'title' => 'Daftar stock barang yang terdaftar dalam sistem'
     ];

     $barang = BarangModel::select('barang_id', 'barang_nama')->get();
     $user = UserModel::select('user_id', 'username')->get();
     $supplier = SupplierModel::select('supplier_id', 'supplier_nama')->get();

     $activeMenu = 'stok'; // set menu yang sedang aktif

     return view('stok.index', ['breadcrumb' => $breadcrumb, 'barang' => $barang, 'user'=> $user, 'supplier' => $supplier, 'page' => $page,'activeMenu' => $activeMenu]);
 }

 public function list(Request $request)
 {
     $stoks = StokModel::select('stok_id', 'supplier_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah')
         ->with(['barang', 'user', 'supplier']);
 
     if ($request->filled('barang_id')) {
         $stoks->where('barang_id', $request->barang_id);
     }
 
     if ($request->filled('user_id')) {
         $stoks->where('user_id', $request->user_id);
     }
 
     if ($request->filled('supplier_id')) {
         $stoks->where('supplier_id', $request->supplier_id);
     }
 
     return DataTables::of($stoks)
         ->addIndexColumn()
 
         // ✅ Tambahkan kolom supplier_nama (biar bisa dipanggil langsung di JS)
         ->addColumn('supplier_nama', function ($stok) {
             return $stok->supplier->supplier_nama ?? '-';
         })
 
         // ✅ (opsional) Tambahkan juga barang_nama dan user_nama untuk tampil di tabel
         ->addColumn('barang_nama', function ($stok) {
             return $stok->barang->barang_nama ?? '-';
         })
         ->addColumn('user_nama', function ($stok) {
             return $stok->user->nama ?? '-';
         })
 
         ->addColumn('aksi', function ($stok) {
             $btn = '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
             $btn .= '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
             $btn .= '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
             return $btn;
         })
         ->rawColumns(['aksi'])
         ->make(true);
 }    

 public function show_ajax(string $id)
 {
     $stok = StokModel::find($id);
     $barang = BarangModel::select('barang_id', 'barang_nama')->get();
     $user = UserModel::select('user_id', 'username')->get();
     $supplier = SupplierModel::select('supplier_id', 'supplier_nama')->get();
     return view('stok.show_ajax', ['stok' => $stok, 'barang' => $barang, 'user' => $user, 'supplier' => $supplier]);
 }

 public function create_ajax()
 {
     $barang = BarangModel::select('barang_id', 'barang_nama')->get();
     $user = UserModel::select('user_id', 'nama')->get();
     $supplier = SupplierModel::select('supplier_id', 'supplier_nama')->get(); // Ambil data supplier

     return view('stok.create_ajax', [
         'barang' => $barang,
         'user' => $user,
         'supplier' => $supplier
     ]);
 }

 // Simpan data stok baru
 public function store_ajax(Request $request)
 {
     if ($request->ajax() || $request->wantsJson()) {

         $rules = [
             'barang_id'    => ['required', 'integer', 'exists:m_barang,barang_id'],
             'user_id'      => ['required', 'integer', 'exists:m_user,user_id'],
             'supplier_id'  => ['required', 'integer', 'exists:m_supplier,supplier_id'], // validasi supplier
             'stok_tanggal' => ['required', 'date'],
             'stok_jumlah'  => ['required', 'integer', 'min:1'],
         ];


         $validator = Validator::make($request->all(), $rules);

         if ($validator->fails()) {
             return response()->json([
                 'status'   => false,
                 'message'  => 'Validasi gagal.',
                 'msgField' => $validator->errors(),
             ]);
         }

         StokModel::create($request->all());

         return response()->json([
             'status'  => true,
             'message' => 'Data stok berhasil disimpan.',
         ]);
     }

     return redirect('/');
 }

 //== Jobsheet 6 praktikum 2 ==
 public function edit_ajax(string $id)
    {
        $stok = StokModel::find($id);
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();
        $user = UserModel::select('user_id', 'nama')->get();
        $supplier = SupplierModel::select('supplier_id', 'supplier_nama')->get(); // Ambil daftar supplier

        return view('stok.edit_ajax', [
            'stok' => $stok,
            'barang' => $barang,
            'user' => $user,
            'supplier' => $supplier,
        ]);
    }

    // Update data stok
    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'barang_id'    => ['required', 'integer', 'exists:m_barang,barang_id'],
                'user_id'      => ['required', 'integer', 'exists:m_user,user_id'],
                'supplier_id'  => ['required', 'integer', 'exists:m_supplier,supplier_id'], // validasi supplier
                'stok_tanggal' => ['required', 'date'],
                'stok_jumlah'  => ['required', 'integer', 'min:1'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $stok = StokModel::find($id);
            if ($stok) {
                $stok->update($request->all());

                return response()->json([
                    'status'  => true,
                    'message' => 'Data stok berhasil diupdate.',
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan.',
            ]);
        }

        return redirect('/');
    }

    
}
