<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(){
        return view ('login');
    }

    public function loginForm(Request $request){
        $credentials = $request->validate([
        'email' => ['email', 'required'],
        'password' => ['required'],
        ]);

        // dd(Auth::attempt($credentials));

       
           if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect ('/banner'); // ganti nanti ke dashboard
            // ->with ('success', 'Anda berhasil login'); 
        }
        return back()->withErrors([
        'email' => 'Email atau password salah!'
         ])->onlyInput('email');


    }

    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        })->latest()->get();

        // Jika request AJAX → return partial HTML
        // if ($request->ajax()) {
        //     return view('admin.user.tambahan.usershow', compact('users'))->render();
        // }

        return view('admin.user.user', compact('users'));
    }


    //tampil form buat tambah link
    public function create()
    {
        return view('admin.user.creuser');
    }

    //simpan link baru
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

    //panggil edit link
    public function edit(User $user)
    {
        return view('admin.user.eduser', compact('user'));
    }

    //update link
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



    //delete link
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('homeUser')
            ->with('success', 'User berhasil dihapus');
    }

}
