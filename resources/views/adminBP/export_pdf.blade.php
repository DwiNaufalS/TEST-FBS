<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Antrian GR</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Antrian GR</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Polisi</th>
                <th>Jenis Antrian</th>
                <th>Waktu Pemanggilan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($queues as $index => $queue)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $queue->no_polisi }}</td>
                    <td>{{ $queue->jenis_antrian }}</td>
                    <td>{{ $queue->waktu_pemanggilan }}</td>
                    <td>{{ $queue->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
