<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\PenerimaanSiswaBaru;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index(Request $request)
    {
        $search = request()->input('search');
        $status = request()->input('status');
        $berita = Berita::where('status', 'published')
        ->with('file')
            ->inRandomOrder()
            ->take(4)
            ->get();

            $siswa = PenerimaanSiswaBaru::when($search, function ($query, $search) {
                $query->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('nisn', 'like', '%' . $search . '%');
            })->when($status, function ($query, $status) {
                $query->where('status', $status);
            })->paginate(10);

    
        return view('landingpages.Ppdb', compact('berita','siswa'));
    }

}
