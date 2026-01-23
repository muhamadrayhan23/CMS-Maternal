<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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