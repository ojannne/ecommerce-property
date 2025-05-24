@extends('frontside.layouts.app')

@section('content')
    <!-- Bagian Portofolio Properti -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h1 class="mb-3">Selamat Datang di Portofolio Kami</h1>
                <p>
                    Dabelyuland Indonesia adalah perusahaan yang bergerak di bidang Design & Build, Property, Developer, dan Youtuber. Kami telah berkontribusi membangun lebih dari 50 titik di wilayah Jawa Timur, dan mendesain ratusan hunian dari penjuru nusantara. Dengan harga yang sangat terjangkau.
                </p>
            </div>

            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row text-center justify-content-center">
                        <!-- Box Statistik -->
                        <div class="col-md-4 mb-4 mb-md-0 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="icon-circle mb-2">
                                    <img src="{{ asset('frontside/img/icon/property.svg') }}" alt="Property Icon" style="width: 40px; height: 40px" />
                                </div>
                                <h5 class="fw-bold mb-0">200+</h5>
                                <p class="text-muted mb-0">Property</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4 mb-md-0 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="icon-circle mb-2">
                                    <img src="{{ asset('frontside/img/icon/design.png') }}" alt="Design Icon" style="width: 40px; height: 40px" />
                                </div>
                                <h5 class="fw-bold mb-0">250+</h5>
                                <p class="text-muted mb-0">Design</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex flex-column align-items-center">
                                <div class="icon-circle mb-2">
                                    <img src="{{ asset('frontside/img/icon/build.svg') }}" alt="Build Icon" style="width: 40px; height: 40px" />
                                </div>
                                <h5 class="fw-bold mb-0">60+</h5>
                                <p class="text-muted mb-0">Build</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Card Portfolio -->
            <div class="container mt-5">
                <div class="row g-4">
                    @forelse ($portofolios as $item)
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="property-item rounded overflow-hidden shadow-sm" style="cursor: pointer; font-size: 0.9rem;">
                                <!-- Thumbnail -->
                                <div class="position-relative" style="height: 300px; background: #000;">
                                    @if($item->gambar)
                                        <img class="img-fluid w-100 h-100"
                                             src="{{ asset('storage/' . $item->gambar) }}"
                                             alt="{{ $item->judul }}"
                                             style="object-fit: cover; object-position: center;">
                                    @else
                                        <img class="img-fluid w-100 h-100"
                                             src="{{ asset('frontside/img/default-property.jpg') }}"
                                             alt="Tidak Ada Gambar"
                                             style="object-fit: cover; object-position: center;">
                                    @endif
                                    <span class="badge bg-primary text-white position-absolute top-0 start-0 m-2">Terjual</span>
                                </div>

                                <!-- Content -->
                                <div class="p-3 bg-white">
                                    <h6 class="text-hijau mb-1">Tipe: {{ $item->judul }}</h6>
                                    <p class="mb-1">Pemilik: {{ $item->pemilik }}</p>
                                    <p class="text-muted mb-0" style="font-size: 0.85rem;">
                                        <i class="bi bi-geo-alt text-hijau me-1"></i>{{ $item->alamat }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">Belum ada data portofolio.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $portofolios->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.property-item');

    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'scale(1.02)';
            card.style.transition = 'transform 0.2s ease';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'scale(1)';
        });
    });
});
</script>

<style>
.property-item {
    transition: transform 0.2s ease;
}

.property-item:hover {
    transform: scale(1.02);
}

.property-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.2s ease;
}

.property-item:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.property-item .position-relative {
    height: 300px !important;
}
</style>
@endsection