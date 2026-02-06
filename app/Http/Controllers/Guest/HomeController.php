<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = Banner::where('is_active', true)->get();
        $query = Product::with(['details', 'links']);
        $products = $query->take(12)->get();
        return view ('guest.home', compact('banners', 'products'));
    }
}
