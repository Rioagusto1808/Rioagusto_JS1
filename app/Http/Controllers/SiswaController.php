<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    // Menampilkan data siswa
    public function index(Request $request)
    {
        $nama = $request->input('nama');
        $nis = $request->input('nis');
        $status = $request->input('status');
        $kelas_id = $request->input('kelas_id');

        $query = Siswa::query();
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

        $siswa = $query->paginate(10);

        $kelas = Kelas::all();

        return view('siswa.index', compact('siswa', 'kelas', 'nama', 'nis', 'status', 'kelas_id'));
    }

    // Menampilkan form untuk membuat siswa baru
    public function create()
    {
        $kelas = Kelas::all();

        return view('siswa.create', compact('kelas'));
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'tahun_masuk' => 'required|digits:4',
            'tahun_lulus' => 'nullable|digits:4',
            'kelas_id' => 'required|exists:kelas,id',
            'status' => 'required|in:lulus,belum lulus',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nis.required' => 'NIS wajib diisi.',
            'nis.string' => 'NIS harus berupa teks.',
            'nis.max' => 'NIS tidak boleh lebih dari 20 karakter.',
            'nis.unique' => 'NIS sudah terdaftar di sistem.',

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
        ]);

        Siswa::create($validated); // Menyimpan data

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data siswa
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    // Mengupdate data siswa
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => [
                'required',
                'string',
                'max:255',
                Rule::unique('siswa', 'nis')->ignore($siswa),
            ],
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'tahun_masuk' => 'required|digits:4',
            'tahun_lulus' => 'nullable|digits:4',
            'kelas_id' => 'required|exists:kelas,id',
            'status' => 'required|in:lulus,belum lulus',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nis.required' => 'NIS wajib diisi.',
            'nis.string' => 'NIS harus berupa teks.',
            'nis.max' => 'NIS tidak boleh lebih dari 20 karakter.',
            'nis.unique' => 'NIS sudah terdaftar di sistem.',

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
