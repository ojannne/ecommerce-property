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
                    <p class="text-black-50 px-4">Masuk untuk mengakses akun Anda dan lanjutkan perjalanan bersama Dabelyuland.
    <strong>Ingin memasang properti?</strong> Silakan login atau daftar terlebih dahulu</span> untuk mulai memasarkan properti Anda dengan mudah dan cepat.</p>
                </div>
            </div>

            <!-- Right side - Register Form -->
            <!-- Right side - Register Form -->
            <div id="register"
                class="col-md-6 d-flex flex-column justify-content-center align-items-center right-side p-4">
                <div class="login-form-container">
                    <h1 class="mb-3 fw-bold">Sign Up</h1>               
                    <p class="text-muted mb-4">Pasang iklan hanya untuk pengguna terdaftar. Silakan login atau daftar terlebih dahulu.</p>

                    {{-- Flash / errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            @foreach ($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form id="registerForm" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your full name"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="Email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                                required>
                        </div>
                         <div class="mb-3">
                            <label for="registerEmail" class="form-label">No. Whatsapp</label>
                            <input type="text" class="form-control" id="nowa" name="nowa" value="{{ old('nowa') }}" placeholder="Contoh: 628xxxxxxxxx"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" 
                                placeholder="Create a password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                placeholder="Repeat your password" required>
                        </div>
                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                        <p class="text-muted text-center">Already have an account? <a href="{{ route('login') }}" class="text-hijau">Login</a></p>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
