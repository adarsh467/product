@extends('admin.layouts.app')

@section('title', 'Product | View')

@section('content')
    <!-- Content Wrapper. -->
    <div class="content-wrapper view-user">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-eye"></i> View Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('product') }}">Products List</a></li>
                            <li class="breadcrumb-item active">View Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="offset-2 col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="card-header tab-container">
                                <div class="row">
                                    <ul class="nav nav-pills user-info-tabs col-9">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#details" data-id="details" data-toggle="tab">
                                                <i class="fa-solid fa-eye fa-spin" style="--fa-animation-duration: 5s;"></i> Product Details
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="col-3 text-right">
                                        <a href="{{ route('product') }}">
                                            <button type="button" class="btn btn-outline-dark btn-flat" title="Back to List">
                                                <i class="fas fa-chevron-circle-left"></i> Back to List
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="details">
                                        <div class="text-center pb-3">
                                            <img class="profile-user-img img-fluid" src="{{ File::exists($product->img_path.$product->image) ? asset($product->img_path.$product->image) : asset('assets/admin/dist/img/default.jpg') }}" alt="User profile picture">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="inputTitle" class="col-sm-6 col-form-label">Name:</label>
                                                    <div class="form-container col-sm-6 p-2"> {{ $product->name }}</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputTitle" class="col-sm-6 col-form-label">Has Addon Category:</label>
                                                    <div class="form-container col-sm-6 p-2"> 
                                                        @if($product->has_addon_cat == 1)
                                                            <span class="badge bg-info">Yes</span>
                                                        @else
                                                            <span class="badge bg-warning">No</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="inputTitle" class="col-sm-4 col-form-label">Price:</label>
                                                    <div class="form-container col-sm-8 p-2"> @money($product->price)</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputTitle" class="col-sm-4 col-form-label">Status:</label>
                                                    <div class="form-container col-sm-8 p-2"> 
                                                        @if($product->status == 1)
                                                            <span class="badge bg-success">Published</span>
                                                        @else
                                                            <span class="badge bg-danger">Draft</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection