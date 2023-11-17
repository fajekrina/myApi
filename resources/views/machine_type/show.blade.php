@extends('layouts.main')
@section('title', 'Machine - MyMachines')
@section('machine_type', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine_type.index') }}">Machine Type</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine_type.show', $machine_type->id) }}">Edit</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Machine Type</h4>
                            <div class="basic-form">
                                <form>
                                    <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <label for="type_name">Type Name</label>
                                        <input type="text" class="form-control @error('type_name') is-invalid @enderror" id="type_name"
                                          name="type_name" value="{{ $machine_type->type_name }}" readonly>
                                        @error('type_name')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <label for="type_description">Type Description</label>
                                          <textarea name="type_description" id="type_description" class="form-control @error('type_description') is-invalid @enderror" readonly>{{ $machine_type->type_description }}</textarea>
                                          @error('type_description')
                                              <span class="text-danger">
                                                  {{ $message }}
                                              </span>
                                          @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="max_operating_capacity">Max Operating Capacity</label>
                                          <input type="text" class="form-control @error('max_operating_capacity') is-invalid @enderror" id="max_operating_capacity"
                                            name="max_operating_capacity" value="{{ $machine_type->max_operating_capacity }}" readonly>
                                          @error('max_operating_capacity')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="power_requirements">Power Requirements</label>
                                          <input type="text" class="form-control @error('power_requirements') is-invalid @enderror" id="power_requirements"
                                            name="power_requirements" value="{{ $machine_type->power_requirements }}" readonly>
                                          @error('power_requirements')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <label for="safety_guidelines">Safety Guidelines</label>
                                          <textarea name="safety_guidelines" id="safety_guidelines" class="form-control @error('safety_guidelines') is-invalid @enderror" readonly>{{ $machine_type->safety_guidelines }}</textarea>
                                          @error('safety_guidelines')
                                              <span class="text-danger">
                                                  {{ $message }}
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
