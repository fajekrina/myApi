@extends('layouts.main')
@section('title', 'Machine - MyMachines')
@section('machine', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine.index') }}">Machine</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine.create') }}">Add</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Machine</h4>
                            <div class="basic-form">
                                <form action="{{ route('machine.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <label for="machine_name">Machine Name</label>
                                        <input type="text" class="form-control @error('machine_name') is-invalid @enderror" id="machine_name"
                                          name="machine_name" value="{{ old('machine_name') }}" required>
                                        @error('machine_name')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="brand_id">Brand Name</label>
                                          <select class="form-control @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id" required>
                                            <option value=""> Choose Brand </option>
                                            @foreach ($machine_brands as $item)
                                            <option value="{{ $item->id  }}">
                                              {{ $item->brand_name }}
                                            </option>
                                            @endforeach
                                          </select>
                                          @error('brand_id')
                                          <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="type_id">Type Name</label>
                                          <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id" required>
                                            <option value=""> Choose Type </option>
                                            @foreach ($machine_types as $item)
                                            <option value="{{ $item->id  }}">
                                              {{ $item->type_name }}
                                            </option>
                                            @endforeach
                                          </select>
                                          @error('type_id')
                                          <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="machine_status">Status</label>
                                          <select class="form-control @error('machine_status') is-invalid @enderror" id="machine_status" name="machine_status" required>
                                            <option> Choose Status </option>
                                            <option value="New">New</option>
                                            <option value="Used">Used</option>
                                            <option value="Damaged">Damaged</option>
                                            <option value="Sold">Sold</option>
                                          </select>
                                          @error('machine_status')
                                          <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="purchase_price">Purchase Price</label>
                                          <input type="number" class="form-control @error('purchase_price') is-invalid @enderror" id="purchase_price"
                                            name="purchase_price" value="{{ old('purchase_price') }}" required>
                                          @error('purchase_price')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="purchase_date">Purchase Date</label>
                                          <input type="date" class="form-control @error('purchase_date') is-invalid @enderror" id="purchase_date"
                                            name="purchase_date" value="{{ old('purchase_date') }}" required>
                                          @error('purchase_date')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="manufacture_date">Manufacture Date</label>
                                          <input type="date" class="form-control @error('manufacture_date') is-invalid @enderror" id="manufacture_date"
                                            name="manufacture_date" value="{{ old('manufacture_date') }}">
                                          @error('manufacture_date')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="warranty_expiry_date">Warranty Expiry Date</label>
                                          <input type="date" class="form-control @error('warranty_expiry_date') is-invalid @enderror" id="warranty_expiry_date"
                                            name="warranty_expiry_date" value="{{ old('warranty_expiry_date') }}">
                                          @error('warranty_expiry_date')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="warehouse_location">Warehouse Location</label>
                                          <input type="text" class="form-control @error('warehouse_location') is-invalid @enderror" id="warehouse_location"
                                            name="warehouse_location" value="{{ old('warehouse_location') }}" required>
                                          @error('warehouse_location')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="station_location">Station Location</label>
                                          <input type="text" class="form-control @error('station_location') is-invalid @enderror" id="station_location"
                                            name="station_location" value="{{ old('station_location') }}" required>
                                          @error('station_location')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="floor_location">Floor Location</label>
                                          <input type="text" class="form-control @error('floor_location') is-invalid @enderror" id="floor_location"
                                            name="floor_location" value="{{ old('floor_location') }}">
                                          @error('floor_location')
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
