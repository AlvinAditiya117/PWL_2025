<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTablesDataTables;
 use Yajra\DataTables\Facades\DataTables;
 use App\Models\KategoriModel;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Validator;
 use PhpOffice\PhpSpreadsheet\IOFactory;
 

class KategoriController extends Controller
{

    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Kategori',
            'list'  => ['Home', 'Kategori']
        ];

        $page = (object)[
            'title' => 'Daftar kategori yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori'; // set menu yang sedang aktif

        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Ambil data kategori dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $kategoris = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

        return DataTables::of($kategoris)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) { // menambahkan kolom aksi
                // $btn = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                // $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">'
                //     . csrf_field() . method_field('DELETE') .
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .
                '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .
                '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .
                '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    // Menampilkan halaman form tambah kategori 
    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah kategori baru'
        ];

        $kategori = KategoriModel::all(); // ambil data kategori untuk ditampilkan di form
        $activeMenu = 'kategori'; // set menu ysng sedang aktif

        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // menyimpan data kategori baru 
    public function store(Request $request)
    {
        $request->validate([
            // usernma harus diisi, berupa string, maksimal 10 karakter dan bernilai ditabel m_kategori kolom kategori_kode
            'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_id',
            'kategori_nama' => 'required|string|max:100' // kategori_nama harus diisi, berupa string, dan maksimal 100 karakter
        ]);

        KategoriModel::create([
            'kategori_kode'  => $request->kategori_kode,
            'kategori_nama'  => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('succes', 'Data kategori berhasil disimpan');
    }

    // menampilkan detail
    public function show(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Kategori',
            'list' => ['Home', 'Kategori', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail Kategori'
        ];
        $activeMenu = 'kategori';   // set menu yang aktif

        return view('kategori.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // menampilkan halaman form edit kategori
    public function edit(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Kategori'
        ];

        $activeMenu = 'kategori';   // set menu yang sedang aktif

        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // menyimpan perubahan data kategori
    public function update(Request $request, string $id)
    {
        $request->validate([
            // kategori_id harus diisi, berupa string, maximal 10 karakter,
            // dan bernilai unik ditabel m_kategori kolom kategori_id untuk kategori dengan id yang sedang diedit
            'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100',    // kategori_nama harus diisi, berupa string, dan maksimal 100 karakter
        ]);

        KategoriModel::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
    }

    // menghapus data kategori 
    public function destroy(string $id)
    {
        $check = KategoriModel::find($id);
        if (!$check) {  // untuk mengecek apakah data kategori dengan id yang dimaksud ada atau tidak
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
        }

        try {
            KategoriModel::destroy($id);    // hapus data kategori

            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            //Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/kategori')->with('error', 'Data gagal dihapus karena masuh terdapat tabel lain yang terkait dengan data ini');
        }
    }


    public function create_ajax()
     {
         $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
 
         return view('kategori.create_ajax', ['kategori' => $kategori]);
     }
 
     public function store_ajax(Request $request)
     {
         //cek apakah ada request berupa ajax
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode',
                 'kategori_nama' => 'required|string|max:100',
             ];
 
             // use Illuminate\Support\Facades\Validator
             $validator = Validator::make($request->all(), $rules);
 
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'Validasi Gagal',
                     'msgField' => $validator->errors(),
                 ]);
             }
 
             KategoriModel::create($request->all());
             return response()->json([
                 'status' => true,
                 'message' => 'Data kategori berhasil disimpan'
             ]);
         }
     }
 
     public function edit_ajax(string $id)
     {
         $kategori = KategoriModel::find($id);
         return view('kategori.edit_ajax', ['kategori' => $kategori]);
     }
 
     public function update_ajax(Request $request, $id)
     {
         // cek apakah request dari ajax
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
             'kategori_nama' => 'required|string|max:100',
             ];
             // use Illuminate\Support\Facades\Validator;
             $validator = Validator::make($request->all(), $rules);
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false, // respon json, true: berhasil, false: gagal
                     'message' => 'Validasi gagal.',
                     'msgField' => $validator->errors() // menunjukkan field mana yang error
                 ]);
             }
             $check = KategoriModel::find($id);
             if ($check) {
                 $check->update($request->all());
                 return response()->json([
                     'status' => true,
                     'message' => 'Data berhasil diupdate'
                 ]);
             } else {
                 return response()->json([
                     'status' => false,
                     'message' => 'Data tidak ditemukan'
                 ]);
             }
         }
         return redirect('/kategori');
     }
 
     public function confirm_ajax(string $id)
     {
         $kategori = KategoriModel::find($id);
 
         return view('kategori.confirm_ajax', ['kategori' => $kategori]);
     }
 
     public function delete_ajax(Request $request, $id)
     {
         //cek apakah request dari ajax
         if ($request->ajax() || $request->wantsJson()) {
             $kategori = KategoriModel::find($id);
             //cek apakah request dari ajax
             if ($kategori) {
                 $kategori->delete();
                 return response()->json([ 
                     'status' => true,
                     'message' => 'Data berhasil dihapus'
                 ]);
             } else {
                 return  response()->json([
                     'status' => false,
                     'message' => 'Data tidak ditemukan'
                 ]);
             }
         }
         return redirect('/');
     }
 
     public function show_ajax($id)
     {
         $kategori = KategoriModel::find($id);
         return view('kategori.show_ajax', compact('kategori'));
 
         
     }

     public function import()
     {
         return view('kategori.import');
     }
     public function import_ajax(Request $request)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 // validasi file harus xls atau xlsx, max 1MB
                 'file_kategori' => ['required', 'mimes:xlsx', 'max:1024']
             ];
             $validator = Validator::make($request->all(), $rules);
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'Validasi Gagal',
                     'msgField' => $validator->errors()
                 ]);
             }
             $file = $request->file('file_kategori'); // ambil file dari request
             $reader = IOFactory::createReader('Xlsx'); // load reader file excel
             $reader->setReadDataOnly(true); // hanya membaca data
             $spreadsheet = $reader->load($file->getRealPath()); // load file excel
             $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif
             $data = $sheet->toArray(null, false, true, true); // ambil data excel
             $insert = [];
             if (count($data) > 1) { // jika data lebih dari 1 baris
                 foreach ($data as $baris => $value) {
                     if ($baris > 1) { // baris ke 1 adalah header, maka lewati
                         $insert[] = [
                            //  'kategori_id' => $value['A'],
                             'kategori_kode' => $value['B'],
                             'kategori_nama' => $value['C'],
                             'created_at' => now(),
                         ];
                     }
                 }
                 if (count($insert) > 0) {
                     // insert data ke database, jika data sudah ada, maka diabaikan
                     KategoriModel::insertOrIgnore($insert);
                 }
                 return response()->json([
                     'status' => true,
                     'message' => 'Data berhasil diimport'
                 ]);
             } else {
                 return response()->json([
                     'status' => false,
                     'message' => 'Tidak ada data yang diimport'
                 ]);
             }
         }
         return redirect('/');
     }

     public function export_excel()
     {
         //Ambil value kategori yang akan diexport
         $kategori = KategoriModel::select(
             'kategori_kode',
             'kategori_nama',
         )
         ->orderBy('kategori_id')
         ->get();
 
         //load library excel
         $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
         $sheet = $spreadsheet->getActiveSheet(); //ambil sheet aktif
 
         $sheet->setCellValue('A1', 'No');
         $sheet->setCellValue('B1', 'Kode Kategori');
         $sheet->setCellValue('C1', 'Nama Kategori');
         
         $sheet->getStyle('A1:D1')->getFont()->setBold(true); // Set header bold
 
         $no = 1; //Nomor value dimulai dari 1
         $baris = 2; //Baris value dimulai dari 2
         foreach ($kategori as $key => $value) {
             $sheet->setCellValue('A' . $baris, $no);
             $sheet->setCellValue('B' . $baris, $value->kategori_kode);
             $sheet->setCellValue('C' . $baris, $value->kategori_nama);
             $no++;
             $baris++;
         }
 
         foreach (range('A', 'D') as $columnID) {
             $sheet->getColumnDimension($columnID)->setAutoSize(true); //set auto size untuk kolom
         }
 
         $sheet->setTitle('Data Kategori'); //set judul sheet
         $writer = IOFactory ::createWriter($spreadsheet, 'Xlsx'); //set writer
         $filename = 'Data_kategori' . date('Y-m-d_H-i-s') . '.xlsx'; //set nama file
 
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment; filename="' . $filename . '"');
         header('Cache-Control: max-age=0');
         header('Cache-Control: max-age=1');
         header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
         header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
         header('Cache-Control: cache, must-revalidate');
         header('Pragma: public');
 
         $writer->save('php://output'); //simpan file ke output
         exit; //keluar dari scriptA
     }

     public function export_pdf(){
        $kategori = KategoriModel::select(
            'kategori_kode',
            'kategori_nama'
        )
        ->orderBy('kategori_id')
        ->orderBy('kategori_kode')
        ->get();

        // use Barryvdh\DomPDF\Facade\Pdf;
        $pdf = PDF::loadView('kategori.export_pdf', ['kategori' => $kategori]);
        $pdf->setPaper('A4', 'portrait'); // set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari url
        $pdf->render(); // render pdf

        return $pdf->stream('Data Kategori Barang '.date('Y-m-d H-i-s').'.pdf');
    }
}
