@extends('admin.layouts.app')

@section('style')
    <!-- Tambahkan style tambahan di sini jika ada -->
@endsection

@section('content')
<div id="main">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Tambah Kontak</h2>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <!-- Back Button -->
                            <div class="mb-3">
                                <a href="{{ route('contacts.index') }}" class="btn btn-primary"
                                   style="background-color: #0f636d; border-color: #0f636d;">
                                    Kembali
                                </a>
                            </div>

                            <!-- Form Kontak -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Kontak</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <form action="{{ route('contacts.store') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <!-- Nama -->
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" name="nama" id="nama"
                                                       class="form-control @error('nama') is-invalid @enderror"
                                                       value="{{ old('nama') }}" placeholder="Masukkan nama">
                                                @error('nama')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Jabatan -->
                                            <div class="mb-3">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <input type="text" name="jabatan" id="jabatan"
                                                       class="form-control @error('jabatan') is-invalid @enderror"
                                                       value="{{ old('jabatan') }}" placeholder="Contoh: Marketing">
                                                @error('jabatan')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" id="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       value="{{ old('email') }}" placeholder="Masukkan email">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- No WhatsApp -->
                                            <div class="mb-3">
                                                <label for="nowa" class="form-label">No WhatsApp</label>
                                                <input type="text" name="nowa" id="nowa"
                                                       class="form-control @error('nowa') is-invalid @enderror"
                                                       value="{{ old('nowa') }}" placeholder="Contoh: 62812xxxxxx">
                                                @error('nowa')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Foto -->
                                            <div class="mb-3">
                                                <label for="foto" class="form-label">Foto</label>
                                                <input type="file" name="foto" id="foto"
                                                       class="form-control @error('foto') is-invalid @enderror"
                                                       accept="image/*">
                                                @error('foto')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="d-flex justify-content-end mt-4">
                                                <button type="submit" class="btn btn-primary"
                                                        style="background-color: #0f636d; border-color: #0f636d;">
                                                    Simpan
                                                </button>
                                            </div>

                                        </form>

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
    <!-- Script tambahan bisa ditambahkan di sini -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection