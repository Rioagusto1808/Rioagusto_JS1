<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $tingkat = $request->get('tingkat');

        $query = Kelas::query();

        if (! empty($tingkat)) {
            $query->where('tingkat', 'LIKE', "%{$tingkat}%");
        }

        $kelas = $query->latest()->paginate(10);

        return view('kelas.index', compact('kelas', 'tingkat'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tingkat' => 'required|string|max:255|unique:kelas',
        ], [
            'tingkat.required' => 'Tingkat kelas wajib diisi.',
            'tingkat.string' => 'Tingkat kelas harus berupa teks.',
            'tingkat.max' => 'Tingkat kelas tidak boleh lebih dari 255 karakter.',
            'tingkat.unique' => 'Tingkat kelas sudah terdaftar.',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tingkat' => 'required|string|max:255|unique:kelas,tingkat,'.$id,
        ], [
            'tingkat.required' => 'Tingkat kelas wajib diisi.',
            'tingkat.string' => 'Tingkat kelas harus berupa teks.',
            'tingkat.max' => 'Tingkat kelas tidak boleh lebih dari 255 karakter.',
            'tingkat.unique' => 'Tingkat kelas sudah terdaftar.',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
