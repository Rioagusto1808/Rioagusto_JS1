<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kelas = $request->input('kelas_id');
        $berita = Berita::where('status', 'published')
            ->with('file')
            ->inRandomOrder()
            ->take(4)
            ->get();

        $kelasList = Kelas::all();
        $siswa = Siswa::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%'.$search.'%')
                ->orWhere('nis', 'like', '%'.$search.'%');
        })->
        when($kelas, function ($query, $kelas) {
            return $query->where('kelas_id', $kelas);
        })
            ->where('status', 'belum lulus')->paginate(10);

        return view('landingpages.DataSiswa', compact('berita', 'siswa', 'kelasList'));
    }
}
