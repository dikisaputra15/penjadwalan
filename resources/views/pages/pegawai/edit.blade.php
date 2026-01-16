@extends('layouts.master')

@section('title','Form Edit')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Form Edit Pegawai</h3>
    </div>
    <div class="card-body">
    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama User</label>
                            <select class="form-control" name="user_id">
                                    <?php
                                        foreach ($users as $user) {

                                        if ($user->id==$pegawai->user_id) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $user->id;?>"><?php echo $user->name; ?></option>

                                     <?php } ?>

                            </select>
                </div>

                 <div class="form-group">
                    <label>Wilayah</label>
                        <select class="form-control" name="wilayah_id">
                                    <?php
                                        foreach ($wilayahs as $wilayah) {

                                        if ($wilayah->id==$pegawai->wilayah_id) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $wilayah->id;?>"><?php echo $wilayah->nama_wilayah; ?></option>

                                     <?php } ?>

                                </select>
                </div>

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama" value="{{ $pegawai->nama }}">
                </div>

                 <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" value="{{ $pegawai->nip }}">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="{{ $pegawai->jabatan }}">
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
