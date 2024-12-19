<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $nama_jadwal = $request->get('nama_jadwal');
        $kelas_id = $request->get('kelas_id');

        $kelas = Kelas::all(); // Mendapatkan semua data kelas untuk dropdown

        $jadwals = Jadwal::with('details.kelas', 'details.guru', 'details.mataPelajaran')
            ->when($nama_jadwal, function ($query, $nama_jadwal) {
                $query->where('nama_jadwal', 'like', "%{$nama_jadwal}%");
            })
            ->when($kelas_id, function ($query, $kelas_id) {
                $query->whereHas('details.kelas', function ($query) use ($kelas_id) {
                    $query->where('id', $kelas_id);
                });
            })
            ->paginate(10);

        return view('jadwal.index', compact('jadwals', 'kelas', 'nama_jadwal', 'kelas_id'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $mataPelajaran = MataPelajaran::all();
        $gurus = Guru::all();

        return view('jadwal.create', compact('kelas', 'mataPelajaran', 'gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jadwal' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'periode_mulai' => 'nullable|date',
            'periode_selesai' => 'nullable|date',
            'details.*.hari' => 'required|string',
            'details.*.waktu_mulai' => 'required|date_format:H:i',
            'details.*.waktu_selesai' => 'required|date_format:H:i|after:details.*.waktu_mulai',
            'details.*.kelas_id' => 'required|exists:kelas,id',
            'details.*.guru_id' => 'required|exists:guru,id',
            'details.*.mapel_id' => 'required|exists:mata_pelajaran,id',
        ], [
            'nama_jadwal.required' => 'Nama jadwal wajib diisi.',
            'nama_jadwal.string' => 'Nama jadwal harus berupa teks.',
            'nama_jadwal.max' => 'Nama jadwal tidak boleh lebih dari 255 karakter.',

            'kelas_id.required' => 'Kelas wajib dipilih untuk setiap detail jadwal.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',

            'periode_mulai.date' => 'Periode mulai harus berupa tanggal yang valid.',
            'periode_selesai.date' => 'Periode selesai harus berupa tanggal yang valid.',

            'details.*.hari.required' => 'Hari wajib dipilih untuk setiap detail jadwal.',
            'details.*.hari.string' => 'Hari harus berupa teks.',

            'details.*.waktu_mulai.required' => 'Waktu mulai wajib diisi untuk setiap detail jadwal.',
            'details.*.waktu_mulai.date_format' => 'Waktu mulai harus memiliki format jam yang valid (H:i).',

            'details.*.waktu_selesai.required' => 'Waktu selesai wajib diisi untuk setiap detail jadwal.',
            'details.*.waktu_selesai.date_format' => 'Waktu selesai harus memiliki format jam yang valid (H:i).',
            'details.*.waktu_selesai.after' => 'Waktu selesai harus setelah waktu mulai.',

            'details.*.kelas_id.required' => 'Kelas wajib dipilih untuk setiap detail jadwal.',
            'details.*.kelas_id.exists' => 'Kelas yang dipilih tidak valid.',

            'details.*.guru_id.required' => 'Guru wajib dipilih untuk setiap detail jadwal.',
            'details.*.guru_id.exists' => 'Guru yang dipilih tidak valid.',

            'details.*.mapel_id.required' => 'Mata pelajaran wajib dipilih untuk setiap detail jadwal.',
            'details.*.mapel_id.exists' => 'Mata pelajaran yang dipilih tidak valid.',
        ]);

        $jadwal = Jadwal::create($request->only('nama_jadwal', 'kelas_id', 'periode_mulai', 'periode_selesai'));

        foreach ($request->details as $detail) {
            $jadwal->details()->create($detail);
        }

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Fetch the Jadwal with its associated details, kelas, mapel, and guru
        $jadwal = Jadwal::with('details.kelas', 'details.mataPelajaran', 'details.guru')->findOrFail($id);

        // Return the 'show' view and pass the jadwal data to it
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit(Jadwal $jadwal)
    {
        $kelas = Kelas::all();
        $mataPelajaran = MataPelajaran::all();
        $gurus = Guru::all();
        $jadwal->load('details');

        return view('jadwal.edit', compact('jadwal', 'kelas', 'mataPelajaran', 'gurus'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'nama_jadwal' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'periode_mulai' => 'nullable|date',
            'periode_selesai' => 'nullable|date',
            'details.*.hari' => 'required|string',
            'details.*.waktu_mulai' => 'required|date_format:H:i',
            'details.*.waktu_selesai' => 'required|date_format:H:i|after:details.*.waktu_mulai',
            'details.*.kelas_id' => 'required|exists:kelas,id',
            'details.*.guru_id' => 'required|exists:guru,id',
            'details.*.mapel_id' => 'required|exists:mata_pelajaran,id',
        ], [
            'nama_jadwal.required' => 'Nama jadwal wajib diisi.',
            'nama_jadwal.string' => 'Nama jadwal harus berupa teks.',
            'nama_jadwal.max' => 'Nama jadwal tidak boleh lebih dari 255 karakter.',

            'kelas_id.required' => 'Kelas wajib dipilih untuk setiap detail jadwal.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',

            'periode_mulai.date' => 'Periode mulai harus berupa tanggal yang valid.',
            'periode_selesai.date' => 'Periode selesai harus berupa tanggal yang valid.',

            'details.*.hari.required' => 'Hari wajib dipilih untuk setiap detail jadwal.',
            'details.*.hari.string' => 'Hari harus berupa teks.',

            'details.*.waktu_mulai.required' => 'Waktu mulai wajib diisi untuk setiap detail jadwal.',
            'details.*.waktu_mulai.date_format' => 'Waktu mulai harus memiliki format jam yang valid (H:i).',

            'details.*.waktu_selesai.required' => 'Waktu selesai wajib diisi untuk setiap detail jadwal.',
            'details.*.waktu_selesai.date_format' => 'Waktu selesai harus memiliki format jam yang valid (H:i).',
            'details.*.waktu_selesai.after' => 'Waktu selesai harus setelah waktu mulai.',

            'details.*.kelas_id.required' => 'Kelas wajib dipilih untuk setiap detail jadwal.',
            'details.*.kelas_id.exists' => 'Kelas yang dipilih tidak valid.',

            'details.*.guru_id.required' => 'Guru wajib dipilih untuk setiap detail jadwal.',
            'details.*.guru_id.exists' => 'Guru yang dipilih tidak valid.',

            'details.*.mapel_id.required' => 'Mata pelajaran wajib dipilih untuk setiap detail jadwal.',
            'details.*.mapel_id.exists' => 'Mata pelajaran yang dipilih tidak valid.',
        ]);

        $jadwal->update($request->only('nama_jadwal', 'kelas_id', 'periode_mulai', 'periode_selesai'));

        $jadwal->details()->delete();
        foreach ($request->details as $detail) {
            $jadwal->details()->create($detail);
        }

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
