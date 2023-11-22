@extends('layouts.main')
@section('title', 'Mobil - MyMobil')
@section('mobil', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('mobil.index') }}">Mobil</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('mobil.create') }}">Add</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Mobil</h4>
                            <div class="basic-form">
                                <form action="{{ route('mobil.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Merek</label>
                                            <input type="text" name="merek" id="merek"
                                                class="form-control @error('merek') is-invalid @enderror"
                                                value="{{ old('merek') }}" placeholder="merek">
                                            @error('merek')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Model</label>
                                            <input type="text" name="model" id="model"
                                                class="form-control @error('model') is-invalid @enderror"
                                                value="{{ old('model') }}" placeholder="model">
                                            @error('model')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>No Plat</label>
                                            <input type="text" name="nomor_plat" id="nomor_plat"
                                                class="form-control @error('nomor_plat') is-invalid @enderror"
                                                value="{{ old('nomor_plat') }}" placeholder="nomor_plat">
                                            @error('nomor_plat')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Tarif Harian</label>
                                            <input type="number" name="tarif_harian" id="tarif_harian"
                                                class="form-control @error('tarif_harian') is-invalid @enderror"
                                                value="{{ old('tarif_harian') }}" placeholder="tarif_harian">
                                            @error('tarif_harian')
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
