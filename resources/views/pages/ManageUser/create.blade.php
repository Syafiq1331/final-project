@extends('layouts.master')

@section('title', 'Manage Field')

@section('content')

<div class="col-md-12">
  <form action="{{ route('field.store') }}" method="POST" enctype="multipart/form-data">
                        
    @csrf

    <div class="form-group">
        <label for="jenis">Jenis Lahan</label>
        <input type="text" name="jenis" class="form-control" placeholder="Masukkan Jenis Lahan">

        @error('jenis')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="desc">Deskripsi</label>
        <textarea name="desc" class="form-control" placeholder="Masukkan Deskripsi"></textarea>

        @error('desc')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div> 

    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
    <button type="reset" class="btn btn-md btn-warning">RESET</button>

</form> 
</div>

@endsection