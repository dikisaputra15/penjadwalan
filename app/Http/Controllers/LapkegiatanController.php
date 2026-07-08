<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Kegiatan;
use App\Models\LaporanKegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LapkegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $action = $request->route()->getActionMethod();
            if (auth()->check() && auth()->user()->roles === 'kepala') {
                if (in_array($action, ['create', 'store', 'edit', 'update', 'destroy'])) {
                    abort(403, 'Unauthorized action.');
                }
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $laps = DB::table('laporan_kegiatans')
            ->join('pegawais', 'pegawais.id', '=', 'laporan_kegiatans.pegawai_id')
            ->join('kegiatans', 'kegiatans.id', '=', 'laporan_kegiatans.kegiatan_id')
            ->select('laporan_kegiatans.*', 'pegawais.nama', 'kegiatans.nama_kegiatan')
            ->orderBy('laporan_kegiatans.id', 'desc')
            ->get();
        return view('pages.laporan.index', compact('laps'));
    }

     public function create()
    {
        $pegawais = DB::table('pegawais')->get();
        $kegiatans = DB::table('kegiatans')->get();
        return view('pages.laporan.create', compact('pegawais','kegiatans'));
    }

    public function store(Request $request)
    {
        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $num = hexdec(uniqid());
        $filename = $num.'.'.$extension;

        Storage::putFileAs('public/gambarkegiatan', $file, $filename);

        LaporanKegiatan::create([
            'pegawai_id' => $request->pegawai_id,
            'kegiatan_id' => $request->kegiatan_id,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => $request->status
        ]);

        return redirect()->route('lapkegiatan.index')->with('success', 'Produk successfully created');
    }

    public function destroy(LaporanKegiatan $lapkegiatan)
    {
        $lapkegiatan->delete();
        return redirect()->route('lapkegiatan.index')->with('alert-danger','Data Berhasil dihapus');
    }

    public function edit($id)
    {
        $lap = \App\Models\LaporanKegiatan::findOrFail($id);
        $pegawais = DB::table('pegawais')->get();
        $kegiatans = DB::table('kegiatans')->get();
        return view('pages.laporan.edit', compact('lap','pegawais','kegiatans'));
    }

    public function update(Request $request, $id)
    {
        $cekfile = $request->foto;
        $old_file = $request->old_file;
        $file = $request->file('foto');

        if($cekfile != ""){
            $filedel = Storage::url('gambarkegiatan/'. $old_file);

            if(File::exists($filedel)) {
                File::delete($filedel);
            }

            $extension = $file->getClientOriginalExtension();

            $num = hexdec(uniqid());

            $filename = $num.'.'.$extension;

            Storage::putFileAs('public/gambarkegiatan', $file, $filename);


            DB::table('laporan_kegiatans')->where('id',$id)->update([
                'pegawai_id' => $request->pegawai_id,
                'kegiatan_id' => $request->kegiatan_id,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'foto' => $filename,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'status' => $request->status
            ]);
        }else{
            DB::table('laporan_kegiatans')->where('id',$id)->update([
                'pegawai_id' => $request->pegawai_id,
                'kegiatan_id' => $request->kegiatan_id,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'status' => $request->status
            ]);
        }

        return redirect()->route('lapkegiatan.index')->with('success', 'Produk successfully updated');

    }

    public function setujui($id)
    {
        if (auth()->check() && auth()->user()->roles !== 'kepala') {
            abort(403, 'Unauthorized action.');
        }

        DB::table('laporan_kegiatans')->where('id', $id)->update([
            'status' => 'disetujui'
        ]);

        return redirect()->route('lapkegiatan.index')->with('alert-primary', 'Laporan berhasil disetujui');
    }
}
