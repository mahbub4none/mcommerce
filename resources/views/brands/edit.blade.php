@extends('layouts.dashboard')

@section('dashboard')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('brands.index') }}">
                                <button class="btn btn-primary">Brands</button>
                            </a> 
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Brand</h3>
                            </div>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('brands.update', ['id' => $brand->id]) }}" method="POST">
                                @csrf
                                @method('PUT') {{-- Use the appropriate HTTP method for updating --}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" name="brand_name" class="form-control" id="brand_name"
                                            placeholder="Enter Brand Name" value="{{ $brand->brand_name }}">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
