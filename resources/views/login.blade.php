@extends('layout.main')
@section('container')
    <div class="row justify-content-center min-vh-50">
        <div class="col-md-5">
            <main class="form-signin mt-5 p-4 shadow">
                <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                <form class="w-100" action="/login" method="POST">
                    @csrf
                    <div class="form-floating mt-4">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" required>
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating my-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <p class="text-center mt-3 mb-0">or <a href="/register">Register</a></p>
            </main>
        </div>
    </div>
@endsection
