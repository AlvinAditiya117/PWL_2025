<!DOCTYPE html>
<html>
<head>
    <title>Data Penjualan</title>
</head>
<body>
    <h1>Data Penjualan</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>User</th>
            <th>Total Harga</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->penjualan_id }}</td>
            <td>{{ $d->penjualan_tanggal }}</td>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->penjualan_total }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
