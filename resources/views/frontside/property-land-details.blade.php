@extends('frontside.layouts.app')

@section('content')
    <section class="container-xxl py-5 bg-light">
        <div class="container mt-5">
            <div class="row">
                <!-- Kolom Gambar -->
                <div class="col-lg-8">
                    <!-- Carousel -->
                    <div class="carousel slide mb-3 shadow-sm rounded overflow-hidden" id="propertyCarousel"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                // Decode jika gambar berupa JSON string
                                $existingImages = is_array($land->gambar)
                                    ? $land->gambar
                                    : json_decode($land->gambar, true) ?? [];
                            @endphp

                            @forelse ($existingImages as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image) }}" class="d-block w-100" alt="Gambar Properti">
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <img src="{{ asset('frontside/img/card/default.jpg') }}" class="d-block w-100"
                                        alt="Default Image">
                                </div>
                            @endforelse
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    <!-- Thumbnail Navigation -->
                    <div class="d-flex gap-2">
                        @forelse ($existingImages as $index => $image)
                            <img src="{{ asset($image) }}" class="img-thumbnail"
                                style="width: 80px; height: 60px; object-fit: cover; cursor: pointer;"
                                data-bs-target="#propertyCarousel" data-bs-slide-to="{{ $index }}">
                        @empty
                            <img src="{{ asset('frontside/img/card/default.jpg') }}" class="img-thumbnail"
                                style="width: 80px; height: 60px; object-fit: cover;">
                        @endforelse
                    </div>
                </div>

                <!-- Info Harga & Lokasi -->
                <div class="col-lg-4">
                    <div class="bg-white border rounded shadow-sm p-4 mb-4">
                        <h4 class="text-hijau fw-bold">Rp {{ number_format((int) $land->harga, 0, ',', '.') }}</h4>
                        <p class="text-muted">{{ $land->judul }}</p>
                        <ul class="list-unstyled small">
                            <li><i class="fa fa-map-marker-alt me-2 text-hijau"></i>Lokasi: {{ $land->lokasi }}</li>
                            <li><i class="fa fa-ruler-combined me-2 text-hijau"></i>Luas Bangunan:
                                {{ $land->luas_bangunan }} m²</li>
                            <li><i class="fa fa-bed me-2 text-hijau"></i>Kamar Tidur: {{ $land->jumlah_kamar_tidur }}</li>
                            <li><i class="fa fa-bath me-2 text-hijau"></i>Kamar Mandi: {{ $land->jumlah_kamar_mandi }}</li>
                            <li><i class="fa fa-home me-2 text-hijau"></i>Tipe Properti:
                                {{ ucfirst($land->tipe_bangunan) ?? 'Tidak Ada Tipe' }}</li>
                        </ul>
                        <button onclick="window.location='{{ route('contact') }}'" class="btn btn-success w-100"><i
                                class="fa fa-phone-alt me-2"></i>Hubungi Agen</button>
                    </div>
                </div>

                <!-- Deskripsi Properti -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="bg-white rounded shadow-sm p-4">
                            <h5 class="fw-bold text-black mb-2">Deskripsi</h5>
                            <p class="text-muted">
                                {!! htmlspecialchars_decode($land->deskripsi) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
