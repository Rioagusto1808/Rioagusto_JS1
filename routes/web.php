<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\PenerimaanSiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowImageController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/landingpages/welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', UserController::class);
    Route::resource('guru', GuruController::class);
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');

    Route::resource('siswa', SiswaController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('mata_pelajaran', MataPelajaranController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('penerimaan', PenerimaanSiswaController::class);

    // Route untuk menampilkan semua berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Menampilkan Gambar
    Route::get('/images/{id}', [ShowImageController::class, 'show'])->name('image.show');

});

require __DIR__.'/auth.php';
