@extends('layouts.master')

@section('title','Form Edit')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Form Edit Kegatan</h3>
    </div>
    <div class="card-body">
    <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
    @csrf
    @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <input type="text" class="form-control" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}">
                </div>

                <div class="form-group">
                    <input type="color" name="warna" class="form-control form-control-color" value="{{ $kegiatan->warna }}">
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
