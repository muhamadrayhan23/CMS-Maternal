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
        session()->forget('produk_back');
        session()->forget('banner_back');
        $totalProducts = Product::count();
        $publishedProducts = Product::where('is_active', 1)->count();

        $totalLinks = Link::count();

        $totalBanners = Banner::count();
        $publishedBanners = Banner::where('is_active', 1)->count();

        $totalUsers = User::count();

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

        return redirect()->route('home')->with('alerts', 'Anda berhasil Log out!');
    }

    //tampil daftar user
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        })->latest()->paginate(10)->withQueryString();

        return view('admin.user.user', compact('users'));
    }


    //tampil form buat tambah user
    public function create()
    {
        return view('admin.user.creuser');
    }

    //simpan user baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);


        return redirect()->route('homeUser')
            ->with('success', 'User berhasil ditambahkan');
    }

    //panggil edit user
    public function edit(User $user)
    {
        return view('admin.user.eduser', compact('user'));
    }

    //update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('homeUser')
            ->with('success', 'User berhasil diupdate');
    }

    //delete user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('homeUser')
            ->with('success', 'User berhasil dihapus');
    }

    //toggle toggle an
    public function toggle(User $user)
    {
        $user->update([
            'is_active' => ! $user->is_active
        ]);

        return back();
    }
}
