<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

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
    
        return view('landingpages.welcome', compact('galeri', 'beritaTerbaru'));
    }
    
    
    
}
