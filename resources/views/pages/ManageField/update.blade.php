@extends('layouts.master')

@section('title', 'Manage Field')

@section('content')

<div class="col-md-12">
  <form action="{{ route('field.update', $field->id) }}" method="POST" enctype="multipart/form-data">
                        
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="jenis">Jenis Lahan</label>
        <input type="text" name="jenis" class="form-control" placeholder="Masukkan Jenis Lahan" value="{{ $field->jenis }}">

        @error('jenis')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="desc">Deskripsi</label>
        <textarea name="desc" class="form-control" placeholder="Masukkan Deskripsi">{{ $field->desc }}</textarea>

        @error('desc')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div> 

    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
    <button type="reset" class="btn btn-md btn-warning">RESET</button>
</div>

@endsection