<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

            return redirect ()->route('dashboardadmin');
            // ->with ('success', 'Anda berhasil login'); 
        }
        return back()->withErrors([
        'email' => 'Email atau password salah!'
         ])->onlyInput('email');

    }

    public function dashboard(){
        return view('admin.dashboard_admin');
    }

    public function logout(Request $request){
        Authh::logout();
        $request->session()->invalidate;
        $request->session()->regenerateToken();

        return redirect('login');
        }
}
