@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
<div id="main">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Tambah Bangunan</h2>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-2">
                                <a href="{{ route('buildings.index') }}" class="btn btn-primary" style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Bangunan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <form action="{{ route('buildings.store') }}" method="POST"
                                            enctype="multipart/form-data" class="form form-horizontal">
                                            @csrf

                                            <!-- Judul -->
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Judul</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="judul" name="judul"
                                                            class="form-control @error('judul') is-invalid @enderror"
                                                            placeholder="Masukkan judul bangunan" value="{{ old('judul') }}">
                                                        @error('judul')
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
                                                        <textarea id="default" name="deskripsi" rows="10"
                                                            class="form-control @error('deskripsi') is-invalid @enderror"
                                                            placeholder="Masukkan deskripsi bangunan">{{ old('deskripsi') }}</textarea>
                                                        @error('deskripsi')
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
                                                        <input type="number" id="harga" name="harga"
                                                            class="form-control @error('harga') is-invalid @enderror"
                                                            placeholder="" value="{{ old('harga') }}">
                                                        @error('harga')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Luas Tanah & Bangunan -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Luas</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" name="luas_tanah" id="luas_tanah"
                                                            class="form-control @error('luas_tanah') is-invalid @enderror"
                                                            placeholder="Luas Tanah (m²)" value="{{ old('luas_tanah') }}">
                                                        @error('luas_tanah')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" name="luas_bangunan" id="luas_bangunan"
                                                            class="form-control @error('luas_bangunan') is-invalid @enderror"
                                                            placeholder="Luas Bangunan (m²)" value="{{ old('luas_bangunan') }}">
                                                        @error('luas_bangunan')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Kamar Tidur & Mandi -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Kamar</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="number" name="jumlah_kamar_tidur" min="0"
                                                            class="form-control" placeholder="Jumlah Kamar Tidur"
                                                            value="">
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="number" name="jumlah_kamar_mandi" min="0"
                                                            class="form-control" placeholder="Jumlah Kamar Mandi"
                                                            value="">
                                                    </div>
                                                </div>

                                                <!-- Lokasi -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Lokasi</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="lokasi" name="lokasi"
                                                            class="form-control @error('lokasi') is-invalid @enderror"
                                                            placeholder="Masukkan lokasi bangunan" value="{{ old('lokasi') }}">
                                                        @error('lokasi')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Tipe Bangunan -->
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Tipe Bangunan</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select id="tipe_bangunan" name="tipe_bangunan"
                                                            class="form-select @error('tipe_bangunan') is-invalid @enderror">
                                                            <option value="">-- Pilih Tipe --</option>
                                                            <option value="rumah" {{ old('tipe_bangunan') == 'rumah' ? 'selected' : '' }}>Rumah</option>
                                                            <option value="apartemen" {{ old('tipe_bangunan') == 'apartemen' ? 'selected' : '' }}>Apartemen</option>
                                                            <option value="ruko" {{ old('tipe_bangunan') == 'ruko' ? 'selected' : '' }}>Ruko</option>
                                                            <option value="kantor" {{ old('tipe_bangunan') == 'kantor' ? 'selected' : '' }}>Kantor</option>
                                                            <option value="gudang" {{ old('tipe_bangunan') == 'gudang' ? 'selected' : '' }}>Gudang</option>
                                                        </select>
                                                        @error('tipe_bangunan')
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
                                                        <select id="status" name="status"
                                                            class="form-select @error('status') is-invalid @enderror">
                                                            <option value="Dijual" {{ old('status') == 'Dijual' ? 'selected' : '' }}>Dijual</option>
                                                            <option value="Disewa" {{ old('status') == 'Disewa' ? 'selected' : '' }}>Disewa</option>
                                                        </select>
                                                        @error('status')
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
                                                        <input type="file" id="gambar" name="gambar[]"
                                                            class="form-control @error('gambar.*') is-invalid @enderror"
                                                            multiple accept="image/*">
                                                        @error('gambar')
                                                        <div class="text-danger">{{ $message }}</div>
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
@endsection