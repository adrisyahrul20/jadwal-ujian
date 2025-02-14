<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
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
            $pengawas1 = GuruModel::where('id', '<=', 11)->get();
            $pengawas2 = GuruModel::where('id', '>', 11)->where('id', '<=', 21)->get();
            $pengawas3 = GuruModel::where('id', '>', 21)->get();
            $idkelasList = JadwalUjianModel::distinct()->pluck('idkelas');
            $selectRaw = "hari_ujian, idmtpelajaran, waktu_mulai, waktu_selesai";
            foreach ($idkelasList as $idkelas) {
                $selectRaw .= ", MAX(CASE WHEN idkelas = $idkelas THEN idguru END) as kelas_$idkelas";
            }
            $jadwal = JadwalUjianModel::selectRaw($selectRaw)
                ->groupBy(['hari_ujian', 'idmtpelajaran', 'waktu_mulai', 'waktu_selesai'])
                ->orderBy('idmtpelajaran', 'asc')
                ->get();

            $pdf = Pdf::loadView('print', compact('jadwal','pengawas1','pengawas2','pengawas3'));
        }

        return $pdf->download('data-jadwal.pdf');
    }
}
