@extends('layouts.master')

@section('title','Dashboard')

@section('conten')

<div class="card shadow-sm mb-4 border-0">
    <div class="card-body text-center bg-primary text-white rounded">
        <h3 class="fw-bold mb-1">Selamat Datang</h3>
        <p class="mb-0">Dashboard Sistem Penjadwalan Pegawai PKB</p>
    </div>
</div>

<h5 class="mb-3 fw-semibold">Dashboard Pegawai / Anggota</h5>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="card border-primary">
            <div class="card-body">
                <h6>Jadwal Hari Ini</h6>
                <h2>{{ $jadwalHariIni }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-success">
            <div class="card-body">
                <h6>Laporan Bulan Ini</h6>
                <h2>{{ $laporanBulanIni }}</h2>
            </div>
        </div>
    </div>
</div>

<hr>

<h4 class="mb-3">📅 Kalender Kegiatan Saya</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>

@endsection

@push('service')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'id',
        height: 650,
        events: @json($events),
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        }
    });

    calendar.render();
});
</script>
@endpush
