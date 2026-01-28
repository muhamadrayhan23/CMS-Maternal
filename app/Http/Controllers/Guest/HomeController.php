<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = Banner::where('is_active', true)->get();
        // dd($banners);
        return view ('guest.home', compact('banners'));
    }
}
