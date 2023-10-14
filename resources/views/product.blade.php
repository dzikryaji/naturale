@extends('layout.main')
@section('container')
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div class="border">
                    <img class="w-100 h-100" src="{{ url('img/product/' . $seenProduct->imagesrc . '1.jpg') }}" alt="Image">
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $seenProduct->name }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">${{ number_format($seenProduct->price, 2, '.', ',') }}</h3>
                <h3 class="font-weight-semi-bold mb-4">Stock : {{ $seenProduct->stock }}</h3>
                {!! $seenProduct->description !!}
                <form action="/cart" method="post">
                    @csrf

                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="number" class="form-control text-center @error('quantity') border-danger @enderror" value="1" min="1"
                                name="quantity">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>
                            Add to Cart</button>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $seenProduct->id }}">
                </form>
                @error('quantity')
                    <div class="d-flex p-0 invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5 bg-primary py-3">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($products->shuffle() as $product)
                        <div class="card product-item border-0 py-3 rounded">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ url('img/product/' . $product->imagesrc . '1.jpg') }}"
                                    alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>${{ number_format($product->price, 2, '.', ',') }}</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="{{ url('product/' . $product->id) }}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary me-1"></i>View Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
