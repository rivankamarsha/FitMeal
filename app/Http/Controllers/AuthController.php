<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/profil');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function processSignup(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users,phone_number', 
            'username' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        
        $user = User::create([
            'email' => $validated['email'],
            'phone_number' => $validated['phone'], 
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'name' => $validated['username'],
        ]);

        Auth::login($user);

        return redirect('/profil')->with('success', 'Akun berhasil dibuat!');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
