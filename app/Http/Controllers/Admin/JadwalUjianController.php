<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ErrorHandler;
use App\Helper\FormatResponse;
use App\Http\Controllers\Controller;
use App\Models\GuruModel;
use App\Models\JadwalUjianModel;
use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class JadwalUjianController extends Controller
{
    protected $table;
    protected $mapel;
    protected $kelas;
    protected $guru;

    public function __construct(JadwalUjianModel $table, MataPelajaranModel $mapel, KelasModel $kelas, GuruModel $gurus)
    {
        $this->table = $table;
        $this->mapel = $mapel;
        $this->kelas = $kelas;
        $this->guru = $gurus;
    }

    public function index()
    {
        $dataMapel = $this->mapel->select('id', 'nmmapel')->get();
        $dataKelas = $this->kelas->select('id', 'kdkls')->get();
        $dataGuru = $this->guru->select('id', 'nama')->get();
        return view('administrator.jadwalujian.index')->with([
            'dataMapel' => $dataMapel,
            'dataKelas' => $dataKelas,
            'dataGuru' => $dataGuru
        ]);
    }

    public function datatable()
    {
        Carbon::setLocale('id');
        return DataTables::of($this->table->orderBy('id', 'desc')->select([
            'id',
            'idmtpelajaran',
            'hari_ujian',
            'waktu_mulai',
            'waktu_selesai',
            'idkelas',
            'idguru',
        ]))
            ->addIndexColumn()
            ->addColumn('jadwal', function ($row) {
                return Carbon::parse($row->hari_ujian)->translatedFormat('d F Y');
            })
            ->addColumn('mapel', function ($row) {
                return $row->idMapel->nmmapel ?? 'Mata Pelajaran Tidak Ada';
            })
            ->addColumn('kelas', function ($row) {
                return $row->idKelas->kdkls ?? 'Kelas Tidak Ada';
            })
            ->addColumn('namaGuru', function ($row) {
                return $row->idGuru->nama ?? 'Guru Tidak Ada';
            })
            ->addColumn('action', function ($row) {
                return '
                <div class="flex justify-center gap-3">
                    <button type="button" class="text-blue-500 text-2xl" data-mode="edit" data-id="' . $row->id . '">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="text-red-500 text-2xl" data-mode="destroy" data-id="' . $row->id . '">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div>';
            })
            ->rawColumns(['fotoCast', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'idmtpelajaran' => 'required',
                'hari_ujian' => 'required',
                'waktu_mulai' => 'required',
                'waktu_selesai' => 'required',
                'idkelas' => 'required',
                'idguru' => 'required',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            // Cek apakah ada jadwal yang bertabrakan
            $jadwalBertabrakan = $this->table
                ->where('idguru', $request->idguru)
                ->where('hari_ujian', $request->hari_ujian)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('waktu_mulai', [$request->waktu_mulai, $request->waktu_selesai])
                        ->orWhereBetween('waktu_selesai', [$request->waktu_mulai, $request->waktu_selesai])
                        ->orWhere(function ($q) use ($request) {
                            $q->where('waktu_mulai', '<=', $request->waktu_mulai)
                                ->where('waktu_selesai', '>=', $request->waktu_selesai);
                        });
                })
                ->exists();

            $mapelBertabrakan = $this->table
                ->where('idmtpelajaran', $request->idmtpelajaran)
                ->first();

            if ($jadwalBertabrakan) {
                return FormatResponse::send(false, null, "Gagal! Jadwal ujian untuk guru ini bertabrakan.", 400);
            }
            if ($mapelBertabrakan->hari_ujian !== $request->hari_ujian) {
                return FormatResponse::send(false, null, "Gagal! Jadwal ujian untuk mata pelajaran ini sudah didaftarkan pada tgl ". Carbon::parse($mapelBertabrakan->hari_ujian)->translatedFormat('d F Y'), 400);
            }

            // Simpan data baru
            $store = new $this->table;
            $store->idmtpelajaran = $request->idmtpelajaran;
            $store->hari_ujian = $request->hari_ujian;
            $store->waktu_mulai = $request->waktu_mulai;
            $store->waktu_selesai = $request->waktu_selesai;
            $store->idkelas = $request->idkelas;
            $store->idguru = $request->idguru;
            $store->save();

            return FormatResponse::send(true, null, "Tambah data berhasil!", 200);
        } catch (\Throwable $th) {
            return ErrorHandler::record($th, 'response');
        }
    }


    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'idmtpelajaran' => 'required',
                'hari_ujian' => 'required',
                'waktu_mulai' => 'required',
                'waktu_selesai' => 'required',
                'idkelas' => 'required',
                'idguru' => 'required',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $store = $this->table->find($request->id);
            $store->idmtpelajaran = $request->idmtpelajaran;
            $store->hari_ujian = $request->hari_ujian;
            $store->waktu_mulai = $request->waktu_mulai;
            $store->waktu_selesai = $request->waktu_selesai;
            $store->idkelas = $request->idkelas;
            $store->idguru = $request->idguru;
            $store->save();

            return FormatResponse::send(true, null, "Ubah data berhasil!", 200);
        } catch (\Throwable $th) {
            return ErrorHandler::record($th, 'response');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $destroy = $this->table->findOrFail($request->id);
            $destroy->delete();

            return FormatResponse::send(true, $destroy, "Hapus data berhasil!", 200);
        } catch (\Throwable $th) {
            return ErrorHandler::record($th, 'response');
        }
    }
}
