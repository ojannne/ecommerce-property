<!-- Info Bar -->
<div class="py-2 border-bottom">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <span class="small text-muted d-none d-md-inline">Paket Pemasaran Gratis untuk konsultasi</span>
        <div class="d-flex align-items-center gap-3 ms-auto">
            <span class="small text-muted">Ikuti Kami</span>
            <a href="https://www.youtube.com/@hardiwidyanto" target="_blank" class="text-muted">
                <img src="{{ asset('frontside/img/media/youtube_icon.png') }}" alt="YouTube" style="width: 24px; height: 24px" />
            </a>
            <a href="https://www.facebook.com/profile.php?id=61562823042702" target="_blank" class="text-muted">
                <img src="{{ asset('frontside/img/media/facebook_icon.png') }}" alt="Facebook" style="width: 24px; height: 24px" />
            </a>
            <a href="https://www.tiktok.com/@dabelyuland.indonesia?_t=ZS-8w6S74mJLGh&_r=1" target="_blank" class="text-muted">
                <img src="{{ asset('frontside/img/media/tiktok_icon.png') }}" alt="TikTok" style="width: 24px; height: 24px" />
            </a>
            <a href="https://www.instagram.com/hardi.widyanto/" target="_blank">
                <img src="{{ asset('frontside/img/media/instagram_icon.png') }}" alt="Instagram" style="width: 24px; height: 24px" />
            </a>
        </div>
    </div>
</div>

<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-hijau" style="width: 3rem; height: 3rem" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="{{ asset('frontside/img/icon/logo-green.svg') }}" alt="Icon" style="width: 50px; height: 50px" />
                </div>
                <h4 class="m-0 text-black">Dabelyuland</h4>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto align-items-center">
                    <div class="nav-item text-center d-lg-none mt-3 px-3">
                        <h6 class="fw-bold text-muted">Akun</h6>
                        <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center text-decoration-none">
                            <div class="d-flex align-items-center text-dark">
                                <i class="bi bi-person me-2"></i>
                                <span class="fw-semibold text-dark">Login / Register</span>
                            </div>
                        </a>
                    </div>
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('shop.index') }}" class="nav-item nav-link {{ request()->routeIs('shop.index') ? 'active' : '' }}">Properti</a>
                    <a href="{{ route('portfolio.index') }}" class="nav-item nav-link {{ request()->routeIs('portfolio.index') ? 'active' : '' }}">Portofolio</a>
                  {{-- Search Bar hanya tampil di halaman shop.index --}}
                @if (request()->routeIs('shop.index'))
                <div class="search-bar d-flex align-items-center p-2 rounded">
                    <i class="text-muted me-2"></i>
                    <input type="text" id="propertySearchInput" class="form-control border-0" placeholder="Lokasi, keyword, area, project, developer" />
                    <button class="btn more ms-2" id="searchButton">Cari</button>
                </div>
                @endif
                  <div class="nav-item ms-3">
                <a href="{{ route('login') }}" class="btn btn-jual-properti d-none d-lg-flex align-items-center">
                    <i class="bi bi-building me-2"></i> Jual Propertimu
                </a>
            </div>


                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->