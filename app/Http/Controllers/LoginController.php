<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong!',
            'email.email'    => 'Format email salah!',
            'password.required' => 'Password tidak boleh kosong!'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Autentikasi Gagal! Periksa kembali email dan password.'
        ])->onlyInput('email');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
