<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil 4 item acak untuk galeri
        $galeri = Berita::where('status', 'published')
            ->inRandomOrder()
            ->take(4)
            ->get();

        // Ambil 4 item terbaru setelah galeri
        $beritaTerbaru = Berita::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $guruscount = Guru::get()->count();
        $siswascount = Siswa::where('status', 'belum lulus')->get()->count();
        $classcount = Kelas::get()->count();
        $alumnicount = Siswa::where('status', 'lulus')->get()->count();

        return view('landingpages.welcome', compact('galeri', 'beritaTerbaru', 'guruscount', 'siswascount', 'classcount', 'alumnicount'));
    }
}
