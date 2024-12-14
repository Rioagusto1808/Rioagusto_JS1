<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    // Show all Guru
    public function index()
    {
        $gurus = Guru::paginate(10);

        return view('guru.index', compact('gurus'));
    }

    // Show the form to create a new Guru
    public function create()
    {
        return view('guru.create');
    }

    // Store a newly created Guru in the database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:guru,nip|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'mata_pelajaran' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nip.required' => 'NIP wajib diisi.',
            'nip.string' => 'NIP harus berupa teks.',
            'nip.unique' => 'NIP sudah terdaftar.',
            'nip.max' => 'NIP tidak boleh lebih dari 255 karakter.',

            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat lahir tidak boleh lebih dari 255 karakter.',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'mata_pelajaran.required' => 'Mata pelajaran wajib diisi.',
            'mata_pelajaran.string' => 'Mata pelajaran harus berupa teks.',
            'mata_pelajaran.max' => 'Mata pelajaran tidak boleh lebih dari 255 karakter.',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru Telah Ditambahkan.');
    }

    // Show the form to edit an existing Guru
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    // Update an existing Guru in the database
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => [
                'required',
                'string',
                'max:255',
                Rule::unique('guru', 'nip')->ignore($guru),
            ],
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'mata_pelajaran' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nip.required' => 'NIP wajib diisi.',
            'nip.string' => 'NIP harus berupa teks.',
            'nip.unique' => 'NIP sudah terdaftar.',
            'nip.max' => 'NIP tidak boleh lebih dari 255 karakter.',

            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat lahir tidak boleh lebih dari 255 karakter.',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'mata_pelajaran.required' => 'Mata pelajaran wajib diisi.',
            'mata_pelajaran.string' => 'Mata pelajaran harus berupa teks.',
            'mata_pelajaran.max' => 'Mata pelajaran tidak boleh lebih dari 255 karakter.',
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru Telah Diperbarui.');
    }

    // Delete an existing Guru
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru telah dihapus.');
    }
}
