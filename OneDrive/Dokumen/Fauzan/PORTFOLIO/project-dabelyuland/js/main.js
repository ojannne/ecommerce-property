(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.nav-bar').addClass('sticky-top');
        } else {
            $('.nav-bar').removeClass('sticky-top');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 24,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            992:{
                items:2
            }
        }
    });
    
})(jQuery);

// javascript index
document.addEventListener("DOMContentLoaded", function () {
    // === OWL CAROUSEL ===
    if ($('.promo-carousel').length) {
      $('.promo-carousel').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        dots: true
      });
    }
  
    if ($('.mobil-list').length) {
      $('.mobil-list').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
          0: { items: 1 },
          600: { items: 2 },
          1000: { items: 4 }
        }
      });
    }
  
    // === FITUR BUTTON FILTER (untuk .property-slide) ===
    document.querySelectorAll('.fitur-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        document.querySelectorAll('.fitur-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const filter = this.getAttribute('data-filter');
        document.querySelectorAll('.property-slide').forEach(slide => {
          slide.style.display = slide.classList.contains(filter) ? 'block' : 'none';
        });
      });
    });
  
    // === FITUR ITEM FILTER (carousel/swiper logic bisa ditambah) ===
    document.querySelectorAll('.fitur-item').forEach(btn => {
      btn.addEventListener('click', function () {
        document.querySelectorAll('.fitur-item').forEach(el => el.classList.remove('active'));
        this.classList.add('active');
  
        const filter = this.getAttribute('data-filter');
        // Placeholder untuk filter Swiper atau lainnya
      });
    });
  
    // === SWIPER FILTER ===
    const fiturItems = document.querySelectorAll(".fitur-item");
    const slides = document.querySelectorAll(".swiper-slide");
  
    fiturItems.forEach(item => {
      item.addEventListener("click", () => {
        fiturItems.forEach(i => i.classList.remove("active"));
        item.classList.add("active");
  
        const filter = item.getAttribute("data-filter");
  
        slides.forEach(slide => {
          slide.style.display = slide.classList.contains(filter) ? "block" : "none";
        });
      });
    });
  
    // Trigger default aktif
    const defaultActive = document.querySelector(".fitur-item.active");
    if (defaultActive) defaultActive.click();
  
    // === INISIALISASI SWIPER ===
    const swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 40
        }
      }
    });
  
    // === LISTING BARU FILTER ===
    const contentItems = document.querySelectorAll('.content-item');
  
    fiturItems.forEach(item => {
      item.addEventListener('click', () => {
        const filter = item.getAttribute('data-filter');
        contentItems.forEach(content => {
          content.classList.add('d-none');
          if (content.getAttribute('data-category') === filter) {
            content.classList.remove('d-none');
          }
        });
      });
    });
  });
  

