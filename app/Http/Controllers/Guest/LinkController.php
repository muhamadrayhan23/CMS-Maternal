<?php
namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        $links = Link::all();

        return view('guest.linktree', compact('announcements', 'links'));
    }
}
