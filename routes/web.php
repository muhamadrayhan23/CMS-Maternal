<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmLinksController;

use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return redirect()->route('produk.index');
});

// Route::middleware(['auth', 'admin'])->group(function () {
//     // route admin

// });

Route::get('/admin/dashboard_admin', function () {
    return view('admin.dashboard_admin');
})->name('admin.dashboard');


Route::get('/produk/kelola_produk', [ProdukController::class, 'index'])
    ->name('produk.kelola');

Route::resource('produk', ProdukController::class);

// Route::get('/produk-history', [ProdukController::class, 'history'])
//     ->name('produk.history');

Route::get('/produk-restore', [ProdukController::class, 'restore'])
    ->name('produk.restore');

Route::post('/produk-restore/{id}', [ProdukController::class, 'restoreProcess'])
    ->name('produk.restore.process');

Route::delete('/produk-force-delete/{id}', [ProdukController::class, 'forceDelete'])
    ->name('produk.force.delete');
// Route::middleware(['auth', 'admin'])->group(function () {

    
// });
// Route::get('/', function () {
//     return view('welcome');
// });

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

//manajemen link 
Route::get('/link', [AdmLinksController::class, 'index'])->name('homeLink');
Route::get('/link/create', [AdmLinksController::class, 'create'])->name('createLink');
Route::post('/link', [AdmLinksController::class, 'store'])->name('storeLink');
Route::get('/link/{link}/edit', [AdmLinksController::class, 'edit'])->name('editLink');
Route::put('/link/{link}', [AdmLinksController::class, 'update'])->name('updateLink');
Route::delete('/link/{link}', [AdmLinksController::class, 'destroy'])->name('deleteLink');

//manajemen user 
Route::get('/user', [UserController::class, 'index'])->name('homeUser');
Route::get('/user/create', [UserController::class, 'create'])->name('createUser');
Route::post('/user', [UserController::class, 'store'])->name('storeUser');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('editUser');
Route::put('/user/{user}', [UserController::class, 'update'])->name('updateUser');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('deleteUser');
