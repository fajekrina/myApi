@extends('layouts.main')
@section('title', 'Unit - MyUnit')
@section('unit', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('unit.index') }}">Unit</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('unit.create') }}">Add</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Unit</h4>
                            <div class="basic-form">
                                <form action="{{ route('unit.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" placeholder="name">
                                            @error('name')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Slug</label>
                                            <textarea name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror">{{ old('slug') }}</textarea>
                                            @error('slug')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
