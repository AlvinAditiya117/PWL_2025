<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    
    <!-- Memuat stylesheet Bootstrap untuk tampilan yang lebih menarik -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        body {
            padding: 20px; /* Memberikan ruang di sekitar konten */
        }
        table {
            width: 100%; /* Agar tabel memenuhi lebar layar */
            border-collapse: collapse; /* Menggabungkan border tabel agar tampak lebih rapi */
        }
        th, td {
            padding: 8px; /* Memberikan ruang dalam sel tabel */
            border: 1px solid #ddd; /* Menambahkan garis pembatas antar sel */
            text-align: left; /* Menyelaraskan teks ke kiri */
        }
        th {
            background-color: #f2f2f2; /* Memberikan warna latar belakang pada header tabel */
        }
        .btn {
            margin-right: 5px; /* Memberikan jarak antar tombol */
        }
    </style>
</head>
<body>
    <h1>Buku</h1> <!-- Judul halaman -->

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol untuk menambahkan buku baru -->
    <a href="{{ route('bukus.create') }}" class="btn btn-primary">Tambah Buku</a>

    <!-- Tabel daftar buku -->
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Jenis Buku</th>
                <th>Stok</th>
                <th>Aksi</th> <!-- Kolom untuk tombol aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku) <!-- Looping data buku dari backend -->
                <tr>
                    <td>{{ $buku->judul }}</td> <!-- Menampilkan judul buku -->
                    <td>{{ $buku->penulis }}</td> <!-- Menampilkan nama penulis -->
                    <td>{{ $buku->tahun_terbit }}</td> <!-- Menampilkan tahun terbit -->
                    <td>{{ $buku->jenis_buku }}</td> <!-- Menampilkan jenis buku -->
                    <td>{{ $buku->stok }}</td> <!-- Menampilkan jumlah stok -->
                    <td>
                        <!-- Tombol untuk melihat detail buku -->
                        <a href="{{ route('bukus.show', $buku) }}" class="btn btn-info btn-sm">Detail</a>
                        
                        <!-- Tombol untuk mengedit buku -->
                        <a href="{{ route('bukus.edit', $buku) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Form untuk menghapus buku -->
                        <form action="{{ route('bukus.destroy', $buku) }}" method="POST" style="display:inline;">
                            @csrf <!-- Token keamanan Laravel -->
                            @method('DELETE') <!-- Metode DELETE untuk menghapus data -->
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   <!-- Memuat skrip Bootstrap agar elemen interaktif seperti tombol dan modal bisa berfungsi -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>