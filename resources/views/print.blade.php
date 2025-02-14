<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Ujian</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 5mm;
        }
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
                <th>Hari/Tgl</th>
                <th>Mata Pelajaran</th>
                <th>Waktu</th>
                <th>9A</th>
                <th>9B</th>
                <th>9C</th>
                <th>9D</th>
                <th>9E</th>
                <th>8A</th>
                <th>8B</th>
                <th>8C</th>
                <th>8D</th>
                <th>8E</th>
                <th>7A</th>
                <th>7B</th>
                <th>7C</th>
                <th>7D</th>
                <th>7E</th>
                <th>7F</th>
                <th>LAB</th>
                <th>CAD</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $list)
                <tr>
                    <td>{{ Carbon::parse($list->hari_ujian)->translatedFormat('l') }} / {{ Carbon::parse($list->hari_ujian)->translatedFormat('d F Y') }}</td>
                    <td>{{ $list->idMapel->nmmapel }}</td>
                    <td>{{ $list->waktu_mulai }} - {{ $list->waktu_selesai }}</td>
                    <td>{{ $list->kelas_12 }}</td>
                    <td>{{ $list->kelas_13 }}</td>
                    <td>{{ $list->kelas_14 }}</td>
                    <td>{{ $list->kelas_15 }}</td>
                    <td>{{ $list->kelas_16 }}</td>
                    <td>{{ $list->kelas_7 }}</td>
                    <td>{{ $list->kelas_8 }}</td>
                    <td>{{ $list->kelas_9 }}</td>
                    <td>{{ $list->kelas_10 }}</td>
                    <td>{{ $list->kelas_11 }}</td>
                    <td>{{ $list->kelas_1 }}</td>
                    <td>{{ $list->kelas_2 }}</td>
                    <td>{{ $list->kelas_3 }}</td>
                    <td>{{ $list->kelas_4 }}</td>
                    <td>{{ $list->kelas_5 }}</td>
                    <td>{{ $list->kelas_6 }}</td>
                    <td>{{ $list->kelas_17 }}</td>
                    <td>{{ $list->kelas_18 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
