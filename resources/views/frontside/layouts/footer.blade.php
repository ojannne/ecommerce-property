<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-4 d-flex align-items-center">
                    <img src="{{ asset('frontside/img/icon/logo-green.svg') }}" alt="Logo Dabelyuland" style="width: 50px; height: 50px" class="me-2" />
                    Dabelyuland.indonesia
                </h5>
                <p>
                    Dabelyuland adalah platform terpercaya untuk jual beli dan sewa properti, membantu Anda menemukan hunian impian dengan mudah.
                </p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h6 class="text-white mb-4">Tautan Cepat</h6>
                <a class="btn btn-link text-white-50" href="{{ url('/') }}">Beranda</a>
                <a class="btn btn-link text-white-50" href="{{ url('shop') }}">Semua Kategori</a>
                <a class="btn btn-link text-white-50" href="{{ url('about') }}">Tentang Kami</a>
                <a class="btn btn-link text-white-50" href="{{ url('contact') }}">Kontak Kami</a>
                <a class="btn btn-link text-white-50" href="{{ url('faq') }}">Bantuan & Dukungan</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h6 class="text-white mb-4">Hubungi kami</h6>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>
                    Tunggorono, Kecamatan Jombang,<br>
                    Kabupaten Jombang, Jawa Timur 61419
                </p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@dabelyuland.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt me-3"></i>0821-2727-7747</p>
            </div>
        </div>
        <div class="container mt-4 border-top pt-3">
            <div class="row">
                <div class="col-12 text-center">
                    <span class="text-white-50">© 2025 Dabelyuland. All rights reserved.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            576: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            992: { slidesPerView: 4 },
        },
    });
</script>
<script>
    var swiper = new Swiper(".blogSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            576: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            992: { slidesPerView: 4 },
        },
    });
</script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontside/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('frontside/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontside/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('frontside/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('frontside/js/main.js') }}"></script>