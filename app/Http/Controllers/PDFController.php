<?php

namespace App\Http\Controllers;

use App\Models\JadwalUjianModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function exportPDF(Request $request)
    {
        $filter = $request->query('filter');
        $value = $request->query('value');
        if ($filter === 'kelas') {
            $dataJadwal = JadwalUjianModel::where('idkelas', $value)->orderBy('hari_ujian', 'asc')->get();
            $pdf = Pdf::loadView('jadwalprint', compact('dataJadwal'));
        } elseif ($filter === 'guru') {
            $dataJadwal = JadwalUjianModel::where('idguru', $value)->orderBy('hari_ujian', 'asc')->get();
            $pdf = Pdf::loadView('jadwalprint', compact('dataJadwal'));
        } else {
            $idkelasList = JadwalUjianModel::distinct()->pluck('idkelas');

            $selectRaw = "hari_ujian, idmtpelajaran, waktu_mulai, waktu_selesai";

            foreach ($idkelasList as $idkelas) {
                $selectRaw .= ", MAX(CASE WHEN idkelas = $idkelas THEN idguru END) as kelas_$idkelas";
            }

            $jadwal = JadwalUjianModel::selectRaw($selectRaw)
                ->groupBy(['hari_ujian', 'idmtpelajaran', 'waktu_mulai', 'waktu_selesai'])
                ->orderBy('idmtpelajaran', 'asc')
                ->get();

            $pdf = Pdf::loadView('print', compact('jadwal'));
        }

        return $pdf->download('data-jadwal.pdf');
    }
}
