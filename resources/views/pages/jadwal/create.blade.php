@extends('layouts.master')

@section('title','Form Jadwal')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Form Tambah Jadwal</h3>
    </div>
    <div class="card-body">
    <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <select class="form-control" name="user_id">
                            <option>-Pilih Pegawai-</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                 <div class="form-group">
                    <label>Kegiatan</label>
                    <select class="form-control" name="kegiatan_id">
                            <option>-Pilih kegiatan-</option>
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
                    <label>Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" required>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" required>
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
