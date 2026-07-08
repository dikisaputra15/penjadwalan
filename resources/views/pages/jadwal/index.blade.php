@extends('layouts.master')

@section('title','Jadwal')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Data Jadwal</h3>
    </div>
    <div class="card-body">

    @if(auth()->check() && auth()->user()->roles !== 'pegawai')
    <div class="form-group">
        <a href="{{route('jadwal.create')}}" class="btn btn-primary">Add New</a>
    </div>
    @endif
    <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>No</th>
                        <th>Pegawai</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                        @if(auth()->check() && auth()->user()->roles !== 'pegawai')
                        <th>Action</th>
                        @endif
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($jadwals as $jadwal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$jadwal->nama}}</td>
                        <td>{{$jadwal->nama_kegiatan}}</td>
                        <td>{{$jadwal->tanggal}}</td>
                        <td>{{$jadwal->lokasi}}</td>
                        <td>{{$jadwal->keterangan}}</td>
                        @if(auth()->check() && auth()->user()->roles !== 'pegawai')
                        <td>
                            <div class="d-flex justify-content-center">

                                <a href='{{ route('jadwal.edit', $jadwal->id) }}'
                                    class="btn btn-sm btn-info btn-icon">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST"
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
                        @endif
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
