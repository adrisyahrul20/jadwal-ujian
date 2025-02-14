<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Ujian</title>
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
                <th>Hari / Tgl</th>
                <th>Mata Pelajaran</th>
                <th>Waktu</th>
                <th>Kelas</th>
                <th>Pengawas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataJadwal as $list)
                <tr>
                    <td>{{ Carbon::parse($list->hari_ujian)->translatedFormat('l') }} / {{ Carbon::parse($list->hari_ujian)->translatedFormat('d F Y') }}</td>
                    <td>{{ $list->idMapel->nmmapel }}</td>
                    <td>{{ $list->waktu_mulai }} - {{ $list->waktu_selesai }}</td>
                    <td>{{ $list->idKelas->kdkls }}</td>
                    <td>{{ $list->idGuru->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
