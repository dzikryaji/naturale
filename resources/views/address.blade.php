@extends('layout.main')
@section('container')
    <!-- Checkout Start -->
    <div class="container-fluid py-5 px-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h1 class="display-5 text-uppercase mb-4">CHECKOUT</h1>
                </div>
                <div class="product-item position-relative bg-white d-flex flex-column">
                    <img class="img-fluid mb-4" src="{{ url('img/product/' . $product->imagesrc . '1.jpg') }}" alt="">
                    <h6 class="mb-3">Product Name : {{ $product->name }}</h6>
                    <h6 class="mb-3">Quantity : {{ session('product')['quantity'] }}</h6>
                    <h4 class="text-primary">Total Amount
                        ${{ number_format($product->price * session('product')['quantity'], 2, '.', ',') }}</h4>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="bg-light text-center p-5">
                    <h3 class="mb-3">Address Information</h3>
                    <form action="/payment" method="post">
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
