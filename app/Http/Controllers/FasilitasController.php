<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        // Ambil 4 item acak untuk galeri
        $berita = Berita::where('status', 'published')
        ->with('file')
            ->inRandomOrder()
            ->take(4)
            ->get();
    
        return view('landingpages.Fasilitas', compact('berita'));
    }

}
