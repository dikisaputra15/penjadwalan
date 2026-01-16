<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;
use App\Models\Jadwal;
use App\Models\LaporanKegiatan;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
         $user = Auth::user();

        // =====================
        // DASHBOARD PEGAWAI
        // =====================
        if ($user->roles === 'pegawai') {

            $pegawai = $user->pegawai;

            // Default value (jika pegawai belum punya data)
            $jadwalHariIni    = 0;
            $laporanBulanIni = 0;
            $events           = [];

            if ($pegawai) {

                // Hitung jadwal hari ini
                $jadwalHariIni = Jadwal::where('pegawai_id', $pegawai->id)
                    ->whereDate('tanggal', now())
                    ->count();

                // Hitung laporan bulan ini
                $laporanBulanIni = LaporanKegiatan::where('pegawai_id', $pegawai->id)
                    ->whereMonth('tanggal', now()->month)
                    ->whereYear('tanggal', now()->year)
                    ->count();

                // Data kalender kegiatan
                $events = Jadwal::where('pegawai_id', $pegawai->id)
                    ->with('kegiatan')
                    ->get()
                    ->map(function ($jadwal) {
                        return [
                            'title' => $jadwal->kegiatan->nama_kegiatan ?? 'Kegiatan',
                            'start' => $jadwal->tanggal,
                            'color' => $jadwal->kegiatan->warna ?? '#0d6efd',
                        ];
                    });
            }

            return view('pages.dashboardpegawai', compact(
                'jadwalHariIni',
                'laporanBulanIni',
                'events'
            ));
        }

        // =====================
        // DASHBOARD ADMIN / KOORDINATOR
        // =====================
        return view('pages.dashboard', [
            'totalPegawai'   => Pegawai::count(),
            'totalWilayah'   => Wilayah::count(),
            'totalJadwal'    => Jadwal::count(),
            'totalLaporan'   => LaporanKegiatan::count(),
            'laporanTerbaru' => LaporanKegiatan::latest()->take(5)->get()
        ]);
    }

}
