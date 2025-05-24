@extends('admin.layouts.app')
@section('content')
    <div id="main">
        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="page-heading">
                        <h2>Edit Pengguna</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-2">
                                    <a href="{{ route('user') }}" class="btn btn-primary" style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                                </div>
                                <form action="{{ route('updateuser', $user->id) }}" method="POST"
                                    class="form form-horizontal">
                                    @csrf
                                    @method('PUT')

                                    <!-- Name -->
                                    <div class="form-group row mb-2">
                                        <label class="col-md-2 col-form-label">Nama</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                                class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group row mb-2">
                                        <label class="col-md-2 col-form-label">Email</label>
                                        <div class="col-md-10">
                                            <input type="email" name="email"
                                                value="{{ old('email', $user->email) }}"
                                                class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group row mb-2">
                                        <label class="col-md-2 col-form-label">Password</label>
                                        <div class="col-md-10">
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Biarkan kosong jika tidak diubah">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group row mb-2">
                                        <label class="col-md-2 col-form-label">Konfirmasi Password</label>
                                        <div class="col-md-10">
                                            <input type="password" name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="Biarkan kosong jika tidak diubah">
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="form-group row mb-2">
                                        <label class="col-md-2 col-form-label">Alamat</label>
                                        <div class="col-md-10">
                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                                rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                                            @error('alamat')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="form-group row mt-3">
                                        <div class="col-md-12 text-end">
                                            <button type="submit" class="btn btn-primary" style="background-color: #0f636d; border-color: #0f636d;">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection