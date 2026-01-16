@extends('layouts.master')

@section('title','Form Tambah')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Form Tambah Pegawai</h3>
    </div>
    <div class="card-body">
    <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama User</label>
                    <select class="form-control" name="user_id">
                            <option>-Pilih User-</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                 <div class="form-group">
                    <label>Wilayah</label>
                    <select class="form-control" name="wilayah_id">
                            <option>-Pilih Wilayah-</option>
                        @foreach ($wilayahs as $wilayah)
                            <option value="{{$wilayah->id}}">{{$wilayah->nama_wilayah}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>

                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" required>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" required>
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
