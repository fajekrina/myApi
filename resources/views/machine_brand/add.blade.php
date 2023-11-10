@extends('layouts.main')
@section('title', 'Machine - MyMachines')
@section('machine', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine_brand.index') }}">Machine Brand</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine_brand.create') }}">Add</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Machine Brand</h4>
                            <div class="basic-form">
                                <form action="{{ route('machine_brand.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name"
                                          name="brand_name" value="{{ old('brand_name') }}" required>
                                        @error('brand_name')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="country_of_origin">Country of Origin</label>
                                          <input type="text" class="form-control @error('country_of_origin') is-invalid @enderror" id="country_of_origin"
                                            name="country_of_origin" value="{{ old('country_of_origin') }}" required>
                                          @error('country_of_origin')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="contact_information_email">Contact Information Email</label>
                                          <input type="text" class="form-control @error('contact_information_email') is-invalid @enderror" id="contact_information_email"
                                            name="contact_information_email" value="{{ old('contact_information_email') }}">
                                          @error('contact_information_email')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="contact_information_phone">Contact Information Phone Number</label>
                                          <input type="text" class="form-control @error('contact_information_phone') is-invalid @enderror" id="contact_information_phone"
                                            name="contact_information_phone" value="{{ old('contact_information_phone') }}">
                                          @error('contact_information_phone')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
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
