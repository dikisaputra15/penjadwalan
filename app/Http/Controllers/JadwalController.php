<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $action = $request->route()->getActionMethod();
            if (auth()->check() && in_array(auth()->user()->roles, ['pegawai', 'kepala'])) {
                if (in_array($action, ['create', 'store', 'edit', 'update', 'destroy'])) {
                    abort(403, 'Unauthorized action.');
                }
            }
            return $next($request);
        });
    }

     public function index(Request $request)
    {
      $query = DB::table('jadwals')
            ->join('pegawais', 'pegawais.id', '=', 'jadwals.pegawai_id')
            ->join('users', 'users.id', '=', 'pegawais.user_id')
            ->join('kegiatans', 'kegiatans.id', '=', 'jadwals.kegiatan_id')
            ->select('jadwals.*', 'users.name as nama', 'kegiatans.nama_kegiatan')
            ->orderBy('jadwals.id', 'desc');

        if (auth()->user()->roles !== 'admin') {
            $query->where('pegawais.user_id', auth()->id());
        }

        $jadwals = $query->get();
        return view('pages.jadwal.index', compact('jadwals'));
    }

      public function create()
    {
        $users = DB::table('users')->where('roles', 'pegawai')->get();
        $kegiatans = DB::table('kegiatans')->get();
        return view('pages.jadwal.create', compact('users','kegiatans'));
    }

    public function store(Request $request)
    {
        $pegawai = \App\Models\Pegawai::where('user_id', $request->user_id)->first();
        if (!$pegawai) {
            return redirect()->route('pegawai.create')->with('alert-danger', 'Error: Pegawai untuk user ini belum terdaftar. Silakan buat data Pegawai terlebih dahulu.');
        }

        Jadwal::create([
            'pegawai_id' => $pegawai->id,
            'kegiatan_id' => $request->kegiatan_id,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('jadwal.index')->with('alert-primary','Data Berhasil ditambah');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('alert-danger','Data Berhasil dihapus');
    }

    public function edit($id)
    {
        $jadwal = \App\Models\Jadwal::findOrFail($id);
        $kegiatans = DB::table('kegiatans')->get();
        $users = DB::table('users')->where('roles', 'pegawai')->get();
        return view('pages.jadwal.edit', compact('kegiatans','users','jadwal'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = \App\Models\Pegawai::where('user_id', $request->user_id)->first();
        if (!$pegawai) {
            return redirect()->route('pegawai.create')->with('alert-danger', 'Error: Pegawai untuk user ini belum terdaftar. Silakan buat data Pegawai terlebih dahulu.');
        }

        DB::table('jadwals')->where('id',$id)->update([
                'pegawai_id' => $pegawai->id,
                'kegiatan_id' => $request->kegiatan_id,
                'tanggal' => $request->tanggal,
                'lokasi' => $request->lokasi,
                'keterangan' => $request->keterangan
            ]);
        return redirect()->route('jadwal.index')->with('alert-primary', 'User successfully updated');
    }
}
