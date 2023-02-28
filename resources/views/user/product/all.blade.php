@extends('user.layouts.app')

@section('title', 'Product | Details')

@section('content')
		
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Shop</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="category-area all-product">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-50">
                        <h2>Shop with us</h2>
                        <p>Browse from {{ $products->total() }} latest items</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 ">
                    <div class="category-listing mb-50">
                        <div class="single-listing">
                            <div class="select-job-items2">
                                <select name="select2">
                                    <option value="">Category</option>
                                    <option value="">Shat</option>
                                    <option value="">T-shart</option>
                                    <option value="">Pent</option>
                                    <option value="">Dress</option>
                                </select>
                            </div>
                            <div class="select-job-items2">
                                <select name="select3">
                                    <option value="">Type</option>
                                    <option value="">SM</option>
                                    <option value="">LG</option>
                                    <option value="">XL</option>
                                    <option value="">XXL</option>
                                </select>
                            </div>
                            <div class="select-job-items2">
                                <select name="select4">
                                    <option value="">Size</option>
                                    <option value="">1.2ft</option>
                                    <option value="">2.5ft</option>
                                    <option value="">5.2ft</option>
                                    <option value="">3.2ft</option>
                                </select>
                            </div>
                            <div class="select-job-items2">
                                <select name="select5">
                                    <option value="">Color</option>
                                    <option value="">Whit</option>
                                    <option value="">Green</option>
                                    <option value="">Blue</option>
                                    <option value="">Sky Blue</option>
                                    <option value="">Gray</option>
                                </select>
                            </div>
                            <div class="select-job-items2">
                                <select name="select6">
                                    <option value="">Price range</option>
                                    <option value="">$10 to $20</option>
                                    <option value="">$20 to $30</option>
                                    <option value="">$50 to $80</option>
                                    <option value="">$100 to $120</option>
                                    <option value="">$200 to $300</option>
                                    <option value="">$500 to $600</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 ">
                    <div class="new-arrival new-arrival2">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="{{ File::exists($product->img_path.$product->image) ? asset($product->img_path.$product->image) : asset('assets/admin/dist/img/default.jpg') }}" alt="">
                                            <div class="favorit-items">
                                                <img src="{{ asset('assets/img/gallery/favorit-card.png') }}" alt="favourite-image">
                                            </div>
                                        </div>
                                        <div class="popular-caption">
                                            <h3>
                                                <a href="{{ route('product.details', ['id' => Crypt::encryptString($product->id)]) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="rating mb-10">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span><i class="fas fa-rupee-sign"></i> {{ Str::of(number_format($product->price, 2))->before('.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="pagination-container">
                            {{-- <div class="room-btn mt-20">
                                <a href="catagori.html" class="border-btn">Browse More</a>
                            </div> --}}
                            {{-- <div class="col-lg-3 text-left">
                                Page {{ $products->currentPage() }} of {{ $products->hasPages() }}
                            </div>
                            <div class="col-lg-9 text-center">
                                <button class="btn btn-primary active">{{ $products->currentPage() }}</button>
                                <a href="{{ $products->nextPageUrl() }}"><button class="btn btn-primary">2</button></a>
                                <a href="{{ $products->nextPageUrl() }}" class="next"><button class="btn btn-primary">Next</button></a>
                            </div> --}}
                            {{-- {{ $products->links('pagination::bootstrap-5') }} --}}
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-user.popular-cat/>		
@endsection