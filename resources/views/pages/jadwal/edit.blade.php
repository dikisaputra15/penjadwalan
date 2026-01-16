@extends('layouts.master')

@section('title','Form Edit')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Form Edit Jadwal</h3>
    </div>
    <div class="card-body">
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pegawai</label>
                            <select class="form-control" name="pegawai_id">
                                    <?php
                                        foreach ($pegawais as $pegawai) {

                                        if ($pegawai->id==$jadwal->pegawai_id) {
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

                                        if ($kegiatan->id==$jadwal->kegiatan_id) {
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
                    <input type="text" class="form-control" name="tanggal" value="{{ $jadwal->tanggal }}">
                </div>

                 <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" value="{{ $jadwal->lokasi }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="{{ $jadwal->keterangan }}">
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
