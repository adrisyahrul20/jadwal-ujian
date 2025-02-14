<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\JadwalUjianModel;
use App\Models\KelasModel;
use Illuminate\Http\Request;
use stdClass;

class LandingController extends Controller
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
        return view('guest')->with([
            'jadwal' => $jadwal,
            'kelas' => $kelas,
            'semua' => $semua,
            'kelasnow' => $kelasnow,
            'objFilter' => $objFilter,
        ]);
    }

    public function kelas(Request $request)
    {
        $kelasselected = $this->kelas->where('kdkls', $request->query('kelas'))->first();

        if (!$kelasselected) {
            return redirect()->route('home-page')->with(['error' => 'Kelas tidak ditemukan']);
        }

        $data = $this->table->where('idkelas', $kelasselected->id)->get();
        $kelas = $this->kelas->orderBy('kdkls', 'asc')->get();

        $objFilter = new stdClass;
        $objFilter->filter = 'kelas';
        $objFilter->value = $request->query('kelas');
        $kelasnow = $request->query('kelas');

        $semua = true;
        return view('guestkelas')->with([
            'data' => $data,
            'kelas' => $kelas,
            'semua' => $semua,
            'kelasnow' => $kelasnow,
            'objFilter' => $objFilter,
        ]);
    }

    public function guru(Request $request)
    {
        $data = $this->table->where('idguru', $request->query('guru'))->get();
        $kelas = $this->kelas->orderBy('kdkls', 'asc')->get();

        $objFilter = new stdClass;
        $objFilter->filter = 'guru';
        $objFilter->value = $request->query('guru');
        $kelasnow = "Guru";

        $semua = true;
        return view('guestkelas')->with([
            'data' => $data,
            'kelas' => $kelas,
            'semua' => $semua,
            'kelasnow' => $kelasnow,
            'objFilter' => $objFilter,
        ]);
    }
}
