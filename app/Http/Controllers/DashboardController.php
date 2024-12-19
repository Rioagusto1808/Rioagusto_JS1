<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $guruscount = Guru::get()->count();
        $siswascount = Siswa::where('status', 'belum lulus')->get()->count();
        $userscount = User::get()->count();
        $classcount = Kelas::get()->count();
        $alumnicount = Siswa::where('status', 'lulus')->get()->count();

        return view('dashboard', compact('userscount', 'guruscount', 'siswascount', 'classcount', 'alumnicount'));
    }
}
