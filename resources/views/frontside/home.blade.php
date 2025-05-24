@extends('frontside.layouts.app')

@section('content')
    <!-- Slider -->
    <div class="container-fluid p-0">
        <div id="mainBanner" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach ($banners as $key => $banner)
                    <button type="button" data-bs-target="#mainBanner" data-bs-slide-to="{{ $key }}"
                        {{ $key === 0 ? 'class=active aria-current=true' : '' }}
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                @foreach ($banners as $key => $banner)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <a href="{{ route('shop.index') }}">
                            <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100" alt="Banner Image">
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Navigation -->
            <button class="carousel-control-prev" type="button" data-bs-target="#mainBanner" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainBanner" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
    <!-- Slider End -->

    <!-- Features -->
    <div class="container py-4">
        <div class="row justify-content-center text-center g-3" id="fitur-nav">
            <div class="col-6 col-sm-4 col-md-2">
                <a href="{{ route('portfolio.index') }}" class="text-decoration-none text-dark">
                    <div class="fitur-item bg-white shadow-sm rounded p-3">
                        <img src="{{ asset('frontside/img/icon/portfolio.png') }}" alt="Portfolio kami"
                            style="width: 40px; height: 40px" class="mb-2" />
                        <p class="mb-0 small text-black">Portfolio kami</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <a href="{{ route('about') }}" class="text-decoration-none text-dark">
                    <div class="fitur-item bg-white shadow-sm rounded p-3">
                        <img src="{{ asset('frontside/img/icon/about.png') }}" alt="Tentang kami"
                            style="width: 40px; height: 40px" class="mb-2" />
                        <p class="mb-0 small text-black">Tentang kami</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <a href="{{ route('contact') }}" class="text-decoration-none text-dark">
                    <div class="fitur-item bg-white shadow-sm rounded p-3">
                        <img src="{{ asset('frontside/img/icon/kontak.png') }}" alt="Hubungi Kami"
                            style="width: 40px; height: 40px" class="mb-2" />
                        <p class="mb-0 small text-black">Hubungi Kami</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Properties Carousel -->
    <div class="container py-2 px-lg-5 px-md-4 px-3">
        <h5 class="mb-0">Selengkapnya tentang properti</h5>
    </div>
    <div class="container px-4 px-md-5 mb-2">
        <small class="text-muted">👉 Geser ke kanan untuk melihat lebih banyak properti</small>
    </div>

    <div class="swiper mySwiper py-2 px-lg-5 px-md-4 px-3">
        <div class="swiper-wrapper">

            @if ($buildings->count() > 0)
                @foreach ($buildings as $property)
                    <div class="swiper-slide property-slide">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{ route('home.property-details', $property->id) }}">
                                    @if (!empty($property->gambar) && is_array($property->gambar))
                                        @if (isset($property->gambar[0]))
                                            <img src="{{ asset($property->gambar[0]) }}" alt="Gambar" width="50">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </a>
                                <span
                                    class="badge bg-success position-absolute top-0 start-0 m-2">{{ $property->status }}</span>
                                <div
                                    class="bg-white rounded-top text-hijau position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                    {{ ucfirst($property->tipe_bangunan) ?? 'Tidak Ada Tipe' }}
                                </div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-hijau mb-3">
                                    Rp.{{ number_format((float) str_replace(['Rp', '.', ' '], '', $property->harga), 0, ',', '.') }}
                                </h5>
                                <a class="d-block h5 mb-2" href="{{ route('home.property-details', $property->id) }}">
                                    {{ $property->judul }}
                                </a>
                                <p>
                                    <i class="fa fa-map-marker-alt text-hijau me-2"></i>
                                    {{ $property->lokasi }}
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-ruler-combined text-hijau me-2"></i>
                                    {{ $property->luas_bangunan }} m²
                                </small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-bed text-hijau me-2"></i>
                                    {{ $property->jumlah_kamar_tidur }} Kamar Tidur
                                </small>
                                <small class="flex-fill text-center py-2">
                                    <i class="fa fa-bath text-hijau me-2"></i>
                                    {{ $property->jumlah_kamar_mandi }} Kamar Mandi
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Slide: Lihat Properti Lainnya -->
                <div class="swiper-slide property-slide">
                    <div class="property-item rounded overflow-hidden">
                        <a href="{{ route('shop.index') }}" class="position-relative d-block" style="height: 100%">
                            <img src="{{ asset('frontside/img/img-more.png') }}" alt="Lihat Selengkapnya"
                                class="w-100 h-100" style="object-fit: cover;" />
                            <div
                                class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-50 text-white text-center py-2">
                                Lihat Properti Lainnya
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="swiper-button-next"
                    style="color: #28a745; background: white; padding: 30px; border-radius: 50%; box-shadow: 0 2px 5px rgba(0,0,0,0.15);">
                </div>
                <div class="swiper-button-prev"
                    style="color: #28a745; background: white; padding: 30px; border-radius: 50%; box-shadow: 0 2px 5px rgba(0,0,0,0.15);">
                </div>
            @else
                <div class="alert alert-info text-center w-100">
                    Tidak ada properti
                </div>
            @endif

        </div>
    </div>
    <!-- Recommended Properties -->
    <div class="container mt-5 py-2 px-lg-5 px-md-4 px-3">
        <div class="row g-4 align-items-end">
            <div class="col-12 col-lg-6">
                <div class="text-start mx-auto mb-4 wow fadeIn" data-wow-delay="0.1s">
                    <h4 class="mt-4">Rekomendasi Baru</h4>
                    <p class="text-muted mb-4">
                        Dapatkan informasi terbaru tentang properti yang baru saja ditambahkan ke daftar kami.
                    </p>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-all" class="tab-pane fade show active p-0">
                <div class="row g-4">
                    @if (isset($rekomendasi) && $rekomendasi->isNotEmpty())
                        @foreach ($rekomendasi->take(6) as $val)
                            <div class="col-lg-4 col-md-6">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <!-- Link Detail Properti -->
                                        <a href="{{ route('home.property-details', $val->id) }}">
                                            @if (!empty($val->gambar) && is_array($val->gambar))
                                                @if (isset($val->gambar[0]))
                                                    <img src="{{ asset($val->gambar[0]) }}" alt="{{ $val->judul }}"
                                                        class="img-fluid"
                                                        style="width: 100%; height: 250px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">Tidak ada</span>
                                                @endif
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </a>

                                        <!-- Status Properti -->
                                        <span class="badge bg-success position-absolute top-0 start-0 m-2">
                                            {{ $val->status }}
                                        </span>

                                        <!-- Highlight Icon (OLX Style) -->
                                        <div class="position-absolute end-0 top-0 m-2">
                                            <img src="https://statics.olx.co.id/olxid/seller/highlights.svg "
                                                alt="Verified" />
                                        </div>

                                        <!-- Jenis Properti -->
                                        <div
                                            class="bg-white rounded-top text-hijau position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ ucfirst($val->tipe_bangunan) ?? 'Tidak Ada Tipe' }}
                                        </div>
                                    </div>

                                    <!-- Informasi Harga & Lokasi -->
                                    <div class="p-4 pb-0">
                                        <h5 class="text-hijau mb-3">Rp {{ number_format((int) $val->harga, 0, ',', '.') }}
                                        </h5>
                                        <a class="d-block h5 mb-2" href="{{ route('home.property-details', $val->id) }}">
                                            {{ $val->judul }}
                                        </a>
                                        <p>
                                            <i class="fa fa-map-marker-alt text-hijau me-2"></i>
                                            {{ $val->lokasi }}
                                        </p>
                                    </div>

                                    <!-- Fasilitas: Luas, Kamar Tidur, Kamar Mandi -->
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-ruler-combined text-hijau me-2"></i>
                                            {{ $val->luas_bangunan }} m²
                                        </small>
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-bed text-hijau me-2"></i>
                                            {{ $val->jumlah_kamar_tidur }} Kamar Tidur
                                        </small>
                                        <small class="flex-fill text-center py-2">
                                            <i class="fa fa-bath text-hijau me-2"></i>
                                            {{ $val->jumlah_kamar_mandi }} Kamar Mandi
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($rekomendasi->count() > 6)
                            <div class="col-12 text-center mt-4">
                                <a href="{{ route('shop.index') }}" class="btn btn-primary">Lihat Semua Properti</a>
                            </div>
                        @endif
                    @else
                        <div class="col-12 text-center py-4">
                            <p>Data properti belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px">
                <h1 class="mb-3">Apa Kata Klien Kami?</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @if (isset($testimonis) && $testimonis->count() > 0)
                    @foreach ($testimonis as $testimoni)
                        <!-- Testimonial Item -->
                        <div class="testimonial-item rounded p-3">
                            <div class="bg-white border rounded p-4">
                                <p>{{ $testimoni->testimoni }}</p>
                                <div class="d-flex align-items-center">
                                    <!-- Foto Testimoni -->
                                    @if ($testimoni->foto)
                                        <img src="{{ asset('storage/' . $testimoni->foto) }}"
                                            alt="{{ $testimoni->nama }}" class="img-fluid flex-shrink-0 rounded"
                                            style="width: 45px; height: 45px;">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif

                                    <!-- Nama dan Pekerjaan -->
                                    <div class="ps-3">
                                        <h6 class="fw-bold mb-0">{{ $testimoni->nama }}</h6>
                                        <small class="text-muted">{{ $testimoni->pekerjaan }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Jika tidak ada testimoni -->
                    <div class="text-center text-muted p-4">
                        Data testimoni tidak ditemukan.
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Area Berita -->
    <section class="container my-5">
        <div class="d-flex align-items-center mb-4">
            <img class="img-fluid" src="{{ asset('frontside/img/icon/logo-green.svg') }}" alt="Icon"
                style="width: 50px; height: 50px" />
            <h4 class="ms-2 mb-0 fw-bold">Dabelyuland.NEWS</h4>
        </div>
        <div class="swiper blogSwiper">
            <div class="swiper-wrapper">
                @foreach ([
            [
                'url' => 'https://beritakini.co/news/7-tips-agar-tidak-tertipu-saat-membeli-rumah-dari-developer/index.html',
                'image' => 'https://beritakini.co/files/images/archives/20181114-wvrlncg3vf3swyrm9jp8.jpg',
                'category' => 'Tips Membeli',
                'title' => '7 Tips Membeli Rumah Pertama Agar Tidak Tertipu Developer',
            ],
            [
                'url' => 'https://www.99.co/blog/indonesia/alasan-investasi-properti-masih-menjanjikan/',
                'image' => 'property-3.jpg',
                'category' => 'Investasi',
                'title' => 'Mengapa Properti Masih Jadi Pilihan Investasi Terbaik di 2025?',
            ],
            [
                'url' => 'https://www.lamudi.co.id/journal/investasi-properti-masih-menjanjikan/',
                'image' => 'property-4.jpg',
                'category' => 'Investasi',
                'title' => 'Mengapa Properti Masih Jadi Pilihan Investasi Terbaik di 2025?',
            ],
            [
                'url' => 'https://www.lamudi.co.id/journal/investasi-properti-masih-menjanjikan/',
                'image' => 'property-4.jpg',
                'category' => 'Investasi',
                'title' => 'Mengapa Properti Masih Jadi Pilihan Investasi Terbaik di 2025?',
            ],
            [
                'url' => 'https://www.rumah.com/panduan-properti/tips-renovasi-rumah-minimalis-41799',
                'image' => 'property-5.jpg',
                'category' => 'Renovasi',
                'title' => '5 Trik Renovasi Rumah Minimalis Tanpa Boros Budget',
            ],
        ] as $article)
                    <div class="swiper-slide">
                        <a href="{{ $article['url'] }}" target="_blank" class="text-decoration-none">
                            <div class="card border-0 shadow-sm wow fadeInUp hover-card" data-wow-delay="0.1s">
                                <img src="{{ str_contains($article['image'], 'http') ? $article['image'] : asset('frontside/img/card/' . $article['image']) }}"
                                    class="card-img-top" alt="{{ $article['title'] }}" />
                                <div class="card-body">
                                    <span
                                        class="badge bg-{{ $article['category'] == 'Tips Membeli' ? 'primary' : ($article['category'] == 'Investasi' ? 'success' : 'warning') }} mb-2">{{ $article['category'] }}</span>
                                    <h5 class="card-title text-dark">{{ $article['title'] }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination mb-3"></div>
        </div>
        <style>
            .hover-card {
                transition: transform 0.3s ease;
            }

            .hover-card:hover {
                transform: translateY(-10px);
            }
        </style>
    </section>
@endsection
