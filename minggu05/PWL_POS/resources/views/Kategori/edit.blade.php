@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Kategori</h2>
        <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kodeKategori">Kode Kategori</label>
                <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" value="{{ $kategori->kategori_kode }}" required>
            </div>
            <div class="form-group">
                <label for="namaKategori">Nama Kategori</label>
                <input type="text" class="form-control" id="namaKategori" name="namaKategori" value="{{ $kategori->kategori_nama }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection