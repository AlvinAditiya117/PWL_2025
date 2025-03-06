<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk controller ini

use App\Models\buku; // Mengimpor model Buku agar bisa digunakan
use Illuminate\Http\Request; // Mengimpor class Request untuk menangani request dari user

class BukuController extends Controller // Mendefinisikan class BukuController yang extends dari Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // Fungsi untuk menampilkan daftar buku
    {
        $bukus = buku::all(); // Mengambil semua data buku dari database menggunakan model Buku
        return view('bukus.index', compact('bukus')); // Mengembalikan view 'bukus.index' dan mengirimkan data buku (compact('bukus')) ke view tersebut.  compact('bukus') sama dengan ['bukus' => $bukus]
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // Fungsi untuk menampilkan form tambah buku
    {
        return view('bukus.create'); // Mengembalikan view 'bukus.create' yang berisi form untuk menambahkan buku baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Fungsi untuk menyimpan data buku baru ke database
    {
        $request->validate([ // Validasi data yang dikirimkan dari form
            'judul' => 'required', // Judul buku wajib diisi
            'stok' => 'required|integer', // Stok buku wajib diisi dan harus berupa integer
            'penulis' => 'required', // Penulis buku wajib diisi
            'tahun_terbit' => 'required|integer', // Tahun terbit wajib diisi dan harus berupa integer
            'jenis_buku' => 'required', // Jenis buku wajib diisi
        ]);

        buku::create($request->all()); // Membuat data buku baru di database berdasarkan data yang dikirimkan dari form
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan.'); // Redirect ke halaman daftar buku dan menampilkan pesan sukses
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku) // Fungsi untuk menampilkan detail buku
    {
        return view('bukus.show', compact('buku')); // Mengembalikan view 'bukus.show' dan mengirimkan data buku ke view tersebut
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku) // Fungsi untuk menampilkan form edit buku
    {
        return view('bukus.edit', compact('buku')); // Mengembalikan view 'bukus.edit' dan mengirimkan data buku yang akan diedit ke view tersebut
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku $buku) // Fungsi untuk mengupdate data buku di database
    {
        $request->validate([ // Validasi data yang dikirimkan dari form
            'judul' => 'required',
            'stok' => 'required|integer',
            'penulis' => 'required',
            'tahun_terbit' => 'required|integer',
            'jenis_buku' => 'required',
        ]);

        $buku->update($request->all()); // Mengupdate data buku di database berdasarkan data yang dikirimkan dari form
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil diupdate.'); // Redirect ke halaman daftar buku dan menampilkan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku) // Fungsi untuk menghapus data buku dari database
    {
        $buku->delete(); // Menghapus data buku dari database
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus.'); // Redirect ke halaman daftar buku dan menampilkan pesan sukses
    }
}