//  javascript shop
// Tunggu sampai semua elemen DOM selesai dimuat
document.addEventListener("DOMContentLoaded", function () {

    // ===============================
    // TOGGLE DROPDOWN KATEGORI
    // ===============================
    // Fungsi: Saat tombol dengan class 'toggle-dropdown' diklik,
    // akan menampilkan atau menyembunyikan elemen target (dropdown kategori),
    // dan mengganti ikon dari chevron-down ke chevron-up, atau sebaliknya.
    document.querySelectorAll('.toggle-dropdown').forEach(toggle => {
      toggle.addEventListener('click', function () {
        const targetId = this.getAttribute('data-target'); // Ambil id target dari atribut data-target
        const targetEl = document.querySelector(targetId); // Temukan elemen tujuan
        const icon = this.querySelector('i');              // Cari ikon di dalam tombol toggle
  
        // Tampilkan/sembunyikan dropdown sesuai status sekarang
        if (targetEl.style.display === "none" || targetEl.classList.contains('d-none')) {
          targetEl.style.display = "block";                // Tampilkan elemen
          targetEl.classList.remove('d-none');             // Hapus class d-none jika ada
          icon.classList.remove("fa-chevron-down");        // Ganti ikon ke atas
          icon.classList.add("fa-chevron-up");
        } else {
          targetEl.style.display = "none";                 // Sembunyikan elemen
          icon.classList.remove("fa-chevron-up");          // Ganti ikon ke bawah
          icon.classList.add("fa-chevron-down");
        }
      });
    });
  
    // ===============================
    
  
  });
   
  // javascript Shop
  document.addEventListener('DOMContentLoaded', function () {
    const priceLinks = document.querySelectorAll('.price-filter');
    const typeLinks = document.querySelectorAll('.type-filter');
    const allProperties = Array.from(document.querySelectorAll('.property-item'));
    const loadMoreBtn = document.getElementById('load');
  
    let filteredProperties = [...allProperties];
    let visibleCount = 6;
  
    // Tampilkan properti sesuai filter dan jumlah tampil
    function updateDisplay() {
      allProperties.forEach(card => card.style.display = 'none');
      filteredProperties.forEach((card, index) => {
        if (index < visibleCount) {
          card.style.display = 'block';
        }
      });     
    }
  
    // Filter berdasarkan harga
    priceLinks.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        const min = parseInt(this.getAttribute('data-min'));
        const max = parseInt(this.getAttribute('data-max'));
        visibleCount = 6;
  
        filteredProperties = allProperties.filter(card => {
          const price = parseInt(card.getAttribute('data-price'));
          return price >= min && price <= max;
        });
  
        updateDisplay();
  
        // Highlight link aktif
        priceLinks.forEach(l => l.classList.remove('fw-bold'));
        this.classList.add('fw-bold');
      });
    });
  
    // Filter berdasarkan tipe bangunan
    typeLinks.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        const selectedType = this.getAttribute('data-type');
        visibleCount = 6;
  
        if (selectedType === 'all') {
          filteredProperties = [...allProperties];
        } else {
          filteredProperties = allProperties.filter(card => {
            return card.getAttribute('data-type') === selectedType;
          });
        }
  
        updateDisplay();
  
        // Highlight link aktif
        typeLinks.forEach(l => l.classList.remove('fw-bold', 'text-primary'));
        this.classList.add('fw-bold', 'text-primary');
      });
    });
  
    // Tombol "Muat Lainnya"
    loadMoreBtn.addEventListener('click', function () {
      visibleCount += 6;
      updateDisplay();
    });
  
    // Tampilkan properti awal
    updateDisplay();
  });
  
  // javascript portfolio
  document.querySelectorAll(".property-item").forEach((card) => {
    const video = card.querySelector("video");

    card.addEventListener("mouseenter", () => {
      video.currentTime = 0;
      video.play();
    });

    card.addEventListener("mouseleave", () => {
      video.pause();
      video.currentTime = 0;
    });
  });

  // pagination
  document.addEventListener("DOMContentLoaded", function () {
const itemsPerPage = 6;
const items = Array.from(document.querySelectorAll(".property-item"));
const pagination = document.querySelector(".pagination");
let currentPage = 1;
const totalPages = Math.ceil(items.length / itemsPerPage);

function renderPage(page) {
// Tampilkan item sesuai halaman
items.forEach((item, index) => {
item.style.display = (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage)
  ? "block"
  : "none";
});

// Update tombol aktif
const pageItems = pagination.querySelectorAll(".page-item");
pageItems.forEach((item, i) => {
item.classList.remove("active", "disabled");

// Previous
if (i === 0) {
  if (page === 1) item.classList.add("disabled");
}
// Next
else if (i === pageItems.length - 1) {
  if (page === totalPages) item.classList.add("disabled");
}
// Nomor halaman
else {
  if (parseInt(item.textContent) === page) item.classList.add("active");
}
});
}

// Tambahkan event listener ke pagination
pagination.addEventListener("click", function (e) {
e.preventDefault();
const target = e.target;
if (target.classList.contains("page-link")) {
const text = target.textContent.trim();

if (text === "Previous" && currentPage > 1) {
  currentPage--;
} else if (text === "Next" && currentPage < totalPages) {
  currentPage++;
} else if (!isNaN(text)) {
  currentPage = parseInt(text);
}

renderPage(currentPage);
}
});

renderPage(currentPage); // render pertama
});

// javascript seacrh shop
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('propertySearchInput');
  const searchButton = document.getElementById('searchButton');
  const propertyItems = Array.from(document.querySelectorAll('.property-item'));

  function updateDisplay(keyword) {
    propertyItems.forEach(item => {
      const text = item.innerText.toLowerCase();
      if (text.includes(keyword)) {
        item.style.display = 'block'; // Tampilkan properti yang cocok
      } else {
        item.style.display = 'none'; // Sembunyikan properti yang tidak cocok
      }
    });
  }

  // Fungsi untuk memulai pencarian
  function performSearch() {
    const keyword = searchInput.value.toLowerCase();
    updateDisplay(keyword);
  }

  // Event listener untuk tombol "Cari"
  searchButton.addEventListener('click', function () {
    performSearch();
  });

  // Event listener untuk input pencarian (Enter key)
  searchInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      e.preventDefault(); // Hindari submit form default
      performSearch();
    }
  });

  // Event listener untuk input kosong
  searchInput.addEventListener('input', function () {
    if (!searchInput.value) {
      updateDisplay(''); // Tampilkan semua properti jika input kosong
    }
  });
});

// javascript login
