<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Link;
use App\Models\Banner;
use App\Models\User;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginForm(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);

        // dd(Auth::attempt($credentials));


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboardadmin')
                ->with('alerts');
        }
        return back()->withErrors([
            'email' => 'Email atau password salah!'
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $totalProducts = Product::count();
        $publishedProducts = Product::where('is_active', 1)->count();

        $totalLinks = Link::count();

        $totalBanners = Banner::count();
        $publishedBanners = Banner::where('is_active', 1)->count();

        $totalUsers = User::count();
        // $activeUsers = User::where('is_active', 1)->count();

        $latestProducts = Product::latest()->take(3)->get();
        $latestBanners = Banner::latest()->take(2)->get();
        $links = Link::latest()->take(5)->get();
        $users = User::latest()->take(3)->get();

        return view('admin.dashboard_admin', compact(
            'totalProducts',
            'publishedProducts',
            'totalLinks',
            'totalBanners',
            'publishedBanners',
            'totalUsers',
            // 'activeUsers',
            'latestProducts',
            'latestBanners',
            'links',
            'users'
        ));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();

        return redirect('login')->with('alerts', 'Anda berhasil Log out!');
    }
}
