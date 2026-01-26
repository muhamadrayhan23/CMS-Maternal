<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmLinksController;


Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth', 'admin'])->group(function () {
//     // route admin
    
// });

Route::resource('/adm-links', AdmLinksController::class);