@extends('layouts.main')
@section('title', 'Peminjaman - MyPeminjaman')
@section('peminjaman', 'active')

{{-- @section('css_custom')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection --}}

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('peminjaman.index') }}">Peminjaman</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('peminjaman.create') }}">Add</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Peminjaman</h4>
                            <div class="basic-form">
                                <form id="searchAndSaveForm" action="{{ route('peminjaman.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Tanggal Awal</label>
                                            <input type="date" name="tgl_awal" id="tgl_awal"
                                                class="form-control @error('tgl_awal') is-invalid @enderror"
                                                value="{{ old('tgl_awal') }}" placeholder="tgl_awal">
                                            @error('tgl_awal')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Tanggal Akhir</label>
                                            <input type="date" name="tgl_akhir" id="tgl_akhir"
                                                class="form-control @error('tgl_akhir') is-invalid @enderror"
                                                value="{{ old('tgl_akhir') }}" placeholder="tgl_akhir">
                                            @error('tgl_akhir')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="mobilDropdown" style="display: none;">
                                        <label for="mobilSelect">Pilih Mobil:</label>
                                        <select name="mobil_id" id="mobilSelect" class="form-control">
                                            <!-- Opsi mobil akan dimuat disini -->
                                        </select>
                                        @error('mobil_id')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <br>
                                    {{-- <button type="button" class="btn btn-primary" id="searchBtn">Cari</button> --}}
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

@section('js_custom')
<script>
    $(document).ready(function () {
        $('#tgl_awal, #tgl_akhir').change(function (e) {

            var tgl_awal = $('#tgl_awal').val();
            var tgl_akhir = $('#tgl_akhir').val();

            console.log(tgl_awal);
            console.log(tgl_akhir);

            $.ajax({
                type: "GET",
                url: "/peminjaman/find/" + tgl_awal + "/" + tgl_akhir,
                success: function (response) {
                    console.log(response);
                    $('#mobilDropdown').show();
                    $('#mobilSelect').empty();
                    $.each(response, function (key, value) {
                        console.log("key: " + key);
                        console.log("value: " + value);
                        $('#mobilSelect').append('<option value="' + value.value + '">' + value.label + '</option>');
                    });
                    $('#saveBtn').show();
                }
            });
        });
    });
</script>
@endsection
