@extends('user.layouts.app')
@section('style')
@endsection
@section('content')
    <div id="main">
        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="page-heading">
                        <h2>Edit Tanah</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-2">
                                    <a href="{{ route('user.lands.index') }}" class="btn btn-primary"
                                        style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Edit Tanah</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="{{ route('user.lands.update', $land->id) }}" method="POST"
                                                enctype="multipart/form-data" class="form form-horizontal">
                                                @csrf
                                                @method('PUT')
                                                <!-- Judul -->
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Judul</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <input type="text" name="judul"
                                                                class="form-control @error('judul') is-invalid @enderror"
                                                                value="{{ old('judul', $land->judul) }}">
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
                                                            <input type="text" name="harga"
                                                                class="form-control @error('harga') is-invalid @enderror"
                                                                placeholder="Contoh: Rp2.500.000.000"
                                                                value="{{ old('harga', $land->harga) }}">
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
                                                                value="{{ old('lokasi', $land->lokasi) }}">
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
                                                                value="{{ old('luas_tanah', $land->luas_tanah) }}">
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
                                                                <option value="tanah_kosong"
                                                                    {{ old('kategori', $land->kategori) == 'tanah_kosong' ? 'selected' : '' }}>
                                                                    Tanah Kosong
                                                                </option>
                                                                <option value="sawah"
                                                                    {{ old('kategori', $land->kategori) == 'sawah' ? 'selected' : '' }}>
                                                                    Sawah
                                                                </option>
                                                                <option value="kebun"
                                                                    {{ old('kategori', $land->kategori) == 'kebun' ? 'selected' : '' }}>
                                                                    Kebun
                                                                </option>
                                                                <option value="lainnya"
                                                                    {{ old('kategori', $land->kategori) == 'lainnya' ? 'selected' : '' }}>
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
                                                                <option value="tersedia"
                                                                    {{ old('status', $land->status) == 'tersedia' ? 'selected' : '' }}>
                                                                    Tersedia
                                                                </option>
                                                                <option value="disewa"
                                                                    {{ old('status', $land->status) == 'disewa' ? 'selected' : '' }}>
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
                                                            <textarea id="default" name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $land->deskripsi) }}</textarea>
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
                                                                value="{{ old('sertifikat', $land->sertifikat) }}">
                                                            @error('sertifikat')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- Gambar Lama -->
                                                    <div class="row mt-2">
                                                        <div class="col-md-2">
                                                            <label>Gambar Lama</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            @php
                                                                // Decode jika data tersimpan sebagai JSON string
                                                                $existingImages = is_string($land->gambar)
                                                                    ? json_decode($land->gambar, true)
                                                                    : $land->gambar ?? [];
                                                            @endphp
                                                            @if (!empty($existingImages) && is_array($existingImages))
                                                                <div class="row">
                                                                    @foreach ($existingImages as $key => $path)
                                                                        <div class="col-md-3 mb-2">
                                                                            <!-- Gunakan path yang benar -->
                                                                            <img src="{{ asset('storage/land_images/' . basename($path)) }}"
                                                                                alt="Gambar Tanah" width="100%"
                                                                                class="img-thumbnail">
                                                                            <!-- Checkbox hapus -->
                                                                            <label class="mt-1 d-block">
                                                                                <input type="checkbox"
                                                                                    name="hapus_gambar[]"
                                                                                    value="{{ $path }}"> Hapus
                                                                                gambar ini
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <p>Tidak ada gambar</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- Upload Gambar Baru -->
                                                    <div class="row mt-2">
                                                        <div class="col-md-2">
                                                            <label>Upload Gambar Baru</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <input type="file" name="gambar[]" multiple
                                                                accept="image/*"
                                                                class="form-control @error('gambar.*') is-invalid @enderror">
                                                            @error('gambar.*')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- Submit dan Reset -->
                                                    <div class="row mt-4">
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1 mb-0"
                                                                style="background-color: #0f636d; border-color: #0f636d;">
                                                                Simpan Perubahan
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
 <!-- TinyMCE for Description -->
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/plugins/code/plugin.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#default'
        });
    </script>
@endsection