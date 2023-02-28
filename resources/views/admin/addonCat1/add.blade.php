@extends('admin.layouts.app')

@section('title', 'Addon | Category 1 | Add')

@section('topRes')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
	<!-- content-wrapper -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0"><i class="fas fa-store"></i><i class="icon-two fas fa-plus"></i> <span>Add Addon Cat 1 Product</span></h1>
					</div>
					<!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('product') }}">Product List</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('addon.cat1', ['proId' => $proId]) }}">Addon Cat 1 List</a></li>
							<li class="breadcrumb-item active">Add Addon Cat 1 Product</li>
						</ol>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		<!-- Main content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- REGISTER FORM -->
                    <!-- left column -->
                    <div class="offset-2 col-md-8 col-md-offset-2">
                        <!-- jquery validation -->
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="text-right">
                                    <a href="{{ route('addon.cat1', ['proId' => $proId]) }}">
                                        <button type="button" class="btn btn-outline-dark btn-flat">
                                            <i class="fas fa-chevron-circle-left"></i> Back to List
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('addon.cat1.add', ['proId' => $proId]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputName" class="required">{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{ old('name') }}" placeholder="{{ __('Name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStatus" class="required">{{ __('Status') }}</label>
                                                <input type="checkbox" name="status" class="form-control @error('status') is-invalid @enderror" id="inputStatus" {{ old('status') ? 'checked' : '' }} 
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
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-success" id="addSrvSbmBtn">Submit</button>
                                        <a href="{{ route('addon.cat1', ['proId' => $proId]) }}">
                                            <button type="button" class="btn btn-outline-danger">Cancel</button>
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
					<!-- END of Register Form -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
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
        })
    </script>
@endsection