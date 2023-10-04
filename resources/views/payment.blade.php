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
                    <h3 class="mb-3">Credit Card Information</h3>
                    <form action="/checkout" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="text-dark w-100 text-start ps-2 mb-2">Name</label>
                                <input type="text" class="form-control border-0 @error('name') is-invalid @enderror"
                                    name="name" placeholder="Your Name" required style="height: 55px;"
                                    value="{{ isset($card) ? old('name', $card->name) : old('name') }}">
                                @error('name')
                                    <div class="d-flex p-0 invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="text-dark w-100 text-start ps-2 mb-2">Number</label>
                                <input type="number" class="form-control border-0 @error('number') is-invalid @enderror"
                                    name="number" required placeholder="XXXXXXXX" style="height: 55px;"
                                    value="{{ isset($card) ? old('number', $card->number) : old('number') }}">
                                @error('number')
                                    <div class="d-flex p-0 invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="text-dark w-100 text-start ps-2 mb-2">CVC</label>
                                <input type="number" class="form-control border-0 @error('cvc') is-invalid @enderror"
                                    name="cvc" required placeholder="XXX" style="height: 55px;"
                                    value="{{ isset($card) ? old('cvc', $card->cvc) : old('cvc') }}">
                                @error('cvc')
                                    <div class="d-flex p-0 invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="text-dark w-100 text-start ps-2 mb-2">Month</label>
                                <select class="form-select border-0" name="month" style="height: 55px;" required>
                                    <option selected disabled>Month</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        @isset($card)
                                            <option value="{{ $i }}"
                                                {{ $i == old('month', $card->month) ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @else
                                            <option value="{{ $i }}" {{ $i == old('month') ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endisset
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="text-dark w-100 text-start ps-2 mb-2">Year</label>
                                <select class="form-select border-0" name="year" style="height: 55px;" required>
                                    <option selected disabled>Year</option>
                                    @for ($i = 0; $i <= 10; $i++)
                                        @isset($card)
                                            <option value="{{ now()->year + $i }}"
                                                {{ now()->year + $i == old('year', $card->year) ? 'selected' : '' }}>
                                                {{ now()->year + $i }}</option>
                                        @else
                                            <option value="{{ now()->year + $i }}" {{ now()->year + $i == old('year') ? 'selected' : '' }}>
                                                {{ now()->year + $i }}</option>
                                        @endisset
                                    @endfor
                                </select>
                            </div>
                            <div class="form-check my-3 ms-2">
                                <input class="form-check-input" type="checkbox" value="save" id="saveInformation"
                                    name="saveInformation">
                                <label class="text-dark w-100 text-start ps-2 mb-2" for="saveInformation">
                                    Save Credit Card Information
                                </label>
                            </div>

                            <div class="col-12">
                                <input type="submit" class="btn btn-primary w-100 py-3" value="Pay">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
