<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sedang login
        if (Auth::check()) {
            $user = Auth::user();

            // Jika status pengguna bukan 'active', logout dan redirect
            if ($user->status !== 'active') {
                Auth::logout(); // Logout pengguna

                // Redirect ke halaman login dengan pesan error yang sesuai
                if ($user->status === 'inactive') {
                    return redirect()->route('login')->withErrors(['error' => 'Akun Anda tidak aktif. Silakan hubungi administrator.']);
                } elseif ($user->status === 'banned') {
                    return redirect()->route('login')->withErrors(['error' => 'Akun Anda dibanned. Silakan hubungi administrator.']);
                }
            }
        }

        // Jika status pengguna 'active' atau pengguna tidak login, lanjutkan request
        return $next($request);
    }
}
