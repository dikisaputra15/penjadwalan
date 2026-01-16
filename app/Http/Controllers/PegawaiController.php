<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
     public function index(Request $request)
    {
        $pegawais = DB::table('pegawais')
            ->join('users', 'users.id', '=', 'pegawais.user_id')
            ->join('wilayahs', 'wilayahs.id', '=', 'pegawais.wilayah_id')
            ->select('pegawais.*', 'users.name', 'wilayahs.nama_wilayah')
            ->orderBy('pegawais.id', 'desc')
            ->get();
        return view('pages.pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        $users = DB::table('users')->get();
        $wilayahs = DB::table('wilayahs')->get();
        return view('pages.pegawai.create', compact('users','wilayahs'));
    }

    public function store(Request $request)
    {
        Pegawai::create([
            'user_id' => $request->user_id,
            'wilayah_id' => $request->wilayah_id,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan
        ]);

        return redirect()->route('pegawai.index')->with('alert-primary','Data Berhasil ditambah');
    }

     public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('alert-danger','Data Berhasil dihapus');
    }

    public function edit($id)
    {
        $pegawai = \App\Models\Pegawai::findOrFail($id);
        $users = DB::table('users')->get();
        $wilayahs = DB::table('wilayahs')->get();
        return view('pages.pegawai.edit', compact('pegawai','users','wilayahs'));
    }

     public function update(Request $request, $id)
    {
        DB::table('pegawais')->where('id',$id)->update([
                'user_id' => $request->user_id,
                'wilayah_id' => $request->wilayah_id,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan
            ]);
        return redirect()->route('pegawai.index')->with('alert-primary', 'User successfully updated');
    }
}
