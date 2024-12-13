<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Show all Guru
    public function index()
    {
        $gurus = Guru::all();

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
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru has been added successfully.');
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
            'nip' => 'required|string|unique:guru,nip,'.$guru->id.'|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'mata_pelajaran' => 'required|string|max:255',
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru has been updated successfully.');
    }

    // Delete an existing Guru
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru has been deleted successfully.');
    }
}
