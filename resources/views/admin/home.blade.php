@extends('admin.layouts.app')

@section('title', 'Admin | Home')

@section('content')
	<!-- content-wrapper -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0"><i class="fas fa-solid fa-house"></i> Home</h1>
					</div>
					<!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item active">Home</li>
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
                <h5 class="mb-2">User Insights</h5>
				<!-- Users Insight -->
                <div class="row">
                    <!-- ./col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box shadow-sm">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-user-plus"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">New Users</span>
                                <span class="info-box-number"> 
                                    10
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    
                    <!-- ./col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box shadow-sm">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-user-check"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Active Users</span>
                                <span class="info-box-number"> 
                                    54
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    
                    <!-- ./col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box shadow-sm">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-user-minus"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Inactive Users</span>
                                <span class="info-box-number"> 
                                    10
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    
                    <!-- ./col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box shadow-sm">
                            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Users</span>
                                <span class="info-box-number"> 
                                    74
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection