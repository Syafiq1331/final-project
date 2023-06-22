@extends('layouts.master')

@section('title', 'Manage Field')

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Field list Table</h3>
    </div>
    @if(session('success'))
      <div id="success-message" class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body table-responsive">
      <a href="{{ route('field.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
      <table class="table table-bordered border-top">
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis Lahan</th>
            <th>Deskripsi</th>
            <th colspan="2" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @if(count($fields) > 0)
  @foreach($fields as $field)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $field->jenis }}</td>
      <td>{{ $field->desc }}</td>
      <td class="text-center">
        <a href="{{ route('field.edit', $field->id) }}" class="btn btn-warning">Edit</a>
      </td>
      <td class="text-center">
        <form action="{{ route('field.destroy', $field->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </td>
    </tr>
  @endforeach
@else
  <tr>
    <td colspan="5" class="text-center">Tidak ada data</td>
  </tr>
@endif

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
      </ul>
    </div>
  </div>
</div>

@endsection