@extends('frontside.layouts.app')

@section('content')
    <!-- Area Banner -->
    {{-- <div class="container-fluid p-0">
        <div id="mainBanner" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="">
                        <img src="https://apollo.olx.co.id/v1/files/67aaecb07ad31-OLXAUTO/image;f=webp;s=2400x0"
                            class="d-block w-100" alt="Banner 1">
                    </a>
                </div>
                <div class="carousel-item">
                    <img src="https://apollo.olx.co.id/v1/files/67f7ce620fcef-OLXAUTO/image;f=webp;s=2400x0"
                        class="d-block w-100" alt="Banner 2">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainBanner" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainBanner" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div> --}}
    <!-- End Banner-->

    <div class="container-fluid py-4" style="background-color: #ffffff;">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <!-- FILTER HARGA BERDASARKAN KATEGORI -->
                    <div class="p-3 mb-4 border rounded bg-white">
                        <h5 class="mb-3 text-dark d-flex justify-content-between align-items-center toggle-dropdown"
                            data-target="#kategoriHarga" style="cursor: pointer;">
                            Kategori Harga
                            <i class="fa fa-chevron-down"></i>
                        </h5>
                        <div id="kategoriHarga" class="nav flex-column">
                            <a href="#" class="nav-link text-dark py-1 price-filter" data-min="0"
                                data-max="999999999999">• Semua Harga</a>
                            <a href="#" class="nav-link text-dark py-1 price-filter" data-min="0"
                                data-max="500000000">• Di bawah Rp 500 juta</a>
                            <a href="#" class="nav-link text-dark py-1 price-filter" data-min="500000001"
                                data-max="1000000000">• Rp 500 juta - Rp 1 miliar</a>
                            <a href="#" class="nav-link text-dark py-1 price-filter" data-min="1000000001"
                                data-max="2000000000">• Rp 1 miliar - Rp 2 miliar</a>
                            <a href="#" class="nav-link text-dark py-1 price-filter" data-min="2000000001"
                                data-max="999999999999">• Di atas Rp 2 miliar</a>
                        </div>
                    </div>

                    <!-- FILTER TIPE BANGUNAN -->
                    <div class="p-3 mb-4 border rounded bg-white">
                        <h5 class="mb-3 text-dark d-flex justify-content-between align-items-center toggle-dropdown"
                            data-target="#kategoriTipe" style="cursor: pointer;">
                            Jenis Properti
                            <i class="fa fa-chevron-down"></i>
                        </h5>
                        <div id="kategoriTipe" class="nav flex-column">
                            <a href="#" class="nav-link text-dark py-1 type-filter" data-type="all">• Semua Tipe</a>

                            @foreach ($propertyTypes as $type)
                                <a href="#" class="nav-link text-dark py-1 type-filter"
                                    data-type="{{ strtolower($type) }}">
                                    • {{ ucfirst($type) }}
                                </a>
                            @endforeach
                            <a href="#" class="nav-link text-dark py-1 type-filter" data-type="tanah">
                                • Tanah
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->

                <!-- Listing Area -->
                <div class="col-lg-9">
                    <div class="banner">
                        Sudah ada {{ $allProperties->count() }} Properti Lainnya di Dabelyuland.co.id
                    </div>

                    <!-- All Tab -->
                    <div id="tab-all" class="tab-pane fade show active p-0">
                        <div class="row g-4">
                            <!-- Card Properti: Loop -->
                            @foreach ($allProperties as $property)
                                <div class="col-lg-4 col-md-6 property-item"
                                    data-price="{{ is_a($property, 'App\Models\Building') ? $property->harga : $property->harga }}"
                                    data-type="{{ is_a($property, 'App\Models\Building') ? strtolower($property->tipe_bangunan) : 'tanah' }}">
                                    <div class="property-item-inner rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            @if (is_a($property, 'App\Models\Building'))
                                                <a
                                                    href="{{ route('shop.property-details', ['type' => 'building', 'id' => $property->id]) }}">
                                                @else
                                                    <a
                                                        href="{{ route('shop.property-details', ['type' => 'land', 'id' => $property->id]) }}">
                                            @endif
                                            @if (is_a($property, 'App\Models\Building'))
                                                @php
                                                    $images = is_array($property->gambar)
                                                        ? $property->gambar
                                                        : json_decode($property->gambar, true) ?? [];
                                                @endphp
                                                @if (!empty($images[0]))
                                                    <img class="img-fluid" src="{{ asset($images[0]) }}"
                                                        alt="{{ $property->judul }}" />
                                                @else
                                                    <img class="img-fluid"
                                                        src="{{ asset('frontside/img/default-property.jpg') }}"
                                                        alt="Tidak ada gambar tersedia" />
                                                @endif
                                            @else
                                                @php
                                                    // Jika $property adalah tanah (Land)
                                                    if (is_array($property->gambar)) {
                                                        $landImages = $property->gambar;
                                                    } else {
                                                        $landImages = json_decode($property->gambar, true) ?? [];
                                                    }
                                                @endphp
                                                @if (!empty($landImages[0]))
                                                    <img class="img-fluid" src="{{ asset($landImages[0]) }}"
                                                        alt="{{ $property->judul }}" />
                                                @else
                                                    <img class="img-fluid"
                                                        src="{{ asset('frontside/img/default-property.jpg') }}"
                                                        alt="Tidak ada gambar tersedia" />
                                                @endif
                                            @endif
                                            </a>
                                            <span
                                                class="badge bg-{{ $property->status == 'Dijual' ? 'success' : 'warning' }} position-absolute top-0 start-0 m-2">
                                                {{ $property->status }}
                                            </span>
                                            <div
                                                class="bg-white rounded-top text-hijau position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                {{ is_a($property, 'App\Models\Building') ? ucfirst($property->tipe_bangunan) : 'Tanah' }}
                                            </div>
                                        </div>

                                        <div class="p-4 pb-0">
                                            <h5 class="text-hijau mb-3">Rp
                                                {{ number_format((int) $property->harga, 0, ',', '.') }}</h5>

                                            @if (is_a($property, 'App\Models\Building'))
                                                <a class="d-block h5 mb-2"
                                                    href="{{ route('shop.property-details', ['type' => 'building', 'id' => $property->id]) }}">
                                                @else
                                                    <a class="d-block h5 mb-2"
                                                        href="{{ route('shop.property-details', ['type' => 'land', 'id' => $property->id]) }}">
                                            @endif
                                            {{ $property->judul }}
                                            </a>
                                            <p><i class="fa fa-map-marker-alt text-hijau me-2"></i>{{ $property->lokasi }}
                                            </p>
                                        </div>

                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2">
                                                <i class="fa fa-ruler-combined text-hijau me-2"></i>
                                                {{ is_a($property, 'App\Models\Building') ? $property->luas_bangunan : $property->luas_tanah }}
                                                m²
                                            </small>
                                            @if (is_a($property, 'App\Models\Building'))
                                                <small class="flex-fill text-center border-end py-2">
                                                    <i
                                                        class="fa fa-bed text-hijau me-2"></i>{{ $property->jumlah_kamar_tidur }}
                                                    Kamar Tidur
                                                </small>
                                                <small class="flex-fill text-center py-2">
                                                    <i
                                                        class="fa fa-bath text-hijau me-2"></i>{{ $property->jumlah_kamar_mandi }}
                                                    Kamar Mandi
                                                </small>
                                            @else
                                                <small class="flex-fill text-center border-end py-2">
                                                    <i class="fa fa-home text-hijau me-2"></i>Tanah Kosong
                                                </small>
                                                <small class="flex-fill text-center py-2 d-none d-sm-block">&nbsp;</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="text-center my-4">
                                <button id="load" class="btn btn-success">Muat lainnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let currentPage = 1;
        const totalPages = {{ $totalPages ?? 1 }};

        document.getElementById('load').addEventListener('click', function() {
            if (currentPage > totalPages) {
                this.style.display = 'none';
                return;
            }

            fetch(`/load-more-properties?page=${currentPage}`)
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.row.g-4').insertAdjacentHTML('beforeend', data);
                    currentPage++;
                });
        });
    </script>
@endsection
