@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    <x-user.slider/>

    <x-user.popular-cat/>
    
    <div class="new-arrival">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <h2>New <br>Arrival </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
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
            <div class="row justify-content-center text-center">
                <div class="room-btn">
                    <a href="{{ route('all.products') }}" class="border-btn">Browse More</a>
                    {{-- <div class="pagination-container">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <x-user.collection/>

    <x-user.popular-pro/>
@endsection