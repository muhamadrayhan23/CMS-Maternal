<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return redirect()->route('produk.index');
});


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
