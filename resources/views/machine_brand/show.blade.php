@extends('layouts.main')
@section('title', 'Machine - MyMachines')
@section('machine_brand', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine_brand.index') }}">Machine Brand</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine_brand.show', $machine_brand->id) }}">Detail</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Machine Brand</h4>
                            <div class="basic-form">
                                <form>
                                    <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name"
                                          name="brand_name" value="{{ $machine_brand->brand_name }}" readonly>
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
                                            name="country_of_origin" value="{{ $machine_brand->country_of_origin }}" readonly>
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
                                            name="contact_information_email" value="{{ $machine_brand->contact_information_email }}" readonly>
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
                                            name="contact_information_phone" value="{{ $machine_brand->contact_information_phone }}" readonly>
                                          @error('contact_information_phone')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
