@extends('admin.layouts.app')

@section('title', 'Product | Edit')

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
                        <h1><i class="fas fa-edit"></i> Edit Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('product') }}">Products List</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
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
                                        <a href="{{ route('product') }}">
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
                                        <form id="quickForm" class="form-horizontal" method="post" action="{{ route('product.edit', ['id' => Crypt::encryptString($product->id)]) }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="inputProfileImage" class="required">{{ __('Image Preview') }}</label>
                                                        <div class="img-container">
                                                            <img src="{{ $product->image != '' ? asset($product->img_path.$product->image) : asset('assets/admin/dist/img/default.jpg') }}" id="imgPreview" class="view-img-preview avatar img-thumbnail @error('imgFileName') is-invalid @enderror" alt="Image Preview" />
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
                                                <div class="col-9">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label required">{{ __('Name') }}</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') ? old('name') : $product->name }}" placeholder="Name">
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
                                                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" name="price" value="{{ old('price') ? old('price') : $product->price }}" placeholder="Price">
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
                                                            <input type="checkbox" name="status" class="form-control @error('status') is-invalid @enderror" id="inputStatus" {{ old('status') ? 'checked' : ($product->status == 1 ? 'checked' : '') }} 
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
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                                <a href="{{ route('product') }}">
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

            /**
             * TO preview image before upload
             */
            // var imagePrevCont = $("#imgPreviewContainer");
            // var closeImg = $("#imgPreviewContainer .close");
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
                        image.css({"width": "11.8rem", "height": "8rem"});
                    }
                } else {
                    alert("Invalid file type!");
                }
            });
        });
    </script>
@endsection