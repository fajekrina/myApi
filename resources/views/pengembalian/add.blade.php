@extends('layouts.main')
@section('title', 'Pengembalian - MyPengembalian')
@section('pengembalian', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pengembalian.index') }}">Pengembalian</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pengembalian.create') }}">Add</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Pengembalian</h4>
                            <div class="basic-form">
                                <form action="{{ route('pengembalian.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="mobil_id">Mobil</label>
                                            <select class="form-control @error('mobil_id') is-invalid @enderror"
                                                id="mobil_id" name="mobil_id" required>
                                                <option value=""> Pilih Mobil </option>
                                                @foreach ($peminjamans as $item)
                                                    <option value="{{ $item->mobil_id }}">
                                                        {{ $item->model }} - {{ $item->nomor_plat }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('mobil_id')
                                                <span class="invalid-feedback" role="alert">
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
