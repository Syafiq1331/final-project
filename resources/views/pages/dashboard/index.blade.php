@extends('layouts.master')

@section('title', 'Manage Field')

@section('content')

    <div class="col-md-12">
        <div class="row">
            @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{ $user->count() }}
                            </h3>

                            <p>List User</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <a href="/manage/user" class="py-2 mt-3 small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                {{ $field->count() }}
                            </h3>

                            <p>List Field</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-map"></i>
                        </div>
                        <a href="/manage/field" class="py-2 mt-3 small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endif
        </div>

    @endsection
