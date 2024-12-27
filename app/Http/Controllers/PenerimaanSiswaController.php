<?php

namespace App\Http\Controllers;

use App\Models\PenerimaanSiswaBaru;
use Illuminate\Http\Request;

class PenerimaanSiswaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai filter dari request
        $nama = $request->get('nama');
        $nisn = $request->get('nisn');
        $status = $request->get('status');

        // Query dasar
        $query = PenerimaanSiswaBaru::query();

        // Tambahkan kondisi pencarian
        if (! empty($nama)) {
            $query->where('nama', 'LIKE', "%{$nama}%");
        }

        if (! empty($nisn)) {
            $query->where('nisn', 'LIKE', "%{$nisn}%");
        }

        if (! empty($status)) {
            $query->where('status', $status);
        }

        $siswa = $query->paginate(10);

        return view('penerimaan.index', compact('siswa', 'nama', 'nisn', 'status'));
    }

    // Menampilkan form untuk membuat penerimaan siswa baru
    public function create()
    {
        return view('penerimaan.create');
    }

    // Menyimpan penerimaan siswa baru ke database
    public function store(Request $request)
    {
        // Validasi input dengan pesan kustom
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|unique:penerimaan_siswa_baru,nisn|max:20',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'status' => 'required|in:diterima,ditolak,menunggu',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nisn.required' => 'NISN wajib diisi.',
            'nisn.string' => 'NISN harus berupa teks.',
            'nisn.unique' => 'NISN sudah terdaftar, silakan gunakan NISN lain.',
            'nisn.max' => 'NISN tidak boleh lebih dari 20 karakter.',

            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat lahir tidak boleh lebih dari 255 karakter.',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus salah satu dari: diterima, ditolak, atau menunggu.',
        ]);

        // Simpan data ke database
        PenerimaanSiswaBaru::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('penerimaan.index')->with('success', 'Penerimaan siswa baru berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Mencari data siswa berdasarkan ID
        $siswa = PenerimaanSiswaBaru::findOrFail($id);

        // Menampilkan halaman detail siswa
        return view('penerimaan.show', compact('siswa'));
    }

    // Menampilkan form untuk mengedit penerimaan siswa
    public function edit($id)
    {
        $siswa = PenerimaanSiswaBaru::findOrFail($id);

        return view('penerimaan.edit', compact('siswa'));
    }

    // Mengupdate data penerimaan siswa
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|unique:penerimaan_siswa_baru,nisn,'.$id.'|max:20',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'status' => 'required|in:diterima,ditolak,menunggu',
        ]);

        // Update data siswa
        $siswa = PenerimaanSiswaBaru::findOrFail($id);
        $siswa->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('penerimaan.index')->with('success', 'Penerimaan siswa berhasil diperbarui.');
    }

    // Menghapus penerimaan siswa
    public function destroy($id)
    {
        // Cari data siswa berdasarkan ID dan hapus
        $siswa = PenerimaanSiswaBaru::findOrFail($id);
        $siswa->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('penerimaan.index')->with('success', 'Penerimaan siswa berhasil dihapus.');
    }
}
