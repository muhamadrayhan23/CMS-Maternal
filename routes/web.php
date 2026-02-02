<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdmLinksController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::post('/login', [UserController::class, 'loginForm'])->name('loginForm');
Route::get('/login', [UserController::class, 'login'])->name('login');


Route::middleware(['auth'])->group(function () {
    //dashboard admin
    Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('dashboardadmin');

    //manajemen banner
    Route::get('/banner', [BannerController::class, 'index'])->name('Bhome');
    Route::get('/addBanner', [BannerController::class, 'create'])->name('addB'); 
    Route::post('/addBanner', [BannerController::class, 'store'])->name('addBanner');
    Route::patch('/banner/{banner}/toggle', [BannerController::class, 'toggle'])->name('banner.toggle');
    Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('editB');
    Route::put('/banner/update/{id}', [BannerController::class, 'update'])->name('updateBanner');
    Route::delete('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('dBanner');
    Route::get('/banner/trash', [BannerController::class, 'restore'])->name('Btrash');
    Route::post('/banner/trash/{id}', [BannerController::class, 'restoreProses'])->name('Btrash.restore');
    Route::delete('/banner/force-delete{id}', [BannerController::class, 'forceDelete'])->name('Btrash.permanent');


    //manajemen produk
    Route::resource('produk', ProdukController::class);
    Route::get('/produk-kelola_produk_card', [ProdukController::class, 'kelola_card'])->name('produk.kelola_card');
    Route::get('/produk-restore', [ProdukController::class, 'restore'])->name('produk.restore');
    Route::post('/produk-restore/{id}', [ProdukController::class, 'restoreProcess'])->name('produk.restore.process');
    Route::get('/produk-detail_trash/{id}', [ProdukController::class, 'showDetailTrash'])->name('produk.detail_trash');
    Route::post('/produk-detail_trash/{id}', [ProdukController::class, 'restore'])->name('produk.detail_trash');
    Route::delete('/produk-force-delete/{id}', [ProdukController::class, 'forceDelete'])->name('produk.force.delete');
    Route::patch('/produk/{id}/toggle', [ProdukController::class, 'toggle'])->name('produk.toggle');

    //manajemen link 
    Route::get('/link', [AdmLinksController::class, 'index'])->name('homeLink');
    Route::get('/link/create', [AdmLinksController::class, 'create'])->name('createLink');
    Route::post('/link', [AdmLinksController::class, 'store'])->name('storeLink');
    Route::get('/link/{link}/edit', [AdmLinksController::class, 'edit'])->name('editLink');
    Route::put('/link/{link}', [AdmLinksController::class, 'update'])->name('updateLink');
    Route::delete('/link/{link}', [AdmLinksController::class, 'destroy'])->name('deleteLink');
    Route::patch('/link/{link}/toggle', [AdmLinksController::class, 'toggle'])->name('link.toggle');

    //manajemen user 
    Route::get('/user', [UserController::class, 'index'])->name('homeUser');
    Route::get('/user/create', [UserController::class, 'create'])->name('createUser');
    Route::post('/user', [UserController::class, 'store'])->name('storeUser');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('editUser');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('updateUser');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('deleteUser');
    Route::patch('/user/{user}/toggle', [UserController::class, 'toggle'])->name('user.toggle');

    //Logout
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

});

Route::get('/about', function () { return view('guest.about');})->name('about');
Route::get('/linktree', function () { return view('guest.linktree');})->name('linktree');



