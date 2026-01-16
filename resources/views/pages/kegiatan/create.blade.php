@extends('layouts.master')

@section('title','Form Tambah')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Form Tambah Kegatan</h3>
    </div>
    <div class="card-body">
    <form action="{{ route('kegiatan.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <input type="text" class="form-control" name="nama_kegiatan" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Warna Kalender</label>
                    <input type="color" name="warna" class="form-control form-control-color">
                    <small class="text-muted">Digunakan pada kalender kegiatan</small>
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
