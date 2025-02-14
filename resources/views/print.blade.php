<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Ujian</title>
    <style>
        @page {
            size: A4 landscape;
            margin-top: 5mm;
            margin-left: 10mm;
            margin-right: 10mm;
        }

        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.border th,
        table.border td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h4, p {
            margin: 0;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .pull-right {
            float: right;
        }

        .pull-left {
            float: left;
        }

        .text-xs {
            font-size: 12px;
        }

        .text-sm {
            font-size: 14px;
        }

        .logo-img {
            width: 50px;
            height: auto;
        }

        .mb-4 {
            margin-bottom: 10px;
        }
        .mb-10 {
            margin-bottom: 70px;
        }
        
        .w-sper {
            width: 75%;
        }

        .align-top th, .align-top td {
            vertical-align: top;
        }
    </style>
    @php
        use Carbon\Carbon;

        Carbon::setLocale('id');
    @endphp
</head>

<body>
    <table class="mb-4">
        <tr>
            <td>
                <img src="{{ public_path('assets/img/logo.png') }}" alt="logo" class="logo-img pull-left" />
            </td>
            <td class="text-center">
                <h4>PEMERINTAH KABUPATEN DHARMASRAYA</h4>
                <h4>DINAS PENDIDIKAN</h4>
                <h4>UPT SMP NEGERI 2 PULAU PUNJUNG</h4>
                <span class="text-xs">Alamat: Jalan Raya Lama Sikabau. Kode Pos 27616</span>
            </td>
            <td>
                <img src="{{ public_path('assets/img/tutwurihandayani.png') }}" alt="logo"
                    class="logo-img pull-right" />
            </td>
        </tr>
    </table>
    <h4 class="text-center">JADWAL DAN PENGAWAS UJIAN</h4>
    <table class="border mb-4">
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
                    <td>{{ Carbon::parse($list->hari_ujian)->translatedFormat('l') }} /
                        {{ Carbon::parse($list->hari_ujian)->translatedFormat('d F Y') }}</td>
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

    <table class="mb-4 align-top">
        <tr>
            <td>
                <table class="border">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengawas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengawas1 as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
            <td>
                <table class="border">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengawas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengawas2 as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
            <td>
                <table class="border">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengawas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengawas3 as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="text-right text-sm">
                    <p><strong>Sikabau, {{ Carbon::now()->translatedFormat('d F Y') }}</strong></p>
                    <p class="mb-10"><strong>Kepala UPT SMPN 2 Pulau Punjung</strong></p>
                    <p><strong>SUNARDI, M.Pd</strong></p>
                    <p>NIP. 196505101987031007</p>
                </div>
            </td>
        </tr>
    </table>

</body>

</html>
