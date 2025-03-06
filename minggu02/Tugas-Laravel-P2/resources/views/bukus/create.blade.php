<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title> <!-- Menentukan judul halaman -->

    <!-- Memuat stylesheet Bootstrap untuk tampilan yang lebih menarik -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            padding: 20px; /* Memberikan ruang di sekitar konten agar tampilan lebih nyaman */
        }
    </style>
</head>
<body>
    <h1>Tambah Buku</h1> <!-- Judul halaman -->

    <!-- Formulir untuk menambahkan buku -->
    <form action="{{ route('bukus.store') }}" method="POST">
        @csrf <!-- Token keamanan Laravel untuk mencegah serangan CSRF -->

        <!-- Input untuk Judul Buku -->
        <div class="mb-3">
            <label for="judul" class="form-label">Judul:</label>
            <input type="text" name="judul" class="form-control" required> <!-- Input teks untuk judul buku -->
        </div>

        <!-- Input untuk Stok -->
        <div class="mb-3">
            <label for="stok" class="form-label">Stok:</label>
            <input type="number" name="stok" class="form-control" required> <!-- Input angka untuk stok buku -->
        </div>

        <!-- Input untuk Penulis -->
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis:</label>
            <input type="text" name="penulis" class="form-control" required> <!-- Input teks untuk nama penulis -->
        </div>

        <!-- Input untuk Tahun Terbit -->
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" class="form-control" required> <!-- Input angka untuk tahun terbit -->
        </div>

        <!-- Input untuk Jenis Buku -->
        <div class="mb-3">
            <label for="jenis_buku" class="form-label">Jenis Buku:</label>
            <input type="text" name="jenis_buku" class="form-control" required> <!-- Input teks untuk jenis buku -->
        </div>

        <!-- Tombol untuk menambahkan buku ke dalam database -->
        <button type="submit" class="btn btn-primary">Tambah Buku</button>
    </form>

    <!-- Tombol untuk kembali ke daftar buku -->
    <a href="{{ route('bukus.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku</a>

    <!-- Memuat skrip Bootstrap agar elemen interaktif seperti tombol bisa berfungsi -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>