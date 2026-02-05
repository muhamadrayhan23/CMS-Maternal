<?php
namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $links = Link::all();

        return view('guest.linktree', compact('banners', 'links'));
    }
}
