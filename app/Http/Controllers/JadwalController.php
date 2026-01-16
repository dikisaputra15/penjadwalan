<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
     public function index(Request $request)
    {
      $jadwals = DB::table('jadwals')
            ->join('pegawais', 'pegawais.id', '=', 'jadwals.pegawai_id')
            ->join('kegiatans', 'kegiatans.id', '=', 'jadwals.kegiatan_id')
            ->select('jadwals.*', 'pegawais.nama', 'kegiatans.nama_kegiatan')
            ->orderBy('jadwals.id', 'desc')
            ->get();
        return view('pages.jadwal.index', compact('jadwals'));
    }

      public function create()
    {
        $pegawais = DB::table('pegawais')->get();
        $kegiatans = DB::table('kegiatans')->get();
        return view('pages.jadwal.create', compact('pegawais','kegiatans'));
    }

    public function store(Request $request)
    {
        Jadwal::create([
            'pegawai_id' => $request->pegawai_id,
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
        $pegawais = DB::table('pegawais')->get();
        return view('pages.jadwal.edit', compact('kegiatans','pegawais','jadwal'));
    }

    public function update(Request $request, $id)
    {
        DB::table('jadwals')->where('id',$id)->update([
                'pegawai_id' => $request->pegawai_id,
                'kegiatan_id' => $request->kegiatan_id,
                'tanggal' => $request->tanggal,
                'lokasi' => $request->lokasi,
                'keterangan' => $request->keterangan
            ]);
        return redirect()->route('jadwal.index')->with('alert-primary', 'User successfully updated');
    }
}
