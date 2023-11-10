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
                    <li class="breadcrumb-item active"><a href="{{ route('machine.edit', $machine->barcode_id) }}">Edit</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Machine</h4>
                            <div class="basic-form">
                                <form action="{{ route('machine.update', $machine->barcode_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <label for="machine_name">Machine Name</label>
                                        <input type="text" class="form-control" id="machine_name"
                                          name="machine_name" value="{{ $machine->machine_name }}" readonly>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <label for="barcode_id">Machine ID</label>
                                        <input type="number" class="form-control" id="barcode_id"
                                          name="barcode_id" value="{{ $machine->barcode_id }}" readonly>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="brand_id">Brand Name</label>
                                          <input type="text" class="form-control" id="brand_id"
                                          name="brand_id" value="{{ $machine->machine_brand->brand_name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="type_id">Type Name</label>
                                          <input type="text" class="form-control" id="type_id"
                                          name="type_id" value="{{ $machine->machine_type->type_name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="machine_status">Status</label>
                                          <input type="text" class="form-control" id="machine_status"
                                          name="machine_status" value="{{ $machine->machine_status }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="purchase_price">Purchase Price</label>
                                          <input type="number" class="form-control" id="purchase_price"
                                            name="purchase_price" value="{{ $machine->purchase_price }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="purchase_date">Purchase Date</label>
                                          <input type="date" class="form-control" id="purchase_date"
                                            name="purchase_date" value="{{ $machine->purchase_date }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="manufacture_date">Manufacture Date</label>
                                          <input type="date" class="form-control" id="manufacture_date"
                                            name="manufacture_date" value="{{ $machine->manufacture_date }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="warranty_expiry_date">Warranty Expiry Date</label>
                                          <input type="date" class="form-control" id="warranty_expiry_date"
                                            name="warranty_expiry_date" value="{{ $machine->warranty_expiry_date }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="warehouse_location">Warehouse Location</label>
                                          <input type="text" class="form-control" id="warehouse_location"
                                            name="warehouse_location" value="{{ $machine->warehouse_location }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="station_location">Station Location</label>
                                          <input type="text" class="form-control" id="station_location"
                                            name="station_location" value="{{ $machine->station_location }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="floor_location">Floor Location</label>
                                          <input type="text" class="form-control" id="floor_location"
                                            name="floor_location" value="{{ $machine->floor_location }}" readonly>
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
