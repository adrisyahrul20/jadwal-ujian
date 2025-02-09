<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Pelajaran</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    @php
        use Carbon\Carbon;

        Carbon::setLocale('id');
    @endphp
</head>

<body>
    <h2>Jadwal Ujian</h2>
    <table>
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <th>Hari Ujian</th>
                <th>Tanggal Ujian</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Kelas</th>
                <th>Pengawas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataJadwal as $list)
                <tr>
                    <td>{{ $list->idMapel->nmmapel }}</td>
                    <td>{{ Carbon::parse($list->hari_ujian)->translatedFormat('l') }}</td>
                    <td>{{ Carbon::parse($list->hari_ujian)->translatedFormat('d F Y') }}</td>
                    <td>{{ $list->waktu_mulai }}</td>
                    <td>{{ $list->waktu_selesai }}</td>
                    <td>{{ $list->idKelas->kdkls }}</td>
                    <td>{{ $list->idGuru->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
