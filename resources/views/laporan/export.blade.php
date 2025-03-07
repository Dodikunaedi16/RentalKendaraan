<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          integrity="sha384-TFHZJpFr6S3t92U6Ge8tAf2uyxOFH+o9TMR8vjI8CBa70X1h6C+6KE6gJl0Og9gH"
          crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 40px;
            max-width: 90%;
        }
        h1 {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }
        .table {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table tfoot {
            font-weight: bold;
            background-color: #e9ecef;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
        }
        .empty-data {
            color: #dc3545;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Laporan Transaksi</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Polisi</th>
                        <th>Kapasitas Mobil</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat</th>
                        <th>Lama Sewa</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksi as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->mobil->nopolisi }}</td>
                            <td>{{ $data->mobil->kapasitas }} Mobil</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->lama }} Hari</td>
                            <td>{{ \Carbon\Carbon::parse($data->tgl_pesan)->format('d-m-Y') }}</td>
                            <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty-data">Data laporan belum ada!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
