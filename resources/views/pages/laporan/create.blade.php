@extends('layouts.master')

@section('title','Form Tambah')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Form Tambah Laporan Kegiatan</h3>
    </div>
    <div class="card-body">
    <form action="{{ route('lapkegiatan.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <select class="form-control" name="pegawai_id">
                            <option>-Pilih Pegawai-</option>
                        @foreach ($pegawais as $pegawai)
                            <option value="{{$pegawai->id}}">{{$pegawai->nama}}</option>
                        @endforeach
                    </select>
                </div>

                 <div class="form-group">
                    <label>Kegiatan</label>
                    <select class="form-control" name="kegiatan_id">
                            <option>-Pilih Kegiatan-</option>
                        @foreach ($kegiatans as $kegiatan)
                            <option value="{{$kegiatan->id}}">{{$kegiatan->nama_kegiatan}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" required>
                </div>

                <div class="form-group">
                     <label>Foto</label>
                    <input type="file" class="form-control" name="foto" required>
                </div>

                <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" class="form-control" name="latitude" required>
                </div>

                <div class="form-group">
                    <label>logintude</label>
                    <input type="text" class="form-control" name="longitude" required>
                </div>

                 <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="draft">draft</option>
                        <option value="dikirim">dikirim</option>
                        <option value="disetujui">disetujui</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>


@endsection

@push('service')

@endpush
