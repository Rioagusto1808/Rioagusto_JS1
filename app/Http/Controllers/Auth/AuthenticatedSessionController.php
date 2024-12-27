<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login')->with('throttleTime', session('throttleTime'));
    }

    public function store(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Periksa jika pengguna sedang login
            if (Auth::check()) {
                // Jika pengguna sudah login, logout terlebih dahulu
                Auth::logout();
            }

            if ($user->status === 'inactive') {
                // Jika pengguna tidak aktif
                throw ValidationException::withMessages([
                    'email' => ['Akun Anda tidak aktif. Silakan hubungi administrator.'],
                ]);
            } elseif ($user->status === 'banned') {
                // Jika pengguna dibanned
                throw ValidationException::withMessages([
                    'email' => ['Akun Anda dibanned. Silakan hubungi administrator.'],
                ]);
            }
        }

        $maxAttempts = 3; // Maksimal 3 percobaan
        $decayMinutes = 1; // Waktu jeda 1 menit
        $throttleKey = $request->ip();

        // Cek jika sudah terlalu banyak percobaan
        if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts)) {
            // Jika terlalu banyak percobaan, ambil waktu throttle dari session
            $throttleTime = session('throttleTime');

            if ($throttleTime && Carbon::now()->lessThan($throttleTime)) {
                // Hitung waktu tersisa dalam detik
                $remainingSeconds = abs(round($throttleTime->diffInSeconds(Carbon::now())));

                // Jika waktu throttle belum berakhir, kembalikan pesan error dengan detik yang tersisa
                return back()->withErrors([
                    'loginError' => 'Terlalu banyak percobaan login. silahkan coba lagi nanti',
                ]);
            }
        }

        // Validasi data login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        // Cek apakah pengguna terdaftar
        if (Auth::attempt($request->only('email', 'password'))) {
            // Set waktu aktivitas terakhir
            session(['lastActivityTime' => now()]);

            return redirect()->intended('dashboard'); // Ganti dengan route yang sesuai
        }

        // Mencoba login
        if (Auth::attempt($credentials)) {
            RateLimiter::clear($throttleKey); // Reset hitungan jika berhasil
            $request->session()->regenerate();
            session()->forget('throttleTime'); // Menghapus throttle time jika login berhasil

            return redirect()->intended('dashboard');
        }

        // Hitungan percobaan gagal
        RateLimiter::hit($throttleKey, $decayMinutes * 60);

        // Hitung sisa percobaan
        $remainingAttempts = $maxAttempts - RateLimiter::attempts($throttleKey);

        // Jika sisa percobaan <= 0, set waktu throttle
        if ($remainingAttempts <= 0) {
            // Mengatur waktu throttle ke 1 menit ke depan
            $throttleTime = Carbon::now()->addMinutes($decayMinutes);
            $request->session()->put('throttleTime', $throttleTime);
            $remainingSeconds = abs(round($throttleTime->diffInSeconds(Carbon::now())));

            return back()->withErrors([
                'loginError' => 'Terlalu banyak percobaan login.',
            ])->with([
                'remainingSeconds' => $remainingSeconds,
            ])->withInput($request->only('email'));
        }

        // Menyimpan hitungan percobaan yang tersisa (bisa dihilangkan jika tidak dibutuhkan)
        session(['throttleTime' => null]); // Menghapus throttle time ketika tidak ada lagi percobaan yang tersisa

        return back()->withErrors([
            'loginError' => 'Email atau kata sandi salah. Percobaan login tersisa: '.$remainingAttempts,
        ])->withInput($request->only('email'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
