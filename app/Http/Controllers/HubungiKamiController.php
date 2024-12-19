<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class HubungiKamiController extends Controller
{
    public function index()
    {
        // Ambil 4 item acak untuk galeri
        $berita = Berita::where('status', 'published')
            ->with('file')
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('landingpages.HubungiKami', compact('berita'));
    }
}
