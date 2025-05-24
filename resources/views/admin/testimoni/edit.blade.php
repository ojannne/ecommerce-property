@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
  <div id="main">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Edit Testimoni</h2>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-2">
                                <a href="{{ route('testimonis.index') }}" class="btn btn-primary" style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Edit Testimoni</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('testimonis.update', $testimoni->id) }}" method="POST"
                                            enctype="multipart/form-data" class="form form-horizontal">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <div class="row">
                                                    <!-- Nama -->
                                                    <div class="col-md-2">
                                                        <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            name="nama" value="{{ old('nama', $testimoni->nama) }}"
                                                            placeholder="Masukkan Nama">
                                                        @error('nama')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Pekerjaan -->
                                                    <div class="col-md-2">
                                                        <label>Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="pekerjaan"
                                                            class="form-control @error('pekerjaan') is-invalid @enderror"
                                                            name="pekerjaan" value="{{ old('pekerjaan', $testimoni->pekerjaan) }}"
                                                            placeholder="Masukkan Pekerjaan">
                                                        @error('pekerjaan')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Testimoni -->
                                                    <div class="col-md-2">
                                                        <label>Testimoni</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <textarea id="testimoni" cols="30" rows="5"
                                                            class="form-control @error('testimoni') is-invalid @enderror"
                                                            name="testimoni" placeholder="Masukkan Testimoni">{{ old('testimoni', $testimoni->testimoni) }}</textarea>
                                                        @error('testimoni')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Foto Saat Ini -->
                                                    <div class="col-md-2">
                                                        <label>Foto Saat Ini</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        @if($testimoni->foto)
                                                            <img src="{{ asset('storage/' . $testimoni->foto) }}" alt="Foto Testimoni"
                                                                width="150" class="img-thumbnail mb-2">
                                                        @else
                                                            <p>Tidak ada foto</p>
                                                        @endif
                                                    </div>

                                                    <!-- Ganti Foto -->
                                                    <div class="col-md-2">
                                                        <label>Ganti Foto</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="file" id="foto" name="foto"
                                                            class="form-control @error('foto') is-invalid @enderror"
                                                            accept="image/*">
                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                                        @error('foto')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Submit and Reset Buttons -->
                                                    <div class="col-sm-12 d-flex justify-content-end mt-2">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-0" style="background-color: #0f636d; border-color: #0f636d;">Update</button>
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
