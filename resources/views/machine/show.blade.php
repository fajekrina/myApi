@extends('layouts.main')
@section('title', 'Machine - MyMachines')
@section('machine', 'active')

@section('css_custom')
    <link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine.index') }}">Machine</a></li>
                    <li class="breadcrumb-item active"><a
                            href="{{ route('machine.show', $machine->barcode_id) }}">Detail</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Machine</h4>
                            <div class="basic-form">
                                <form action="{{ route('machine.update', $machine->barcode_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col pt-2 mb-0">
                                            <label for="barcode_id">Barcode ID : </label>
                                            <span>{{ $machine->barcode_id }}</span>
                                        </div>
                                        <div class="col pt-2 mb-0">
                                            <label for="purchase_date">Purchase Date : </label>
                                            <span>{{ \Carbon\Carbon::parse($machine->purchase_date)->format('d/m/Y h:m:s') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col mb-0">
                                            <label for="machine_name">Machine Name : </label>
                                            <span>{{ $machine->machine_name }}</span>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="manufacture_date">Manufacture Date : </label>
                                            <span>{{ \Carbon\Carbon::parse($machine->manufacture_date)->format('d/m/Y h:m:s') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col mb-0">
                                            <label for="brand_id">Brand Name : </label>
                                            <span>{{ $machine->machine_brand->brand_name }}</span>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="warranty_expiry_date">Warranty Expiry Date : </label>
                                            <span>{{ \Carbon\Carbon::parse($machine->warranty_expiry_date)->format('d/m/Y h:m:s') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col mb-0">
                                            <label for="type_id">Type Name : </label>
                                            <span>{{ $machine->machine_type->type_name }}</span>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="warehouse_location">Warehouse Location : </label>
                                            <span>{{ $machine->warehouse_location }}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col mb-0">
                                            <label for="machine_status">Status : </label>
                                            <span class="badge badge-primary">{{ $machine->machine_status }}</span>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="station_location">Station Location : </label>
                                            <span>{{ $machine->station_location }}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="purchase_price">Purchase Price : </label>
                                            <span>Rp{{ number_format($machine->purchase_price) }}</span>
                                        </div>
                                        <div class="col">
                                            <label for="floor_location">Floor Location : </label>
                                            <span>{{ $machine->floor_location }}</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Machine Mutation</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Previous Warehouse Location</th>
                                            <th>Previous Station Location</th>
                                            <th>Previous Floor Location</th>
                                            <th>New Warehouse Location</th>
                                            <th>New Station Location</th>
                                            <th>New Floor Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mutations as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->previous_warehouse_location }}</td>
                                                <td>{{ $item->previous_station_location }}</td>
                                                <td>{{ $item->previous_floor_location }}</td>
                                                <td>{{ $item->new_warehouse_location }}</td>
                                                <td>{{ $item->new_station_location }}</td>
                                                <td>{{ $item->new_floor_location }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_custom')
    <script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection
