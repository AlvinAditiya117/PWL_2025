<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    
    <!-- Memuat stylesheet Bootstrap untuk tampilan yang lebih menarik -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        body {
            padding: 20px; /* Memberikan ruang di sekitar konten */
        }
    </style>
</head>
<body>
    <h1>Edit Buku</h1> <!-- Judul halaman -->

    <!-- Form untuk mengedit buku -->
    <form action="{{ route('bukus.update', $buku) }}" method="POST">
        @csrf <!-- Token keamanan Laravel -->
        @method('PUT') <!-- Metode HTTP PUT untuk memperbarui data -->

        <!-- Input untuk Judul -->
        <div class="mb-3">
            <label for="judul" class="form-label">Judul:</label>
            <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
        </div>

        <!-- Input untuk Stok -->
        <div class="mb-3">
            <label for="stok" class="form-label">Stok:</label>
            <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
        </div>

        <!-- Input untuk Penulis -->
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis:</label>
            <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
        </div>

        <!-- Input untuk Tahun Terbit -->
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
        </div>

        <!-- Input untuk Jenis Buku -->
        <div class="mb-3">
            <label for="jenis_buku" class="form-label">Jenis Buku:</label>
            <input type="text" name="jenis_buku" class="form-control" value="{{ $buku->jenis_buku }}" required>
        </div>

        <!-- Tombol untuk menyimpan perubahan -->
        <button type="submit" class="btn btn-primary">Update Buku</button>
    </form>

    <!-- Tombol untuk kembali ke daftar buku -->
    <a href="{{ route('bukus.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku</a>

    <!-- Memuat skrip Bootstrap agar elemen interaktif seperti tombol bisa berfungsi -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>