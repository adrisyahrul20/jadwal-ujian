<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalUjianModel;
use App\Models\KelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class DashboardController extends Controller
{
    protected $table;
    protected $kelas;

    public function __construct(JadwalUjianModel $table, KelasModel $kelas)
    {
        $this->table = $table;
        $this->kelas = $kelas;
    }

    public function index()
    {
        if(Auth::user()->role === 'siswa') {
            return redirect()->route('admin.dashboard.kelas', ['kelas' => Auth::user()->idkelas])->with(['error' => 'Kamu tidak ada hak untuk akses halaman ini!']);
        }
        
        $semua = false;
        $objFilter = null;

        $idkelasList = $this->table->distinct()->pluck('idkelas');

        $selectRaw = "hari_ujian, idmtpelajaran, waktu_mulai, waktu_selesai";

        foreach ($idkelasList as $idkelas) {
            $selectRaw .= ", MAX(CASE WHEN idkelas = $idkelas THEN idguru END) as kelas_$idkelas";
        }

        $jadwal = $this->table
            ->selectRaw($selectRaw)
            ->groupBy(['hari_ujian', 'idmtpelajaran', 'waktu_mulai', 'waktu_selesai'])
            ->orderBy('idmtpelajaran', 'asc')
            ->get();

        $kelas = $this->kelas->orderBy('id', 'asc')->get();
        $kelasnow = 'Semua';

        return view('administrator.dashboard.index')->with([
            'kelas' => $kelas,
            'objFilter' => $objFilter,
            'semua' => $semua,
            'kelasnow' => $kelasnow,
            'jadwal' => $jadwal,
        ]);
    }


    public function kelas(Request $request)
    {
        $data = $this->table->where('idkelas', $request->query('kelas'))->orderBy('idmtpelajaran', 'asc')->get();
        $kelas = $this->kelas->orderBy('kdkls', 'asc')->get();
        $objFilter = new stdClass;
        $objFilter->filter = 'kelas';
        $objFilter->value = $request->query('kelas');
        $kelasnow = $this->kelas->find($request->query('kelas'))->kdkls;
        $semua = true;
        return view('administrator.dashboard.kelas')->with([
            'data' => $data,
            'kelas' => $kelas,
            'objFilter' => $objFilter,
            'semua' => $semua,
            'kelasnow' => $kelasnow,
        ]);
    }

    public function guru(Request $request)
    {
        $kelasnow = "Guru";
        $data = $this->table->where('idguru', $request->query('guru'))->orderBy('idmtpelajaran', 'asc')->get();
        $kelas = $this->kelas->orderBy('kdkls', 'asc')->get();
        $objFilter = new stdClass;
        $objFilter->filter = 'guru';
        $objFilter->value = $request->query('guru');

        $semua = true;
        return view('administrator.dashboard.kelas')->with([
            'data' => $data,
            'kelas' => $kelas,
            'objFilter' => $objFilter,
            'semua' => $semua,
            'kelasnow' => $kelasnow,
        ]);
    }
}
