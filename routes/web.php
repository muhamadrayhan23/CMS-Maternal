<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::resource('produk', ProdukController::class);
Route::get('/produk-kelola_produk_card', [ProdukController::class, 'kelola_card'])->name('produk.kelola_card');
Route::get('/produk-restore', [ProdukController::class, 'restore'])->name('produk.restore');
Route::post('/produk-restore/{id}', [ProdukController::class, 'restoreProcess'])->name('produk.restore.process');
Route::get('/produk-detail_trash/{id}', [ProdukController::class, 'showDetailTrash'])->name('produk.detail_trash');
Route::post('/produk-detail_trash/{id}', [ProdukController::class, 'restore'])->name('produk.detail_trash');
Route::delete('/produk-force-delete/{id}', [ProdukController::class, 'forceDelete'])->name('produk.force.delete');
Route::patch('/produk/{id}/toggle', [ProdukController::class, 'toggle'])->name('produk.toggle');


//////////////////////////////////////

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginForm'])->name('loginForm');

Route::middleware(['auth'])->group(function () {
    Route::get('/banner', [BannerController::class, 'index'])->name('Bhome');
    Route::get('/addBanner', [BannerController::class, 'create'])->name('addB'); // ntar satuin ya ama yang lain 
    Route::post('/addBanner', [BannerController::class, 'store'])->name('addBanner');
    Route::patch('/banner/{banner}/toggle', [BannerController::class, 'toggle'])->name('banner.toggle');
    Route::get('/banner/edit{id}', [BannerController::class, 'edit'])->name('editB');
    Route::put('/banner/update/{id}', [BannerController::class, 'update'])->name('updateBanner');
    Route::delete('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('dBanner');
});


// route admin
//     Route::get('/banner', [BannerController::class, 'index'])->name('Bhome');
//     Route::get('/addBanner', [BannerController::class, 'create'])->name('addB'); // ntar satuin ya ama yang lain 
//     Route::post('/addBanner', [BannerController::class, 'store'])->name('addBanner');

// Route::get('/produk-history', [ProdukController::class, 'history'])
//     ->name('produk.history');

// Route::middleware(['auth', 'admin'])->group(function () {


// });
// Route::get('/', function () {
//     return view('welcome');
// });
