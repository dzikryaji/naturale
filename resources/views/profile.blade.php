@extends('layout.main')
@section('container')
    <section class="d-flex flex-column align-items-center justify-content-center vh-100 my-4">
        <div class="w-75 px-5">
            <h1 class="mb-4">Edit Profile</h1>
            <form action="/profile" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
                        value="{{ old('name', $user->name) }}">
                    @error('name')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                        value="{{ isset($address) ? old('address', $address->address) : old('address') }}">
                    @error('address')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="tel" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number"
                        value="{{ isset($address) ? old('contact_number', $address->contact_number) : old('contact_number') }}">
                    @error('contact_number')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="d-flex w-100 mb-3">
                    <div class="w-50 me-2">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                            value="{{ isset($address) ? old('city', $address->city) : old('city') }}">
                        @error('city')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="w-50 ms-2">
                        <label for="province" class="form-label">Province</label>
                        <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province"
                            value="{{ isset($address) ? old('province', $address->province) : old('province') }}">
                        @error('province')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="d-flex w-50 mb-3">
                    <div class="w-25 me-3">
                        <input type="button" class="btn btn-outline-primary w-100" id="clearBtn" value="Clear">
                    </div>
                    <div class="w-25">
                        <input type="submit" class="btn btn-primary w-100" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
