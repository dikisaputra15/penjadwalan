@extends('layouts.master')

@section('title','Form Edit')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Form Edit Laporan Kegiatan</h3>
    </div>
    <div class="card-body">
    <form action="{{ route('lapkegiatan.update', $lap->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pegawai</label>
                            <select class="form-control" name="pegawai_id">
                                    <?php
                                        foreach ($pegawais as $pegawai) {

                                        if ($pegawai->id==$lap->pegawai_id) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $pegawai->id;?>"><?php echo $pegawai->nama; ?></option>

                                     <?php } ?>

                            </select>
                </div>

                 <div class="form-group">
                    <label>Kegiatan</label>
                        <select class="form-control" name="kegiatan_id">
                                    <?php
                                        foreach ($kegiatans as $kegiatan) {

                                        if ($kegiatan->id==$lap->kegiatan_id) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $kegiatan->id;?>"><?php echo $kegiatan->nama_kegiatan; ?></option>

                                     <?php } ?>

                                </select>
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" value="{{ $lap->tanggal }}">
                </div>

                 <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" value="{{ $lap->deskripsi }}">
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="foto">
                    <input type="text" class="form-control" name="old_file" value="{{ $lap->foto }}" hidden>
                </div>

                <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" class="form-control" name="latitude" value="{{ $lap->latitude }}">
                </div>

                <div class="form-group">
                    <label>Longitude</label>
                    <input type="text" class="form-control" name="longitude" value="{{ $lap->longitude }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="draft"
                            {{ old('status', $lap->status) == 'draft' ? 'selected' : '' }}>
                            draft
                        </option>

                        <option value="dikirim"
                            {{ old('status', $lap->status) == 'dikirim' ? 'selected' : '' }}>
                            dikirim
                        </option>

                        <option value="disetujui"
                            {{ old('status', $lap->status) == 'disetujui' ? 'selected' : '' }}>
                            disetujui
                        </option>
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
