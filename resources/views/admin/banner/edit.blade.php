@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div id="main">
        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="page-heading">
                        <h2>Tambah Kategori</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-2 ">
                                    <a href="{{ route('banner.index') }}" class="btn btn-primary" style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Kategori</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            <form action="{{ route('banner.update', $banner->id) }}" method="POST"
                                                enctype="multipart/form-data" class="form form-horizontal">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-body">
                                                    <div class="row">

                                                        <!-- Gambar Banner -->
                                                        <div class="col-md-2">
                                                            <label>Gambar Banner</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <!-- Tampilkan gambar lama jika ada -->
                                                            @if ($banner->image)
                                                                <div class="mb-2">
                                                                    <img src="{{ asset('storage/' . $banner->image) }}"
                                                                        alt="Banner Image" width="150">
                                                                </div>
                                                            @else
                                                                <p>Tidak ada gambar saat ini.</p>
                                                            @endif

                                                            <!-- Input file untuk ganti gambar -->
                                                            <input type="file" id="image" name="image"
                                                                class="form-control @error('image') is-invalid @enderror"
                                                                accept="image/*">
                                                            <small class="text-muted">Kosongkan jika tidak ingin mengganti
                                                                gambar</small>

                                                            @error('image')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Status Aktif/Inaktif -->
                                                        <div class="col-md-2">
                                                            <label>Status</label>
                                                        </div>
                                                        <div class="col-md-10 form-group">
                                                            <select id="status" name="status"
                                                                class="form-select @error('status') is-invalid @enderror">
                                                                <option value="1"
                                                                    {{ old('status', $banner->status) ? 'selected' : '' }}>
                                                                    Aktif</option>
                                                                <option value="0"
                                                                    {{ old('status', !$banner->status) ? 'selected' : '' }}>
                                                                    Tidak Aktif</option>
                                                            </select>
                                                            @error('status')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Tombol Submit dan Reset -->
                                                        <div class="col-sm-12 d-flex justify-content-end mt-2">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-0" style="background-color: #0f636d; border-color: #0f636d;">Update</button>
                                                            <a href="{{ route('banner.index') }}"
                                                                class="btn btn-secondary me-1 mb-0">Batal</a>
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
