@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
<div id="main">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Tambah Testimoni</h2>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-2">
                                <a href="{{ route('testimonis.index') }}" class="btn btn-primary" style="background-color: #0f636d; border-color: #0f636d;">Kembali</a>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Tambah Testimoni</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('testimonis.store') }}" method="POST"
                                            enctype="multipart/form-data" class="form form-horizontal">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <!-- Nama -->
                                                    <div class="col-md-2">
                                                        <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            name="nama" value="{{ old('nama') }}"
                                                            placeholder="Masukkan Nama">
                                                        @error('nama')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Pekerjaan -->
                                                    <div class="col-md-2">
                                                        <label>Pekerjaan / Jabatan</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="pekerjaan"
                                                            class="form-control @error('pekerjaan') is-invalid @enderror"
                                                            name="pekerjaan" value="{{ old('pekerjaan') }}"
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
                                                            name="testimoni" placeholder="Masukkan Testimoni">{{ old('testimoni') }}</textarea>
                                                        @error('testimoni')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Foto -->
                                                    <div class="col-md-2">
                                                        <label>Foto</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="file" id="foto" name="foto"
                                                            class="form-control @error('foto') is-invalid @enderror"
                                                            accept="image/*">
                                                        @error('foto')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Submit and Reset Buttons -->
                                                    <div class="col-sm-12 d-flex justify-content-end mt-2">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-0" style="background-color: #0f636d; border-color: #0f636d;">Submit</button>
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
    <!-- TinyMCE for Description -->
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/plugins/code/plugin.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#default'
        });
    </script>

    <!-- JavaScript for Dynamic Dropdowns -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinceSelect = document.getElementById('province');
            const citySelect = document.getElementById('city');
            const kecamatanSelect = document.getElementById('kecamatan');
            const addressInput = document.getElementById('address');

            // Fetch data provinsi
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                .then(response => response.json())
                .then(data => {
                    data.forEach(province => {
                        const option = document.createElement('option');
                        option.value = province.id;
                        option.textContent = province.name;
                        provinceSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching provinces:', error));

            // Event listener untuk perubahan provinsi
            provinceSelect.addEventListener('change', function() {
                const provinceId = this.value;
                // Kosongkan dropdown kota dan kecamatan
                citySelect.innerHTML = '<option value="" disabled selected>Pilih Kota</option>';
                kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';
                addressInput.value = '';
                if (provinceId) {
                    // Fetch data kota berdasarkan ID provinsi
                    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city.id;
                                option.textContent = city.name;
                                citySelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error fetching cities:', error));
                }
            });

            // Event listener untuk perubahan kota
            citySelect.addEventListener('change', function() {
                const cityId = this.value;
                // Kosongkan dropdown kecamatan
                kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';
                addressInput.value = '';
                if (cityId) {
                    // Fetch data kecamatan berdasarkan ID kota
                    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${cityId}.json`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(district => {
                                const option = document.createElement('option');
                                option.value = district.id;
                                option.textContent = district.name;
                                kecamatanSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error fetching districts:', error));
                }
            });

            // Fungsi untuk memperbarui alamat lengkap
            function updateAddress() {
                const province = provinceSelect.options[provinceSelect.selectedIndex]?.text || '';
                const city = citySelect.options[citySelect.selectedIndex]?.text || '';
                const kecamatan = kecamatanSelect.options[kecamatanSelect.selectedIndex]?.text || '';
                if (province && city && kecamatan) {
                    addressInput.value = `${province}, ${city}, ${kecamatan}`;
                } else if (province && city) {
                    addressInput.value = `${province}, ${city}`;
                } else {
                    addressInput.value = '';
                }
            }

            // Deteksi perubahan pada dropdown kecamatan
            kecamatanSelect.addEventListener('change', function() {
                updateAddress();
            });

            // Deteksi perubahan pada dropdown kota
            citySelect.addEventListener('change', function() {
                updateAddress();
            });

            // Deteksi perubahan pada dropdown provinsi
            provinceSelect.addEventListener('change', function() {
                updateAddress();
            });
        });
    </script>

    <!-- Validasi Form Sebelum Submit -->
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const kecamatanSelect = document.getElementById('kecamatan');
            if (!kecamatanSelect.value) {
                event.preventDefault(); // Mencegah form disubmit
                alert('Silakan pilih Kecamatan.');
            }
        });
    </script>
@endsection
