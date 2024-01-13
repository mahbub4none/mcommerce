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
                            <a href="{{ route('units.index') }}">
                                <button class="btn btn-primary">Units</button>
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
                                <h3 class="card-title">Edit Unit</h3>
                            </div>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('units.update', ['id' => $unit->id]) }}" method="POST">
                                @csrf
                                @method('PUT') {{-- Use the appropriate HTTP method for updating --}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="unit_name">Unit Type</label>
                                        <input type="text" name="unit_name" class="form-control" id="brand_name"
                                            placeholder="Enter Unit Type" value="{{ $unit->unit_name }}">
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
