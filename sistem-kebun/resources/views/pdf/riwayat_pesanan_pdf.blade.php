<!DOCTYPE html>
<html>
<head>

    <title>Laporan Riwayat Pesanan</title>

    <style>

        body{
            font-family: sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:10px;
            text-align:left;
        }

    </style>

</head>

<body>

    <h2>
        Laporan Riwayat Pesanan
    </h2>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Tanggal</th>

            </tr>

        </thead>

        <tbody>

            @foreach($pesanan as $p)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $p->nama_produk }}</td>

                <td>{{ $p->jumlah }}</td>

                <td>

                    {{ $p->created_at
                    ->format('d-m-Y H:i') }}

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>