@extends('layouts.master')

@section('title','Dashboard')

@section('conten')

{{-- Welcome Header --}}
<div class="card shadow-sm mb-4 border-0">
    <div class="card-body text-center bg-primary text-white rounded">
        <h3 class="fw-bold mb-1">Selamat Datang</h3>
        <p class="mb-0">Dashboard Sistem Penjadwalan Pegawai PKB</p>
    </div>
</div>

{{-- Statistik --}}
<h5 class="mb-3 fw-semibold">Dashboard Admin / Koordinator</h5>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 bg-primary text-white rounded-circle p-3">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <small class="text-muted">Total Pegawai</small>
                    <h4 class="mb-0">{{ $totalPegawai }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 bg-success text-white rounded-circle p-3">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div>
                    <small class="text-muted">Total Wilayah</small>
                    <h4 class="mb-0">{{ $totalWilayah }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 bg-warning text-white rounded-circle p-3">
                    <i class="bi bi-calendar-event-fill"></i>
                </div>
                <div>
                    <small class="text-muted">Total Jadwal</small>
                    <h4 class="mb-0">{{ $totalJadwal }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 bg-danger text-white rounded-circle p-3">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <div>
                    <small class="text-muted">Total Laporan</small>
                    <h4 class="mb-0">{{ $totalLaporan }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Laporan Terbaru --}}
<div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-semibold">
        Laporan Kegiatan Terbaru
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Pegawai</th>
                    <th>Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporanTerbaru as $lap)
                <tr>
                    <td>{{ $lap->pegawai->nama }}</td>
                    <td>{{ $lap->kegiatan->nama_kegiatan }}</td>
                    <td>{{ \Carbon\Carbon::parse($lap->tanggal)->format('d M Y') }}</td>
                    <td>
                        <span class="badge
                            @if($lap->status == 'draft') bg-secondary
                            @elseif($lap->status == 'dikirim') bg-warning
                            @else bg-success
                            @endif">
                            {{ ucfirst($lap->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        Belum ada laporan kegiatan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
