<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter dari request
        $nama = $request->get('nama');
        $nip = $request->get('nip');
        $mapel_id = $request->get('mapel_id');

        // Query awal
        $query = Guru::query();

        // Tambahkan kondisi pencarian
        if (! empty($nama)) {
            $query->where('nama', 'LIKE', "%{$nama}%");
        }

        if (! empty($nip)) {
            $query->where('nip', 'LIKE', "%{$nip}%");
        }

        if (! empty($mapel_id)) {
            $query->where('mapel_id', $mapel_id);
        }

        // Paginate hasil query
        $gurus = $query->paginate(10);

        // Dapatkan daftar mapel untuk dropdown
        $mapels = MataPelajaran::all();

        return view('guru.index', compact('gurus', 'mapels', 'nama', 'nip', 'mapel_id'));
    }

    // Show the form to create a new Guru
    public function create()
    {
        $mapel = MataPelajaran::all();

        return view('guru.create', compact('mapel'));
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
            'mapel_id' => 'required|exists:mata_pelajaran,id',
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

            'mapel_id.required' => 'Mata pelajaran wajib diisi.',
            'mapel_id.string' => 'Mata pelajaran harus berupa teks.',
            'mapel_id.max' => 'Mata pelajaran tidak boleh lebih dari 255 karakter.',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru Telah Ditambahkan.');
    }

    // Show the form to edit an existing Guru
    public function edit(Guru $guru)
    {
        $mapel = MataPelajaran::all();

        return view('guru.edit', compact('guru', 'mapel'));
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
            'mapel_id' => 'required|exists:mata_pelajaran,id',
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

            'mapel_id.required' => 'Mata pelajaran wajib diisi.',
            'mapel_id.string' => 'Mata pelajaran harus berupa teks.',
            'mapel_id.max' => 'Mata pelajaran tidak boleh lebih dari 255 karakter.',
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
