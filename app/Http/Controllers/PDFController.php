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
        if($filter === 'kelas') {
            $dataJadwal = JadwalUjianModel::where('idkelas', $value)->get();
        } else {
            $dataJadwal = JadwalUjianModel::where('idguru', $value)->get();
        }
        $pdf = Pdf::loadView('jadwalprint', compact('dataJadwal'));

        return $pdf->download('data-jadwal.pdf');
    }
}
