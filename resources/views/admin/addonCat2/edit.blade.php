@extends('admin.layouts.app')

@section('title', 'Addon | Category 2 | Edit')

@section('topRes')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. -->
    <div class="content-wrapper view-edit-user view-edit-banner view-scratch-card">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-edit"></i> Edit Addon Cat 2 Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('product') }}">Products List</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('addon.cat1', ['proId' => $proId]) }}">Addon Cat 1 List</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('addon.cat2', ['proId' => $proId, 'cat1Id' => $addonId]) }}">Addon Cat 2 List</a></li>
                            <li class="breadcrumb-item active">Edit Addon Cat 2 Product</li>
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
                                            <a class="nav-link active" href="#settings" data-id="settings" data-toggle="tab">
                                                <i class="fa-solid fa-gear fa-spin" style="--fa-animation-duration: 5s;"></i> Settings
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="col-3 text-right">
                                        <a href="{{ route('addon.cat2', ['proId' => $proId, 'cat1Id' => $addonId]) }}">
                                            <button type="button" class="btn btn-outline-dark btn-flat" title="Edit">
                                                <i class="fas fa-chevron-circle-left"></i> Back to List
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <form id="quickForm" class="form-horizontal" method="post" action="{{ route('addon.cat2.edit', ['proId' => $proId, 'cat1Id' => $addonId, 'id' => Crypt::encryptString($addonCatTwo->id)]) }}">
                                            @csrf
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label required">{{ __('Name') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') ? old('name') : $addonCatTwo->name }}" placeholder="Name">
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPrice" class="col-sm-2 col-form-label required">{{ __('Price') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" name="price" value="{{ old('price') ? old('price') : $addonCatTwo->price }}" placeholder="Price">
                                                        @error('price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row status">
                                                    <label for="inputStatus" class="col-sm-2 col-form-label required">{{ __('Status') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="checkbox" name="status" class="form-control @error('status') is-invalid @enderror" id="inputStatus" {{ old('status') ? 'checked' : ($addonCatTwo->status == 1 ? 'checked' : '') }} 
                                                            data-bootstrap-switch data-on-text="Published" data-off-text="Draft" 
                                                            data-off-color="danger" data-on-color="success">
                                                        @error('status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                                <a href="{{ route('addon.cat2', ['proId' => $proId, 'cat1Id' => $addonId]) }}">
                                                    <button type="button" class="btn btn-outline-danger">Cancel</button>
                                                </a>
                                            </div>
                                        </form>
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

@section('bottomRes')
    <!-- Bootstrap Switch -->
    <script src="{{ asset('assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $(function () {
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        });
    </script>
@endsection