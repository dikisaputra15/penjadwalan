@extends('layouts.master')

@section('title','Laporan')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Data Laporan Kegiatan</h3>
    </div>
    <div class="card-body">

    <div class="form-group">
        <a href="{{route('lapkegiatan.create')}}" class="btn btn-primary">Add New</a>
    </div>
    <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>No</th>
                        <th>Pegawai</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Status</th>
                        <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($laps as $lap)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$lap->nama}}</td>
                        <td>{{$lap->nama_kegiatan}}</td>
                        <td>{{$lap->tanggal}}</td>
                        <td>{{$lap->deskripsi}}</td>
                         <td><img src="{{ Storage::url('gambarkegiatan/'.$lap->foto) }}" style="width:60px; height:60px;"></td>
                        <td>{{$lap->latitude}}</td>
                        <td>{{$lap->longitude}}</td>
                        <td>{{$lap->status}}</td>
                        <td>
                            <div class="d-flex justify-content-center">

                                <a href='{{ route('lapkegiatan.edit', $lap->id) }}'
                                    class="btn btn-sm btn-info btn-icon">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                <form action="{{ route('lapkegiatan.destroy', $lap->id) }}" method="POST"
                                    class="ml-2">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="_token"
                                        value="{{ csrf_token() }}" />
                                    <button class="btn btn-sm btn-danger btn-icon confirm-delete" onclick="return confirm('Are you sure to delete this ?');">
                                        <i class="fas fa-times"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                  </tbody>
    </table>
    </div>
</div>


@endsection

@push('service')
<script>
  $(function () {
    $("#example").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush
