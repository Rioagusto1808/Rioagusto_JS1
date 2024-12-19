<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class DataGuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $mapel = $request->input('mapel_id');
        $berita = Berita::where('status', 'published')
        ->with('file')
            ->inRandomOrder()
            ->take(4)
            ->get();
$mapelList = MataPelajaran::get();
            $gurus = Guru::when($search, function ($query, $search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%');
            })->
            when($mapel, function ($query, $mapel) {
                return $query->where('mapel_id', $mapel);
            })->paginate(10);
    
        return view('landingpages.DataGuru', compact('berita','mapelList','gurus'));
    }

}
