<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdmLinksController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;


    Route::get('/', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginForm'])->name('loginForm');

Route::middleware(['auth'])->group(function () {
    //dashboard admin 
    Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('dashboardadmin');

    //manajemen banner 
    Route::get('/banner', [BannerController::class, 'index'])->name('Bhome');
    Route::get('/addBanner', [BannerController::class, 'create'])->name('addB'); // ntar satuin ya ama yang lain 
    Route::post('/addBanner', [BannerController::class, 'store'])->name('addBanner');
    Route::patch('/banner/{banner}/toggle', [BannerController::class, 'toggle'])->name('banner.toggle');
    Route::get('/banner/edit{id}', [BannerController::class, 'edit'])->name('editB');
    Route::put('/banner/update/{id}', [BannerController::class, 'update'])->name('updateBanner');
    Route::delete('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('dBanner');


    //manajemen produk
    Route::get('/produk/kelola_produk', [ProdukController::class, 'index'])->name('produk.kelola');
    // Route::get('/produk-history', [ProdukController::class, 'history'])->name('produk.history');
    Route::get('/produk-restore', [ProdukController::class, 'restore'])->name('produk.restore');
    Route::post('/produk-restore/{id}', [ProdukController::class, 'restoreProcess'])->name('produk.restore.process');
    Route::delete('/produk-force-delete/{id}', [ProdukController::class, 'forceDelete'])->name('produk.force.delete');

    //manajemen link 
    Route::get('/link', [AdmLinksController::class, 'index'])->name('Lhome');
    Route::get('/addlink', [AdmLinksController::class, 'create']);
    Route::post('/addlink', [AdmLinksController::class, 'store'])->name('addLink');
    Route::post('/edit/link/{id}', [AdmLinksController::class, 'edit']);
    Route::put('/edit/link/{id}', [AdmLinksController::class, 'update'])->name('editLink');
    Route::delete('/delete/link/{id}', [AdmLinksController::class, 'destroy'])->name('deleteLink');
});





