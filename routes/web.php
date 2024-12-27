<?php

use App\Http\Controllers\AkreditasiSekolahController;
use App\Http\Controllers\AlumniContoller;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HubungiKamiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LayananInformasiController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PenerimaanSiswaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSekolahController;
use App\Http\Controllers\SambutanKepalaSekolahController;
use App\Http\Controllers\ShowImageController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Middleware\CheckUserStatus;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landingpages.index');
Route::get('/full-berita', [BeritaController::class, 'BeritaAllLandingPages'])->name('berita_all.index');
Route::get('/berita_id/{id}', [BeritaController::class, 'BeritaAllLandingPagesId'])->name('berita_id.show');
Route::get('/full-galeri', [BeritaController::class, 'GaleriAllLandingPages'])->name('galeri_all.index');
Route::get('/sambutan-kepala-sekolah', [SambutanKepalaSekolahController::class, 'index'])->name('SambutanKepalaSekolah');
Route::get('/profile-sekolah', [ProfileSekolahController::class, 'index'])->name('profilesekolah');
Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('VisiMisi');
Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('StrukturOrganisasi');
Route::get('/akreditasi-sekolah', [AkreditasiSekolahController::class, 'index'])->name('AkreditasiSekolah');
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('Fasilitas');
Route::get('/alumni', [AlumniContoller::class, 'index'])->name('Alumni');
Route::get('/hubungi-kami', [HubungiKamiController::class, 'index'])->name('HubungKami');
Route::get('/ppdb', [PpdbController::class, 'index'])->name('Ppdb');
Route::get('/data-siswa', [DataSiswaController::class, 'index'])->name('DataSiswa');
Route::get('/data-guru', [DataGuruController::class, 'index'])->name('DataGuru');
Route::get('/layanan-informasi', [LayananInformasiController::class, 'index'])->name('LayananInformasi');

Route::get('/images/{id}', [ShowImageController::class, 'show'])->name('image.show');
Route::post('/pengaduans', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/file/{id}', [FileController::class, 'show'])->name('file.show');
Route::delete('/users/{id}/delete-picture', [UserController::class, 'delete_picture'])->name('user.delete_picture');

Route::middleware('auth', CheckUserStatus::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
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
    Route::resource('nilai', NilaiController::class);

    // Route untuk menampilkan semua berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::post('/pengaduan/{id}/reply', [PengaduanController::class, 'reply'])->name('pengaduan.reply');

});
Route::get('/pengaduan', function () {
    $pengaduan = App\Models\Pengaduan::all();

    return view('pengaduan.pengaduan', compact('pengaduan'));
})->name('pengaduan.pengaduan');

require __DIR__.'/auth.php';
