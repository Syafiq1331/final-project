@extends('layouts.master')

@section('title', 'Manage Field')

@section('content')

    <div class="col-md-12">
        <form action="{{ route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group col-lg-6 col-12">
                    <label for="name">Nama pengguna</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama user"
                        value="{{ $data->name }}">

                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-lg-6 col-12">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Masukkan email"
                        value="{{ $data->email }}">

                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6 col-12">
                    <label>Role</label>
                    <select class="form-control" name="role" value="{{ $data->role }}">
                        <option>Admin</option>
                        <option>User</option>
                    </select>

                    @error('role')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-lg-6 col-12">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Masukkan password"
                        value="{{ $data->password }}">

                    @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="farm_place_id">Farm Place</label>
                <select name="farm_place_id" class="form-control" value="{{ $data->farm_place_id }}">
                    @foreach ($dataFarmPlace as $farmPlace)
                        <option value="{{ $farmPlace->id }}">{{ $farmPlace->name }}</option>
                        <!-- Ganti "id" dan "nama_field" dengan atribut yang sesuai dengan model Anda -->
                    @endforeach
                </select>

                @error('farm_place_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            <button type="reset" class="btn btn-md btn-warning">RESET</button>
    </div>

@endsection
