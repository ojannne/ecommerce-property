<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dabelyuland</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!-- SEO Meta Tags -->
    <meta name="description" content="Jual beli properti terbaik - rumah, tanah, villa, dan bangunan di Indonesia." />
    <meta name="keywords" content="properti, rumah dijual, tanah dijual, villa, properti Indonesia, e-commerce" />
    <meta name="author" content="Dabelyuland" />
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Jual Beli Properti Terpercaya - Dabelyuland">
    <meta property="og:description" content="Temukan rumah impian, apartemen, dan properti terbaik hanya di Dabelyuland. Penawaran lengkap dan terpercaya.">
    <meta property="og:image" content="{{ asset('frontside/img/icon/dabelyuland.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Dabelyuland">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Jual Beli Properti Terpercaya - Dabelyuland">
    <meta name="twitter:description" content="Temukan rumah impian, apartemen, dan properti terbaik hanya di Dabelyuland.">
    <meta name="twitter:image" content="{{ asset('frontside/img/icon/dabelyuland.png') }}">

    <!-- Favicon -->
    <link href="{{ asset('frontside/img/icon/dabelyuland.png') }}" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontside/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontside/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontside/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontside/css/style.css') }}" rel="stylesheet" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>
<body>
    @include('frontside.layouts.header')
    @yield('content')
    @include('frontside.layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Hover Video Script (for Portfolio Page)
            const videoContainers = document.querySelectorAll('.hover-video');
            videoContainers.forEach(container => {
                const video = container.querySelector('.property-video');
                const thumbnail = container.querySelector('.property-thumbnail');
                if (video && thumbnail) {
                    container.addEventListener('mouseenter', () => {
                        thumbnail.style.display = 'none';
                        video.style.display = 'block';
                        video.play();
                    });
                    container.addEventListener('mouseleave', () => {
                        video.pause();
                        video.currentTime = 0;
                        video.style.display = 'none';
                        thumbnail.style.display = 'block';
                    });
                }
            });
    
            // Initialize Swiper for Social Media on About Page
            if (document.querySelector('.socialSwiper')) {
                const swiper = new Swiper('.socialSwiper', {
                    slidesPerView: 4,
                    spaceBetween: 20,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1.2,
                        },
                        576: {
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 4,
                        },
                    },
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>

