<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>
    
    <!-- Memuat stylesheet Bootstrap untuk tampilan yang lebih menarik -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">   
    <style>
        body {
            padding: 20px; /* Memberikan padding agar konten tidak terlalu mepet ke tepi layar */
        }
        .table-responsive {
            overflow-x: auto; /* Membuat tabel dapat digulir ke samping jika terlalu lebar */
        }
    </style>
</head>
<body>
    <h1>Detail Buku</h1> <!-- Judul halaman -->

    <div class="table-responsive">        <!-- Tabel yang menampilkan detail buku -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Judul</th> <!-- Kolom judul -->
                    <td>{{ $buku->judul }}</td> <!-- Menampilkan judul buku dari variabel $buku -->
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $buku->stok }}</td> <!-- Menampilkan jumlah stok buku -->
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td>{{ $buku->penulis }}</td> <!-- Menampilkan nama penulis buku -->
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $buku->tahun_terbit }}</td> <!-- Menampilkan tahun terbit buku -->
                </tr>
                <tr>
                    <th>Jenis Buku</th>
                    <td>{{ $buku->jenis_buku }}</td> <!-- Menampilkan jenis buku -->
                </tr>
            </tbody>
        </table>
    </div>
   <!-- Tombol untuk kembali ke daftar buku -->
    <a href="{{ route('bukus.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku</a>
   <!-- Memuat skrip Bootstrap agar elemen interaktif seperti tombol dan modal bisa berfungsi -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>