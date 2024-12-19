<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $judul = $request->get('judul');
        $status = $request->get('status');

        $query = Berita::query();

        if (! empty($judul)) {
            $query->where('judul', 'LIKE', "%{$judul}%");
        }

        if (! empty($status)) {
            $query->where('status', $status);
        }

        $beritas = $query->latest()->paginate(10);

        return view('berita.index', compact('beritas', 'judul', 'status'));
    }

    public function create()
    {
        $users = User::all();

        return view('berita.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published,archived',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',  // max 10MB (10240 KB)
        ], [
            'user_id.required' => 'ID pengguna wajib diisi.',
            'user_id.exists' => 'ID pengguna tidak valid.',
            'judul.required' => 'Judul wajib diisi.',
            'judul.string' => 'Judul harus berupa string.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa string.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus salah satu dari draft, published, atau archived.',
            'image.required' => 'Gambar sampul wajib diunggah.',
            'image.image' => 'Gambar sampul harus berupa file gambar.',
            'image.mimes' => 'Gambar sampul hanya dapat berupa file dengan ekstensi jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar sampul maksimal 10MB.',
        ]);

        $file = File::saveFile($request->file('image'), 'cover_images');

        Berita::create([
            'user_id' => $request->user_id,
            'judul' => $request->judul,
            'content' => $request->content,
            'status' => $request->status,
            'file_id' => $file->id,

        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function show($id)
    {
        // Ambil berita berdasarkan id
        $berita = Berita::with('user')->findOrFail($id);

        // Tampilkan view dengan data berita
        return view('berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        $users = User::all();

        return view('berita.edit', compact('berita', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published,archived',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // maksimal 10MB
        ], [
            'user_id.required' => 'ID pengguna wajib diisi.',
            'user_id.exists' => 'ID pengguna tidak valid.',
            'judul.required' => 'Judul wajib diisi.',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa teks.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus salah satu dari draft, published, atau archived.',
            'image.image' => 'Gambar sampul harus berupa file gambar.',
            'image.mimes' => 'Gambar sampul hanya dapat berupa file dengan ekstensi jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar sampul maksimal 10MB.',
        ]);

        // Temukan berita berdasarkan ID
        $berita = Berita::findOrFail($id);

        // Update data berita
        $berita->update([
            'user_id' => $validated['user_id'],
            'judul' => $validated['judul'],
            'content' => $validated['content'],
            'status' => $validated['status'],
        ]);

        // Logika untuk gambar
        if ($request->hasFile('image')) {
            // Jika ada gambar baru, hapus gambar lama
            if ($berita->file_id) {
                File::deleteFile($berita->file_id);
            }

            // Simpan gambar baru
            $file = File::saveFile($request->file('image'), 'cover_images');
            $berita->file_id = $file->id; // Update dengan ID file baru
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            // Tidak perlu melakukan apa-apa karena file_id tidak diubah
        }

        // Simpan perubahan pada berita
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        // Delete the image from storage if it exists
        if ($berita->image) {
            Storage::disk('public')->delete($berita->image);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function BeritaAllLandingPages(Request $request)
    {
        $search = $request->input('search');
        $berita = Berita::when($search, function ($query, $search) {
            return $query->where('judul', 'like', '%'.$search.'%');
        })->
        where('status', 'published')->latest()->paginate(16);

        return view('landingpages.fullBerita', compact('berita'));

    }

    public function GaleriAllLandingPages()
    {
        $galeri = Berita::inRandomOrder()->where('status', 'published')->latest()->paginate(16);

        return view('landingpages.fullGaleri', compact('galeri'));

    }

    public function BeritaAllLandingPagesId($id)
    {
        $berita = Berita::with('user', 'file')->findOrFail($id);
        $beritas = Berita::where('status', 'published')
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('landingpages.fullBeritaId', compact('berita', 'beritas'));
    }
}
