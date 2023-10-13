@extends('layout.main')
@section('container')
    <!-- Checkout Start -->
    <div class="container-fluid py-5 px-5">
        <div class="row">
            <div>
                <h1 class="display-5 text-uppercase">CHECKOUT</h1>
            </div>
        </div>
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-primary mb-3">Total Amount ${{ number_format($totalPrice, 2, '.', ',') }}</h4>
                @foreach ($carts as $cart)
                    <div class="row py-3 mb-3 {{ !$loop->last ? 'border-bottom border-secondary' : '' }}">
                        <div class="col-md-6 col-5">
                            <img src="/img/product/{{ $cart->product->imagesrc }}1.jpg" alt=""
                                class="img-thumbnail w-100" style="object-fit: contain;">
                        </div>
                        <div class="col-md-6 col-7 h-100">
                            <h4>{{ $cart->product->name }}</h4>
                            <small>Quantity: {{ $cart->quantity }}</small>
                            <h4 class="mt-2">${{ number_format($cart->product->price * $cart->quantity, 2, '.', ',') }}
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-8">
                <div class="bg-light text-center p-5">
                    <h3 class="mb-3">Delivery Information</h3>
                    <form action="/checkout/address" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label class="text-dark w-100 text-start ps-2 mb-2">Name</label>
                                <input type="text" class="form-control border-0 @error('name') is-invalid @enderror"
                                    placeholder="Your Name" name="name" required style="height: 55px;"
                                    value="{{ isset($address) ? old('name', $address->name) : old('name') }}">
                                @error('name')
                                    <div class="d-flex p-0 invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="text-dark w-100 text-start ps-2 mb-2">Address</label>
                                <input type="text" class="form-control border-0 @error('address') is-invalid @enderror"
                                    placeholder="Your Address" name="address" required style="height: 55px;"
                                    value="{{ isset($address) ? old('address', $address->address) : old('address') }}">
                                @error('address')
                                    <div class="d-flex p-0 invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="text-dark w-100 text-start ps-2 mb-2">City</label>
                                <input type="text" class="form-control border-0 @error('city') is-invalid @enderror"
                                    placeholder="Your City" name="city" required style="height: 55px;"
                                    value="{{ isset($address) ? old('city', $address->city) : old('city') }}">
                                @error('city')
                                    <div class="d-flex p-0 invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="text-dark w-100 text-start ps-2 mb-2">Province</label>
                                <input type="text" class="form-control border-0 @error('province') is-invalid @enderror"
                                    placeholder="Your Province" name="province" required style="height: 55px;"
                                    value="{{ isset($address) ? old('province', $address->province) : old('province') }}">
                                @error('province')
                                    <div class="d-flex p-0 invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="text-dark w-100 text-start ps-2 mb-2">Contact Number</label>
                                <input type="tel"
                                    class="form-control border-0 @error('contact_number') is-invalid @enderror"
                                    placeholder="Your Contact Number" name="contact_number" required style="height: 55px;"
                                    value="{{ isset($address) ? old('contact_number', $address->contact_number) : old('contact_number') }}">
                                @error('contact_number')
                                    <div class="d-flex p-0 invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-check my-3 ms-2">
                                <input class="form-check-input" type="checkbox" value="save" id="saveInformation"
                                    name="saveInformation">
                                <label class="text-dark w-100 text-start ps-2 mb-2" for="saveInformation">
                                    Save Address Information
                                </label>
                            </div>

                            <div class="col-12">
                                <input type="submit" class="btn btn-primary w-100 py-3" value="Submit Address">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
