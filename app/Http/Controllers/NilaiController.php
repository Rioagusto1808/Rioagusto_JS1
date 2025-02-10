<?php

namespace App\Http\Controllers;

use App\Models\DetailNilai;
use App\Models\Guru;
use App\Models\Ketidakhadiran;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Menampilkan semua data Nilai.
     */
    public function index(Request $request)
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil nilai pencarian dari request
        $siswaId = $request->get('siswa_id');
        $semester = $request->get('semester');

        // Ambil daftar siswa untuk dropdown filter
        $siswaIdList = Siswa::all(); // Ambil semua siswa untuk dropdown

        // Query untuk mengambil data nilai dengan pencarian
        $query = Nilai::with('detailNilai', 'siswa', 'guru')->latest();

        // Cek role dan filter data sesuai
        if ($user->hasRole('Siswa')) {
            // Jika role Siswa, tampilkan hanya nilai siswa yang sesuai dengan nama user
            $query->whereHas('siswa', function ($q) use ($user) {
                $q->where('nama', $user->name);
            });
        } elseif ($user->hasRole('Guru')) {
            // Jika role Guru, tampilkan hanya nilai yang dibuat oleh guru tersebut
            $query->where('guru_id', $user->guru_id);
        } elseif ($user->hasRole('Superadmin')) {
            // Jika role Superadmin, tampilkan semua data (tidak ada filter tambahan)
            // Tidak ada filter tambahan karena superadmin punya akses penuh
        } else {
            // Jika role tidak dikenali, tolak akses
            return abort(403, 'Anda tidak memiliki akses untuk melihat nilai.');
        }

        // Filter berdasarkan siswa_id jika ada
        if ($siswaId) {
            $query->where('siswa_id', $siswaId);
        }

        // Filter berdasarkan semester jika ada
        if ($semester) {
            $query->where('semester', $semester);
        }

        // Ambil data dengan paginasi
        $nilai = $query->paginate(10);

        // Kirim data ke view
        return view('nilai.index', compact('nilai', 'siswaIdList', 'siswaId', 'semester'));
    }

    /**
     * Menampilkan form untuk membuat data Nilai baru.
     */
    public function create()
    {
        // Dapatkan guru dari user yang sedang login
        $guru = auth()->user()->guru; // Asumsi user memiliki relasi dengan Guru melalui guru()

        // Filter siswa berdasarkan guru_id dari guru yang sedang login
        $siswa = Siswa::where('guru_id', $guru->id)->get();

        // Ambil data guru (jika dibutuhkan untuk dropdown atau informasi tambahan)
        $guru = Guru::get();

        // Ambil mata pelajaran (jika dibutuhkan untuk form)
        $mapel = MataPelajaran::get();

        return view('nilai.create', compact('siswa', 'guru', 'mapel'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'tahun_ajaran' => 'required|string',
            'semester' => 'required|integer',
            'guru_id' => 'required|exists:guru,id',
            'detail_nilai' => 'required|array',
            'detail_nilai.*.mapel_id' => 'required|exists:mata_pelajaran,id',
            'detail_nilai.*.guru_id' => 'required|exists:guru,id',
            'detail_nilai.*.nilai' => 'required|numeric',
            'detail_nilai.*.keterangan' => 'nullable|string',
            'ketidakhadiran' => 'nullable|array',
            'ketidakhadiran.sakit' => 'nullable|integer|min:0',
            'ketidakhadiran.izin' => 'nullable|integer|min:0',
            'ketidakhadiran.tanpa_keterangan' => 'nullable|integer|min:0',
        ]);

        DB::transaction(function () use ($validatedData) {
            // Create Nilai
            $nilai = Nilai::create([
                'siswa_id' => $validatedData['siswa_id'],
                'tahun_ajaran' => $validatedData['tahun_ajaran'],
                'semester' => $validatedData['semester'],
                'guru_id' => $validatedData['guru_id'],
            ]);

            // Create Detail Nilai
            foreach ($validatedData['detail_nilai'] as $detail) {
                DetailNilai::create([
                    'nilai_id' => $nilai->id,
                    'guru_id' => $detail['guru_id'],
                    'mapel_id' => $detail['mapel_id'],
                    'nilai' => $detail['nilai'],
                    'keterangan' => $detail['keterangan'] ?? null,
                ]);
            }

            // Create Ketidakhadiran (attendance)
            if (isset($validatedData['ketidakhadiran'])) {
                Ketidakhadiran::create([
                    'siswa_id' => $validatedData['siswa_id'],
                    'sakit' => $validatedData['ketidakhadiran']['sakit'] ?? 0,
                    'izin' => $validatedData['ketidakhadiran']['izin'] ?? 0,
                    'tanpa_keterangan' => $validatedData['ketidakhadiran']['tanpa_keterangan'] ?? 0,
                ]);
            }
        });

        return redirect()->route('nilai.index')->with('success', 'Data Nilai, Detail Nilai, dan Ketidakhadiran berhasil disimpan');
    }

    /**
     * Menampilkan detail Nilai berdasarkan ID.
     */
    public function show($id)
    {
        // Ambil data nilai beserta detailNilai, siswa, dan guru
        $nilai = Nilai::with('detailNilai', 'siswa', 'guru')->find($id);

        if (! $nilai) {
            return redirect()->route('nilai.index')->with('error', 'Data Nilai tidak ditemukan');
        }

        // Ambil data ketidakhadiran berdasarkan siswa_id
        $ketidakhadiran = Ketidakhadiran::where('siswa_id', $nilai->siswa_id)->first();

        // Kirim data nilai dan ketidakhadiran ke view
        return view('nilai.show', compact('nilai', 'ketidakhadiran'));
    }

    /**
     * Menampilkan form edit untuk data Nilai.
     */
    public function edit($id)
    {
        // Dapatkan guru dari user yang sedang login
        $guru = auth()->user()->guru; // Asumsi user memiliki relasi dengan Guru melalui guru()

        // Filter siswa berdasarkan guru_id dari guru yang sedang login
        $siswa = Siswa::where('guru_id', $guru->id)->get();

        // Ambil semua data guru untuk kebutuhan dropdown atau informasi tambahan
        $guru = Guru::all();

        // Ambil mata pelajaran untuk kebutuhan form
        $mapel = MataPelajaran::all();

        // Ambil ketidakhadiran untuk siswa yang sesuai dengan nilai yang diedit
        $nilai = Nilai::with('detailNilai')->find($id);

        if (! $nilai) {
            return redirect()->route('nilai.index')->with('error', 'Data Nilai tidak ditemukan');
        }

        // Dapatkan ketidakhadiran berdasarkan siswa_id
        $ketidakhadiran = Ketidakhadiran::where('siswa_id', $nilai->siswa_id)->first();

        // Jika tidak ada ketidakhadiran untuk siswa ini, set $ketidakhadiran menjadi null
        if (! $ketidakhadiran) {
            $ketidakhadiran = null;
        }

        return view('nilai.edit', compact('nilai', 'guru', 'mapel', 'siswa', 'ketidakhadiran'));
    }

    /**
     * Memperbarui data Nilai dan DetailNilai.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'guru_id' => 'required|exists:guru,id',
            'tahun_ajaran' => 'required|string|max:255',
            'semester' => 'required|integer',
            'detail_nilai.*.guru_id' => 'nullable|exists:guru,id',
            'detail_nilai.*.mapel_id' => 'nullable|exists:mata_pelajaran,id',
            'detail_nilai.*.nilai' => 'nullable|numeric',
            'detail_nilai.*.keterangan' => 'nullable|string|max:255',
            'ketidakhadiran' => 'nullable|array',
            'ketidakhadiran.sakit' => 'nullable|integer|min:0',
            'ketidakhadiran.izin' => 'nullable|integer|min:0',
            'ketidakhadiran.tanpa_keterangan' => 'nullable|integer|min:0',
        ]);

        // Update the main Nilai data
        $nilai = Nilai::findOrFail($id);
        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'guru_id' => $request->guru_id,
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
        ]);

        // Handle the detail nilai (subject and score details)
        $submittedIds = collect($request->detail_nilai)
            ->pluck('id')
            ->filter() // Only keep non-null IDs
            ->toArray();

        // Remove detail values not in the submitted data
        $nilai->detailNilai()->whereNotIn('id', $submittedIds)->delete();

        // Update or add new detail values
        foreach ($request->detail_nilai as $detail) {
            if (isset($detail['id'])) {
                // Update existing detail value
                DetailNilai::where('id', $detail['id'])->update([
                    'guru_id' => $detail['guru_id'],
                    'mapel_id' => $detail['mapel_id'],
                    'nilai' => $detail['nilai'],
                    'keterangan' => $detail['keterangan'],
                ]);
            } else {
                // Add new detail value
                $nilai->detailNilai()->create([
                    'guru_id' => $detail['guru_id'],
                    'mapel_id' => $detail['mapel_id'],
                    'nilai' => $detail['nilai'],
                    'keterangan' => $detail['keterangan'],
                ]);
            }
        }

        // Handle ketidakhadiran (attendance)
        if (isset($request->ketidakhadiran)) {
            // Find existing attendance data
            $ketidakhadiran = Ketidakhadiran::where('siswa_id', $request->siswa_id)->first();

            if ($ketidakhadiran) {
                // Update existing attendance record
                $ketidakhadiran->update([
                    'sakit' => $request->ketidakhadiran['sakit'] ?? 0,
                    'izin' => $request->ketidakhadiran['izin'] ?? 0,
                    'tanpa_keterangan' => $request->ketidakhadiran['tanpa_keterangan'] ?? 0,
                ]);
            } else {
                // If no attendance record exists, create a new one
                Ketidakhadiran::create([
                    'siswa_id' => $request->siswa_id,
                    'sakit' => $request->ketidakhadiran['sakit'] ?? 0,
                    'izin' => $request->ketidakhadiran['izin'] ?? 0,
                    'tanpa_keterangan' => $request->ketidakhadiran['tanpa_keterangan'] ?? 0,
                ]);
            }
        }

        // Redirect with success message
        return redirect()->route('nilai.index')->with('success', 'Data nilai dan ketidakhadiran berhasil diperbarui.');
    }

    /**
     * Menghapus data Nilai dan DetailNilai terkait.
     */
    public function destroy($id)
    {
        $nilai = Nilai::find($id);

        if (! $nilai) {
            return redirect()->route('nilai.index')->with('error', 'Data Nilai tidak ditemukan');
        }

        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
