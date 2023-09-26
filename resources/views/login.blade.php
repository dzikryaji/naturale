@extends('layout.main')
@section('container')
    <div class="row justify-content-center min-vh-50">
        <div class="col-md-5">
            <main class="form-signin mt-5 p-4 shadow">
                <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                <form class="w-100">
                    <div class="form-floating mt-4">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                    <div class="checkbox my-3">
                        <label>
                            <input type="checkbox" name="rememberme" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <p class="text-center mt-3 mb-0">or <a href="/register">Register</a></p>
            </main>
        </div>
    </div>
@endsection
