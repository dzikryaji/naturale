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
                    <h3 class="mb-3">Credit Card Information</h3>
                    <form action="/checkout/payment" method="post">
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
