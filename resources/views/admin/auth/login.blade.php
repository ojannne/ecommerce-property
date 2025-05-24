@extends('frontside.layouts.app')

@section('content')
    <div class="container-fluid min-vh-100">
        <div class="row min-vh-100">
            <!-- Left side - Blue background with image -->
            <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center left-side">
                <div class="text-center">
                    <img src="{{ asset('frontside/img/icon/logo-green.svg') }}" alt="Login Illustration" class="img-fluid mb-4"
                        style="max-width: 350px;">
                    <h2 class="text-black fw-bold">Welcome To Dabelyuland</h2>
                    <p class="text-black-50 px-4"> Masuk untuk mengakses akun Anda dan lanjutkan perjalanan bersama Dabelyuland.
    <strong>Ingin memasang properti?</strong> Silakan login atau daftar terlebih dahulu</span> untuk mulai memasarkan properti Anda dengan mudah dan cepat.</p>
                </div>
            </div>

            <!-- Right side - Login Form -->
            <div id="login"
                class="col-md-6 d-flex flex-column justify-content-center align-items-center right-side p-4">
                <div class="login-form-container">
                    <h1 class="mb-4 fw-bold"></h1>
                    <p class="text-muted mb-4">Pasang iklan hanya untuk pengguna terdaftar. Silakan login atau daftar terlebih dahulu.</p>

                    @include('admin.layouts.message')
                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            @foreach ($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form id="authForm"  action="{{ route('login') }}" method="POST">
                            @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Username"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Enter your password"
                                required>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>

                        {{-- <div class="mb-4 text-end">
          <a href="#" class="forgot-password" id="forgotPasswordTrigger">Forgot password?</a>
        </div> --}}

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg" id="formSubmitBtn">Login</button>
                        </div>

                        <!-- Link ke halaman register -->
                        <p class="text-muted text-center" >
                            Don’t have an account? <a href="{{ route('register') }}" class="text-hijau" >Daftar</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
