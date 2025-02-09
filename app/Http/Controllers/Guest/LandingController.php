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
        $data = $this->table->get();
        $kelas = $this->kelas->orderBy('kdkls', 'asc')->get();
        $objFilter = null;
        $semua = false;
        return view('guest')->with([
            'data' => $data,
            'kelas' => $kelas,
            'semua' => $semua,
            'objFilter' => $objFilter,
        ]);
    }

    public function kelas(Request $request)
    {
        $data = $this->table->where('idkelas', $request->query('kelas'))->get();
        $kelas = $this->kelas->orderBy('kdkls', 'asc')->get();

        $objFilter = new stdClass;
        $objFilter->filter = 'kelas';
        $objFilter->value = $request->query('kelas');

        $semua = true;
        return view('guest')->with([
            'data' => $data,
            'kelas' => $kelas,
            'semua' => $semua,
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

        $semua = true;
        return view('guest')->with([
            'data' => $data,
            'kelas' => $kelas,
            'semua' => $semua,
            'objFilter' => $objFilter,
        ]);
    }
}
