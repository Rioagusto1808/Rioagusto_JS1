<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mataPelajaran = MataPelajaran::latest()->paginate(10);

        return view('mata_pelajaran.index', compact('mataPelajaran'));
    }

    public function create()
    {
        return view('mata_pelajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'kode_mapel' => 'required|string|max:50|unique:mata_pelajaran',
        ], [
            'nama_mapel.required' => 'Nama Mata Pelajaran wajib diisi.',
            'nama_mapel.string' => 'Nama Mata Pelajaran harus berupa teks.',
            'nama_mapel.max' => 'Nama Mata Pelajaran tidak boleh lebih dari 255 karakter.',
            'kode_mapel.required' => 'Kode Mata Pelajaran wajib diisi.',
            'kode_mapel.string' => 'Kode Mata Pelajaran harus berupa teks.',
            'kode_mapel.max' => 'Kode Mata Pelajaran tidak boleh lebih dari 50 karakter.',
            'kode_mapel.unique' => 'Kode Mata Pelajaran sudah terdaftar.',
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);

        return view('mata_pelajaran.edit', compact('mataPelajaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'kode_mapel' => [
                'required',
                'string',
                'max:255',
                Rule::unique('mata_pelajaran', 'kode_mapel')->ignore($id),
            ],
        ],
            [
                'nama_mapel.required' => 'Nama Mata Pelajaran wajib diisi.',
                'nama_mapel.string' => 'Nama Mata Pelajaran harus berupa teks.',
                'nama_mapel.max' => 'Nama Mata Pelajaran tidak boleh lebih dari 255 karakter.',
                'kode_mapel.required' => 'Kode Mata Pelajaran wajib diisi.',
                'kode_mapel.string' => 'Kode Mata Pelajaran harus berupa teks.',
                'kode_mapel.max' => 'Kode Mata Pelajaran tidak boleh lebih dari 50 karakter.',
                'kode_mapel.unique' => 'Kode Mata Pelajaran sudah terdaftar.',
            ]);

        $mataPelajaran = MataPelajaran::findOrFail($id);
        $mataPelajaran->update($request->all());

        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata Pelajaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);
        $mataPelajaran->delete();

        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata Pelajaran berhasil dihapus.');
    }
}
