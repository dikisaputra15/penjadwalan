@extends('layouts.master')

@section('title','Pegawai')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Data Kegiatan</h3>
    </div>
    <div class="card-body">

    <div class="form-group">
        <a href="{{route('kegiatan.create')}}" class="btn btn-primary">Add New</a>
    </div>
    <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Warna</th>
                        <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($kegiatans as $kegiatan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$kegiatan->nama_kegiatan}}</td>
                        <td>
                            <span style="background:{{ $kegiatan->warna }}; padding:5px 15px; color:white">
                                {{ $kegiatan->warna }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">

                                <a href='{{ route('kegiatan.edit', $kegiatan->id) }}'
                                    class="btn btn-sm btn-info btn-icon">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST"
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
