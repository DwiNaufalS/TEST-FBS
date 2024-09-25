<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // Mengonversi string role menjadi array
        $rolesArray = explode('|', $roles);

        // Memeriksa apakah pengguna telah login dan memiliki salah satu dari role yang diberikan
        if (Auth::check() && in_array(Auth::user()->role, $rolesArray)) {
            return $next($request);
        }

        // Redirect jika role tidak sesuai dengan pesan error
        return redirect('/')->withErrors(['role' => 'Anda tidak memiliki akses ke halaman ini.']);
    }
}
