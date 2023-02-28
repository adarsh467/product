@extends('user.layouts.app')

@section('title', 'Product | Details')

@section('content')
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('all.products') }}">shop</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Product Details</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="directory-details pt-padding product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="map">
                        <img src="{{ File::exists($product->img_path.$product->image) ? asset($product->img_path.$product->image) : asset('assets/admin/dist/img/default.jpg') }}" alt="">
                    </div>
                    <div class="form-wrapper pt-80">
                        {{-- <div class="row ">
                            <div class="col-xl-12">
                                <div class="small-tittle mb-30">
                                    <h2>Contact</h2>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-name">
                        <h2>{{ $product->name }}</h2>
                    </div>
                    <div class="price mb-30">
                        <label for="price">Special price</label>
                        <h3><i class="fas fa-rupee-sign"></i> {{ Str::of(number_format($product->price, 2))->before('.') }}</h3>
                    </div>
                    @if($product->has_addon_cat == 1)
                        <div class="addon-product">
                            <div class="small-title mb-1">
                                <h3>Addon Product</h3>
                            </div>
                            <div class="directory-cap mb-40">
                                <h4>{{ $product->ac1_name }}</h4>
                            </div>
                        </div>
                    @endif
                    {{-- <div class="gallery-img">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="assets/img/gallery/gallery1.png" class="mb-30" alt="">
                            </div>
                            <div class="col-lg-6">
                                <img src="assets/img/gallery/gallery2.png" class="mb-30" alt="">
                            </div>
                            <div class="col-lg-6">
                                <img src="assets/img/gallery/gallery3.png" class="mb-30" alt="">
                            </div>
                            <div class="col-lg-6">
                                <img src="assets/img/gallery/gallery4.png" class="mb-30" alt="">
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection