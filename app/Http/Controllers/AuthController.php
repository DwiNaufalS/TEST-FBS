<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Ambil kredensial dari request
        $credentials = $request->only('username', 'password');

        // Mencoba login dengan kredensial
        if (Auth::attempt($credentials)) {
            // Ambil role pengguna yang login
            $role = Auth::user()->role;

            // Menentukan pesan keberhasilan berdasarkan role
            switch ($role) {
                case 'admin':
                    Alert::success('Berhasil', 'Anda berhasil login ke dashboard Admin.');
                    return redirect()->intended('/admin/dashboard');
                case 'adminBP':
                    Alert::success('Berhasil', 'Anda berhasil login ke dashboard Admin BP.');
                    return redirect()->intended('/adminBP/dashboard');
                case 'adminGR':
                    Alert::success('Berhasil', 'Anda berhasil login ke dashboard Admin GR.');
                    return redirect()->intended('/adminGR/dashboard');
                default:
                    Auth::logout(); // Jika role tidak dikenal, logout
                    Alert::error('Gagal', 'Role pengguna tidak dikenal.');
                    return redirect('/login');
            }
        }

        // Jika login gagal, tampilkan alert error
        Alert::error('Gagal', 'Username atau password salah.');
        return redirect()->back()->withErrors(['username' => 'Username atau password salah.']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        Alert::success('Berhasil', 'Anda telah logout.');
        return redirect('/');
    }
}
