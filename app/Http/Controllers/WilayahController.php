<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && in_array(auth()->user()->roles, ['pegawai', 'kepala'])) {
                abort(403, 'Unauthorized action.');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $wilayahs = DB::table('wilayahs')->orderBy('id', 'desc')->get();
        return view('pages.wilayah.index', compact('wilayahs'));
    }

    public function create()
    {
        return view('pages.wilayah.create');
    }

    public function store(Request $request)
    {
        Wilayah::create([
            'nama_wilayah' => $request->nama_wilayah
        ]);

        return redirect()->route('wilayah.index')->with('alert-primary','Data Berhasil ditambah');
    }

    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();
        return redirect()->route('wilayah.index')->with('alert-danger','Data Berhasil dihapus');
    }

    public function edit($id)
    {
        $wilayah = \App\Models\Wilayah::findOrFail($id);
        return view('pages.wilayah.edit', compact('wilayah'));
    }

    public function update(Request $request, $id)
    {
        DB::table('wilayahs')->where('id',$id)->update([
                'nama_wilayah' => $request->nama_wilayah
            ]);
        return redirect()->route('wilayah.index')->with('alert-primary', 'User successfully updated');
    }
}
