<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    // Menampilkan data siswa
    public function index(Request $request)
    {
        // Ambil guru yang sedang login
        $guru = auth()->user();  // Asumsi Anda menggunakan Auth untuk login

        // Ambil parameter pencarian
        $nama = $request->input('nama');
        $nis = $request->input('nis');
        $status = $request->input('status');
        $kelas_id = $request->input('kelas_id');

        // Mulai query untuk mengambil data siswa
        $query = Siswa::query();

        // Jika guru memiliki wali kelas, hanya tampilkan siswa yang memiliki wali kelas tersebut
        if ($guru && $guru->guru_id) {
            $query->whereHas('waliKelas', function ($query) use ($guru) {
                // Filter berdasarkan guru_id pada relasi waliKelas
                $query->where('guru_id', $guru->guru_id);
            });
        }

        // Tambahkan filter pencarian berdasarkan nama, nis, status, dan kelas jika ada
        if ($nama) {
            $query->where('nama', 'like', "%$nama%");
        }

        if ($nis) {
            $query->where('nis', 'like', "%$nis%");
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($kelas_id) {
            $query->where('kelas_id', $kelas_id);
        }

        // Ambil hasil query dengan pagination
        $siswa = $query->paginate(10);

        // Ambil semua kelas untuk dropdown
        $kelas = Kelas::all();

        // Kembalikan view dengan data yang diperlukan
        return view('siswa.index', compact('siswa', 'kelas', 'nama', 'nis', 'status', 'kelas_id'));
    }

    // Menampilkan form untuk membuat siswa baru
    public function create()
    {
        $user = auth()->user();

        // Jika pengguna adalah Superadmin, izinkan akses penuh
        if ($user->role === 'Superadmin') {
            $kelas = Kelas::all();
            $guru = Guru::all(); // Superadmin bisa melihat semua guru

            return view('siswa.create', compact('kelas', 'guru'));
        }

        // Jika bukan Superadmin, ikuti logika standar
        $guru = $user->guru;
        $kelas = Kelas::all();
        $guru = Guru::where('id', $guru->id)->get();

        return view('siswa.create', compact('kelas', 'guru'));
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:50',
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'jenis_kelamin' => 'required|in:laki,perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:islam,kristen,katolik,hindu,buddha,konghucu',
            'alamat' => 'required|string',
            'ayah' => 'required|string|max:255',
            'ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:100',
            'pekerjaan_ibu' => 'required|string|max:100',
            'alamat_orang_tua' => 'required|string',
            'tahun_masuk' => 'required|digits:4',
            'tahun_lulus' => 'nullable|digits:4',
            'kelas_id' => 'required|exists:kelas,id',
            'status' => 'required|in:lulus,belum lulus',
            'guru_id' => 'required|exists:guru,id',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nama_panggilan.required' => 'Nama Panggilan wajib diisi.',
            'nama_panggilan.string' => 'Nama Panggilan harus berupa teks.',
            'nama_panggilan.max' => 'Nama Panggilan tidak boleh lebih dari 255 karakter.',

            'nis.required' => 'NIS wajib diisi.',
            'nis.string' => 'NIS harus berupa teks.',
            'nis.max' => 'NIS tidak boleh lebih dari 20 karakter.',
            'nis.unique' => 'NIS sudah terdaftar di sistem.',

            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',

            'agama.required' => 'Agama wajib diisi.',

            'alamat.required' => 'Alamat wajib diisi.',

            'ayah.required' => 'Nama wajib diisi.',
            'ayah.string' => 'Nama harus berupa teks.',
            'ayah.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'ibu.required' => 'Nama wajib diisi.',
            'ibu.string' => 'Nama harus berupa teks.',
            'ibu.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'pekerjaan_ayah.required' => 'Nama wajib diisi.',
            'pekerjaan_ayah.string' => 'Nama harus berupa teks.',
            'pekerjaan_ayah.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'pekerjaan_ibu.required' => 'Nama wajib diisi.',
            'pekerjaan_ibu.string' => 'Nama harus berupa teks.',
            'pekerjaan_ibu.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'alamat_orang_tua.required' => 'Nama wajib diisi.',

            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat lahir tidak boleh lebih dari 255 karakter.',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'tahun_masuk.required' => 'Tahun masuk wajib diisi.',
            'tahun_masuk.digits' => 'Tahun masuk harus berupa 4 digit angka.',

            'tahun_lulus.digits' => 'Tahun lulus harus berupa 4 digit angka.',

            'kelas_id.required' => 'Kelas wajib diisi.',
            'kelas_id.string' => 'Kelas harus berupa teks',
            'kelas_id.max' => 'Kelas tidak boleh lebih dari 255 karakter.',

            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status hanya boleh "lulus" atau "belum lulus".',

            'guru_id.required' => 'Guru wajib diisi.',
        ]);

        Siswa::create($validated); // Menyimpan data

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data siswa
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $guru = Guru::all();

        return view('siswa.edit', compact('siswa', 'kelas', 'guru'));
    }

    // Mengupdate data siswa
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:50',
            'nis' => [
                'required',
                'string',
                'max:20',
                Rule::unique('siswa', 'nis')->ignore($siswa->id), // Mengecualikan nis yang sedang diedit
            ],
            'jenis_kelamin' => 'required|in:laki,perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:islam,kristen,katolik,hindu,buddha,konghucu',
            'alamat' => 'required|string',
            'ayah' => 'required|string|max:255',
            'ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:100',
            'pekerjaan_ibu' => 'required|string|max:100',
            'alamat_orang_tua' => 'required|string',
            'tahun_masuk' => 'required|digits:4',
            'tahun_lulus' => 'nullable|digits:4',
            'kelas_id' => 'required|exists:kelas,id',
            'status' => 'required|in:lulus,belum lulus',
            'guru_id' => 'required|exists:guru,id',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nama_panggilan.required' => 'Nama Panggilan wajib diisi.',
            'nama_panggilan.string' => 'Nama Panggilan harus berupa teks.',
            'nama_panggilan.max' => 'Nama Panggilan tidak boleh lebih dari 255 karakter.',

            'nis.required' => 'NIS wajib diisi.',
            'nis.string' => 'NIS harus berupa teks.',
            'nis.max' => 'NIS tidak boleh lebih dari 20 karakter.',
            'nis.unique' => 'NIS sudah terdaftar di sistem.',

            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',

            'agama.required' => 'Agama wajib diisi.',

            'alamat.required' => 'Alamat wajib diisi.',

            'ayah.required' => 'Nama wajib diisi.',
            'ayah.string' => 'Nama harus berupa teks.',
            'ayah.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'ibu.required' => 'Nama wajib diisi.',
            'ibu.string' => 'Nama harus berupa teks.',
            'ibu.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'pekerjaan_ayah.required' => 'Nama wajib diisi.',
            'pekerjaan_ayah.string' => 'Nama harus berupa teks.',
            'pekerjaan_ayah.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'pekerjaan_ibu.required' => 'Nama wajib diisi.',
            'pekerjaan_ibu.string' => 'Nama harus berupa teks.',
            'pekerjaan_ibu.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'alamat_orang_tua.required' => 'Nama wajib diisi.',

            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat lahir tidak boleh lebih dari 255 karakter.',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'tahun_masuk.required' => 'Tahun masuk wajib diisi.',
            'tahun_masuk.digits' => 'Tahun masuk harus berupa 4 digit angka.',

            'tahun_lulus.digits' => 'Tahun lulus harus berupa 4 digit angka.',

            'kelas_id.required' => 'Kelas wajib diisi.',
            'kelas_id.string' => 'Kelas harus berupa teks',
            'kelas_id.max' => 'Kelas tidak boleh lebih dari 255 karakter.',

            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status hanya boleh "lulus" atau "belum lulus".',

            'guru_id.required' => 'Guru wajib diisi.',
        ]);

        $siswa->update($validated); // Mengupdate data

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Menghapus data siswa
    public function destroy(Siswa $siswa)
    {
        $siswa->delete(); // Menghapus data

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
