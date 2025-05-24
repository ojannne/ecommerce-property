@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
<div id="main">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Tambah Tanah</h2>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-2">
                                <a href="{{ route('lands.index') }}" class="btn btn-primary"
                                   style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Tambah Tanah</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('lands.store') }}" method="POST"
                                              enctype="multipart/form-data" class="form form-horizontal">
                                            @csrf

                                            <!-- Judul -->
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Judul</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" name="judul"
                                                               class="form-control @error('judul') is-invalid @enderror"
                                                               value="{{ old('judul') }}">
                                                        @error('judul')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Harga -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Harga</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="number" name="harga"
                                                               class="form-control @error('harga') is-invalid @enderror"
                                                               placeholder=""
                                                               value="{{ old('harga') }}">
                                                        @error('harga')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Lokasi -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Lokasi</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" name="lokasi"
                                                               class="form-control @error('lokasi') is-invalid @enderror"
                                                               value="{{ old('lokasi') }}">
                                                        @error('lokasi')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Luas Tanah -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Luas Tanah (m²)</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="number" step="0.01" name="luas_tanah"
                                                               class="form-control @error('luas_tanah') is-invalid @enderror"
                                                               value="{{ old('luas_tanah') }}">
                                                        @error('luas_tanah')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Kategori -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Kategori</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select name="kategori"
                                                                class="form-select @error('kategori') is-invalid @enderror">
                                                            <option value="">-- Pilih Kategori --</option>
                                                            <option value="tanah_kosong" {{ old('kategori') == 'tanah_kosong' ? 'selected' : '' }}>
                                                                Tanah Kosong
                                                            </option>
                                                            <option value="sawah" {{ old('kategori') == 'sawah' ? 'selected' : '' }}>
                                                                Sawah
                                                            </option>
                                                            <option value="kebun" {{ old('kategori') == 'kebun' ? 'selected' : '' }}>
                                                                Kebun
                                                            </option>
                                                            <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>
                                                                Lainnya
                                                            </option>
                                                        </select>
                                                        @error('kategori')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Status -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Status</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select name="status"
                                                                class="form-select @error('status') is-invalid @enderror">
                                                            <option value="tersedia" {{ old('status', 'tersedia') == 'tersedia' ? 'selected' : '' }}>
                                                                Tersedia
                                                            </option>
                                                            <option value="disewa" {{ old('status') == 'disewa' ? 'selected' : '' }}>
                                                                Disewa
                                                            </option>
                                                        </select>
                                                        @error('status')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Deskripsi -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Deskripsi</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <textarea id="default" name="deskripsi" rows="5"
                                                                  class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                                                        @error('deskripsi')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Sertifikat -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Sertifikat</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" name="sertifikat"
                                                               class="form-control @error('sertifikat') is-invalid @enderror"
                                                               value="{{ old('sertifikat') }}">
                                                        @error('sertifikat')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Gambar -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Gambar</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="file" name="gambar[]" multiple accept="image/*"
                                                               class="form-control @error('gambar.*') is-invalid @enderror">
                                                        @error('gambar.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Submit dan Reset -->
                                                <div class="row mt-4">
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                                class="btn btn-primary me-1 mb-0"
                                                                style="background-color: #0f636d; border-color: #0f636d;">
                                                            Simpan
                                                        </button>
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
    <!-- TinyMCE -->
    <!-- TinyMCE for Description -->
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/plugins/code/plugin.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#default'
        });
    </script>
    </script>
@endsection