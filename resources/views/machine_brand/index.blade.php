@extends('layouts.main')
@section('title', 'Machine Brand - MyMachineBrand')

@section('css_custom')
    <link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('machine_brand.index') }}">Machine Brand</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Machine Brands</h4>
                            <a href="{{ route('machine_brand.create') }}" type="button" class="btn mb-1 btn-primary">Add New
                                Data</a>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Brand Name</th>
                                            <th>Country of Origin</th>
                                            <th>Created At</th>
                                            <th>Last Updated</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($machine_brands as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->brand_name }}</td>
                                                <td>{{ $item->country_of_origin }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y h:m:s') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d/m/Y h:m:s') }}
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <span><a href="{{ route('machine_brand.show', $item->id) }}"
                                                                class="btn btn-info"><i class="fa fa-eye"></i></a></span>
                                                        <span><a href="{{ route('machine_brand.edit', $item->id) }}"
                                                                class="btn btn-warning"><i
                                                                    class="fa fa-pencil"></i></a></span>
                                                        @if(Auth::user()->role == 'super_admin')            
                                                        <form action="{{ route('machine_brand.destroy', $item->id) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <span><button onclick="return confirm('Are you sure?')"
                                                                    class="btn btn-danger d-block" type="submit"><i
                                                                        class="fa fa-trash"></i></button></span>
                                                        @endif                
                                                    </div>
                                                    </form>
                                                </td>
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
        <!-- #/ container -->
    </div>
@endsection

@section('js_custom')
    <script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection
