@extends('layouts.master')

@section('title','Wilayah')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Form Edit Wilayahr</h3>
    </div>
    <div class="card-body">
    <form action="{{ route('wilayah.update', $wilayah->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Wilayah</label>
                    <input type="text" class="form-control" name="nama_wilayah" value="{{ $wilayah->nama_wilayah }}">
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
