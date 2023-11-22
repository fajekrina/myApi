@extends('layouts.main')
@section('title', 'Department - MyDepartment')
@section('department', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('department.index') }}">Department</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('department.edit', $department->id) }}">Edit</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Department</h4>
                            <div class="basic-form">
                                <form action="{{ route('department.update', $department->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <label for="unit_id">Unit</label>
                                        <select class="form-control @error('unit_id') is-invalid @enderror" id="unit_id" name="unit_id" required>
                                          @foreach ($units as $item)
                                          <option value="{{ $item->id  }}" @if($item->id === $department->unit_id) selected @endif>
                                            {{ $item->name }}
                                          </option>
                                          @endforeach
                                        </select>
                                        @error('unit_id')
                                        <span class="invalid-feedback" role="alert">
                                          {{ $message }}
                                        </span>
                                        @enderror
                                      </div>
                                  </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ $department->name }}" placeholder="name">
                                            @error('name')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Slug</label>
                                            <textarea name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror">{{ $department->slug }}</textarea>
                                            @error('slug')
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
