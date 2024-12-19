<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AlumniContoller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $berita = Berita::when($search, function ($query, $search) {
            return $query->where('judul', 'like', '%'.$search.'%');
        })
            ->where('status', 'published')
            ->with('file')
            ->inRandomOrder()
            ->take(4)
            ->get();

        $siswa = Siswa::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%'.$search.'%')
                ->orWhere('nis', 'like', '%'.$search.'%');
        })->where('status', 'lulus')->paginate(10);

        return view('landingpages.Alumni', compact('berita', 'siswa'));
    }
}
