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
                                <div class="mb-2 ">
                                    <a href="{{ route('portofolios.index') }}" class="btn btn-primary"
                                        style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Portofolio</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="{{ route('portofolios.update', $portofolio) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <!-- Judul -->
                                                <div class="mb-3">
                                                    <label for="judul" class="form-label">Judul</label>
                                                    <input type="text" name="judul" id="judul"
                                                        class="form-control @error('judul') is-invalid @enderror"
                                                        value="{{ old('judul', $portofolio->judul) }}">
                                                    @error('judul')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Gambar -->
                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">Gambar</label>
                                                    <input type="file" name="gambar" id="gambar"
                                                        class="form-control @error('gambar') is-invalid @enderror">
                                                    @if ($portofolio->gambar)
                                                        <img src="{{ asset('storage/' . $portofolio->gambar) }}"
                                                            alt="Gambar Portofolio" width="150" class="mt-2">
                                                    @endif
                                                    @error('gambar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Pemilik -->
                                                <div class="mb-3">
                                                    <label for="pemilik" class="form-label">Pemilik</label>
                                                    <input type="text" name="pemilik" id="pemilik"
                                                        class="form-control @error('pemilik') is-invalid @enderror"
                                                        value="{{ old('pemilik', $portofolio->pemilik) }}">
                                                    @error('pemilik')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Alamat -->
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat', $portofolio->alamat) }}</textarea>
                                                    @error('alamat')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endsection

    @section('script')
        <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/tinymce/plugins/code/plugin.min.js') }}"></script>
        <script>
            tinymce.init({
                selector: '#default'
            });
            tinymce.init({
                selector: '#dark',
                toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
                plugins: 'code'
            });
        </script>

        <script src="{{ asset('assets/js/main.js') }}"></script>
    @endsection
