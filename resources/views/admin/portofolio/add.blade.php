@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div id="main">
        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="page-heading">
                        <h2>Tambah Portofolio</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-2">
                                    <a href="{{ route('portofolios.index') }}" class="btn btn-primary"
                                        style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Tambah Properti</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="{{ route('portofolios.store') }}" method="POST"
                                                enctype="multipart/form-data" class="form form-horizontal">
                                                @csrf

                                                <div class="form-body">
                                                    <div class="row">

                                                        <!-- Judul -->
                                                        <div class="col-md-2">
                                                            <label>Judul</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <input type="text" id="judul"
                                                                class="form-control @error('judul') is-invalid @enderror"
                                                                name="judul" value="{{ old('judul') }}"
                                                                placeholder="Masukkan Judul">
                                                            @error('judul')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Gambar -->
                                                        <div class="col-md-2">
                                                            <label>Unggah Gambar</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <input type="file" name="gambar" id="gambar"
                                                                class="form-control @error('gambar') is-invalid @enderror"
                                                                accept="image/*">
                                                            @error('gambar')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Pemilik -->
                                                        <div class="col-md-2">
                                                            <label>Pemilik</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <input type="text" id="pemilik"
                                                                class="form-control @error('pemilik') is-invalid @enderror"
                                                                name="pemilik" value="{{ old('pemilik') }}"
                                                                placeholder="Masukkan Nama Pemilik">
                                                            @error('pemilik')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Alamat -->
                                                        <div class="col-md-2">
                                                            <label>Alamat</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <textarea id="alamat" name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror"
                                                                placeholder="Masukkan Alamat Lengkap">{{ old('alamat') }}</textarea>
                                                            @error('alamat')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Submit Button -->
                                                        <div class="col-sm-12 d-flex justify-content-end mt-2">
                                                            <button type="submit" class="btn btn-primary me-1 mb-0"
                                                                style="background-color: #0f636d; border-color: #0f636d;">Submit</button>
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
    <!-- TinyMCE for Description -->
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/plugins/code/plugin.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#default'
        });
    </script>

@endsection
