@extends('admin.layouts.app')

@section('title', 'Product | Add')

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
						<h1 class="m-0"><i class="fas fa-store"></i><i class="icon-two fas fa-plus"></i> <span>Add Product</span></h1>
					</div>
					<!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('product') }}">Product List</a></li>
							<li class="breadcrumb-item active">Add Product</li>
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
                                    <a href="{{ route('product') }}">
                                        <button type="button" class="btn btn-outline-dark btn-flat">
                                            <i class="fas fa-chevron-circle-left"></i> Back to List
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('product.add') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputProfileImage" class="required">{{ __('Image Preview') }}</label>
                                                <div class="img-container">
                                                    <img src="{{ asset('assets/admin/dist/img/default.jpg') }}" id="imgPreview" class="view-img-preview avatar img-thumbnail @error('imgFileName') is-invalid @enderror" alt="Image Preview" />
                                                    @error('imgFileName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <button type="button" class="btn attachments--btn" id="selectImgBtn" data-toggle="tooltip" data-placement="bottom" title="Click here to upload image">
                                                        <label for="imgFileName" class="post-actions__label" id="imgTxt">
                                                            <span class="upload-img-txt"><i class="far fa-image"></i> Choose file</span>
                                                            <span class="file-name"></span>
                                                        </label>
                                                    </button>
                                                    <input type="file" name="imgFileName" id="imgFileName" accept="image/*" value="{{ old('imgFileName') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
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
                                                <label for="inputPrice" class="required">{{ __('Price') }}</label>
                                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="inputPrice" value="{{ old('price') }}" placeholder="{{ __('Price') }}">
                                                @error('price')
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
                                        <a href="{{ route('product') }}">
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

            /**
             * TO preview image before upload
             */
            var image = $("#imgPreview");
            var selectImgBtn = $("#selectImgBtn");
            var uploadImgTxt = $("#imgTxt .upload-img-txt");
            var imgTxtFileName = $("#imgTxt .file-name");
            var imgFileName = $("#imgFileName");
            
            selectImgBtn.click(function() {
                uploadImgTxt.hide();
                imgTxtFileName.html('<i class="fa-solid fa-spinner fa-spin-pulse"></i> Processing...');
            });
            imgFileName.change(function () { 
                //image preview code
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                //Image Name 
                var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
                uploadImgTxt.hide();
                imgTxtFileName.html("<b>Selected File: </b>" + fileName);
                imgTxtFileName.show();
                selectImgBtn.attr("title", "Click here to replace or upload the new file");
                selectImgBtn.attr("data-original-title", "Click here to replace or upload the new file");
                imgFileName.attr("value", fileName);

                if (/^image/.test( files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function() { // set image data as background of div
                        image.attr("src", this.result);
                        // image.css({"width": "15rem", "height": "15rem"});
                        image.css({"width": "11.8rem", "height": "8rem"});
                    }
                } else {
                    alert("Invalid file type!");
                }
            });
        })
    </script>
@endsection