<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SesiController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\BuildingController;
use App\Http\Controllers\admin\LandController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PortofoliodepanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Semua route untuk aplikasi web Anda.
|
*/

// ================= FRONTEND ROUTES =================
Route::get('/welcome', fn() => view('welcome'))->name('welcome');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Statis
Route::get('/about', fn() => view('frontside.about'))->name('about');
Route::get('/faq', fn() => view('frontside.faq'))->name('faq');
Route::get('/portfolio', [PortofoliodepanController::class, 'index'])->name('portfolio.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/load-more-properties', [ShopController::class, 'loadMore'])->name('shop.load-more');
Route::get('/shop/{type}/{id}', [ShopController::class, 'show'])->name('shop.property-details');
Route::get('/property/{property}', [HomeController::class, 'show'])->name('home.property-details');
Route::get('/contact', [KontakController::class, 'index'])->name('contact');

// ================= GUEST ONLY ROUTES (Belum Login) =================
Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);

    // Register
    Route::get('/register', [SesiController::class, 'register'])->name('register');
    Route::post('/register', [SesiController::class, 'store']);
});

// ================= AUTHENTICATED USERS (User & Admin) =================
Route::middleware(['auth'])->group(function () {
    // Dashboard Pengguna
    Route::get('/Pengguna', [UserController::class, 'index'])->name('user.index');

    // CRUD Buildings (User hanya lihat miliknya)
    Route::prefix('buildings')->as('user.buildings.')->group(function () {
        Route::get('/', [BuildingController::class, 'index'])->name('index');
        Route::get('/create', [BuildingController::class, 'create'])->name('create');
        Route::post('/', [BuildingController::class, 'store'])->name('store');
        Route::get('/{building}', [BuildingController::class, 'show'])->name('show');
        Route::get('/{building}/edit', [BuildingController::class, 'edit'])->name('edit');
        Route::put('/{building}', [BuildingController::class, 'update'])->name('update');
        Route::delete('/{building}', [BuildingController::class, 'destroy'])->name('destroy');
        Route::patch('/{building}/mark-sold', [BuildingController::class, 'markAsSold'])->name('mark-sold');
        Route::patch('/{building}/toggle-website', [BuildingController::class, 'toggleWebsiteStatus'])->name('toggle-website');
    });

    // CRUD Lands (User hanya lihat miliknya)
    Route::prefix('lands')->as('user.lands.')->group(function () {
        Route::get('/', [LandController::class, 'index'])->name('index');
        Route::get('/create', [LandController::class, 'create'])->name('create');
        Route::post('/', [LandController::class, 'store'])->name('store');
        Route::get('/{land}', [LandController::class, 'show'])->name('show');
        Route::get('/{land}/edit', [LandController::class, 'edit'])->name('edit');
        Route::put('/{land}', [LandController::class, 'update'])->name('update');
        Route::delete('/{land}', [LandController::class, 'destroy'])->name('destroy');
        Route::patch('/{land}/toggle-website', [LandController::class, 'toggleWebsiteStatus'])->name('toggle.website');
    });

    // Logout
    Route::post('/logout', [SesiController::class, 'logout'])->name('logout');
});

// ================= ADMIN ROUTES (Hanya Role Admin) =================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/', function () {
        return view('admin.index');
    })->name('dashboard');

    // User Management
    Route::get('/user', [SesiController::class, 'list'])->name('user');
    Route::post('/register/delete/{id}', [SesiController::class, 'deleteUser'])->name('deleteuser');
    Route::get('/verify-users', [AdminController::class, 'verifyUsers'])->name('admin.verify.users');
    Route::post('/verify-user/{id}', [AdminController::class, 'verifyUser'])->name('admin.verify.user');

    // Admin Register
    Route::get('/register', [SesiController::class, 'createAdmin'])->name('admin.register');
    Route::post('/store', [SesiController::class, 'storeAdmin'])->name('admin.store');
    Route::get('/{id}/edit', [SesiController::class, 'editAdmin'])->name('admin.edit');
    Route::put('/{id}/update', [SesiController::class, 'updateAdmin'])->name('admin.update');
    Route::post('/{id}/delete', [SesiController::class, 'deleteAdmin'])->name('admin.delete');

    // Resources
    Route::resource('buildings', BuildingController::class);
    Route::patch('/buildings/{building}/mark-sold', [BuildingController::class, 'markAsSold'])->name('buildings.mark-sold');
    Route::patch('/buildings/{building}/toggle-website', [BuildingController::class, 'toggleWebsiteStatus'])->name('buildings.toggle-website');

    Route::resource('contacts', ContactController::class);
    Route::resource('portofolios', PortofolioController::class);
    Route::resource('testimonis', TestimoniController::class);
    Route::resource('banner', BannerController::class);

    // Property Tanah
    Route::prefix('lands')->group(function () {
        Route::get('/', [LandController::class, 'index'])->name('lands.index');
        Route::get('/create', [LandController::class, 'create'])->name('lands.create');
        Route::post('/', [LandController::class, 'store'])->name('lands.store');
        Route::get('/{land}', [LandController::class, 'show'])->name('lands.show');
        Route::get('/{land}/edit', [LandController::class, 'edit'])->name('lands.edit');
        Route::put('/{land}', [LandController::class, 'update'])->name('lands.update');
        Route::delete('/{land}', [LandController::class, 'destroy'])->name('lands.destroy');
        Route::patch('/lands/{land}/toggle-website', [LandController::class, 'toggleWebsiteStatus'])->name('lands.toggle.website');
    });
});
