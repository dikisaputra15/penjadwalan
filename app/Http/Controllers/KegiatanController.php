<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
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

    public function index()
    {
        $kegiatans = Kegiatan::latest()->get();
        return view('pages.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('pages.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'warna' => 'nullable|string|max:20',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('alert-danger','Data Berhasil dihapus');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('pages.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'warna' => 'nullable|string|max:20',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
    }
}
