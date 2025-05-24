@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <div id="main">
        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="page-heading">
                        <h2>Registrasi Pengguna</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-2">
                                    <a href="{{ route('user') }}" class="btn btn-primary" style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Registrasi Pengguna</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="{{ route('register') }}" method="POST"
                                                class="form form-horizontal">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- Name -->
                                                        <div class="col-md-2">
                                                            <label>Username</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <input type="text" id="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" value="{{ old('name') }}"
                                                                placeholder="Masukkan Username">
                                                            @error('name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="col-md-2">
                                                            <label>Email</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <input type="email" id="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}"
                                                                placeholder="Masukkan Email">
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Password -->
                                                        <div class="col-md-2">
                                                            <label>Password</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <input type="password" id="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" placeholder="Masukkan Password">
                                                            @error('password')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Confirm Password -->
                                                        <div class="col-md-2">
                                                            <label>Konfirmasi Password</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <input type="password" id="password_confirmation"
                                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                name="password_confirmation"
                                                                placeholder="Konfirmasi Password">
                                                            @error('password_confirmation')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- Address -->
                                                        <div class="col-md-2">
                                                            <label>Alamat</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                                                placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>
                                                            @error('alamat')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Submit and Reset Buttons -->
                                                        <div class="col-sm-12 d-flex justify-content-end mt-2">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-0" style="background-color: #0f636d; border-color: #0f636d;">Daftar</button>
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-0">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <!-- Validasi Form Sebelum Submit -->
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;

            if (password !== confirmPassword) {
                event.preventDefault(); // Mencegah form disubmit
                alert('Password dan Konfirmasi Password tidak cocok.');
            }
        });
    </script>
@endsection
