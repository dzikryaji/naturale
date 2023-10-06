@extends('layout.main')
@section('container')
    <div class="container p-3">
        <h1>Your Cart</h1>
        <h5 class="mb-3">Not ready to Checkout? Continue Shopping</h5>
        <div class="row mb-4">
            <div class="col-md-8 pe-2 pe-lg-5">
                @foreach ($carts as $cart)
                    <div class="row py-3 mb-3 {{ !$loop->last ? 'border-bottom border-secondary' : '' }}">
                        <div class="col-md-4 col-5">
                            <img src="img/product/{{ $cart->product->imagesrc }}1.jpg" alt="" class="img-thumbnail w-100"
                                style="bject-fit: contain;">
                        </div>
                        <div class="col-md-8 col-7 h-100">
                            <h4>{{ $cart->product->name }}</h4>
                            <small>Quantity: {{ $cart->product->stock }}</small>
                            <h4 class="mt-2">${{ number_format($cart->product->price * $cart->product->stock) }}</h4>
                            <div class="text-end mt-md-5">
                                <a href="" class="text-dark text-decoration-underline">Remove</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <h4 class="mb-4">Order Summary</h4>
                <div class="clearfix mb-2">
                    <div class="float-start">
                        <h5>Subtotal</h5>
                    </div>
                    <div class="float-end">
                        <h5>${{ number_format($totalPrice) }}</h5>
                    </div>
                </div>
                <div class="clearfix border-bottom border-secondary pb-3 mb-3">
                    <div class="float-start">
                        <h5>Delivery</h5>
                    </div>
                    <div class="float-end">
                        <small class="text-muted">Calculated at the next step</small>
                    </div>
                </div>
                <div class="clearfix pb-3">
                    <div class="float-start">
                        <h5>Total</h5>
                    </div>
                    <div class="float-end">
                        <h5>${{ number_format($totalPrice) }}</h5>
                    </div>
                </div>
                @if (count($carts))
                    <a href="" class="btn btn-primary text-white d-block w-100">Continue to Checkout</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h4 class="mb-4 pb-3 border-bottom border-secondary">Order Information</h4>
                <span class="text-muted">
                    <h6>Return Policy</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea dignissimos sit sequi iure obcaecati
                        dolore
                        autem tenetur aspernatur soluta debitis!</p>
                </span>
            </div>
        </div>
    </div>
@endsection
