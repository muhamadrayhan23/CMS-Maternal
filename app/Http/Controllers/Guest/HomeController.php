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
        $products = Product::with('details')->where('is_active', true)->take(9)->get();
        return view ('guest.home', compact('banners', 'products'));
    }
}
