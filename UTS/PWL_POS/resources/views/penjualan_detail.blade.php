<!DOCTYPE html>
<html>
<head>
    <title>Data Penjualan Detail</title>
</head>
<body>
    <h1>Data Penjualan Detail</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Penjualan ID</th>
            <th>Barang ID</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->detail_id }}</td>
            <td>{{ $d->penjualan_id }}</td>
            <td>{{ $d->barang_id }}</td>
            <td>{{ number_format($d->harga, 0, ',', '.') }}</td>
            <td>{{ $d->jumlah }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
