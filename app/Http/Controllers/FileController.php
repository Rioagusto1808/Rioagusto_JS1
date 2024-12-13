<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    /**
     * Display the specified file.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);

        if (! $file) {
            abort(404); // Jika file tidak ditemukan, tampilkan 404
        }

        // Ambil file dari storage private
        $filePath = $file->file_path;

        if (Storage::disk('local')->exists($filePath)) {
            // Mengembalikan file dengan tipe MIME yang sesuai
            return response()->file(Storage::disk('local')->path($filePath), [
                'Content-Type' => $file->file_type, // Mengatur tipe konten
                'Content-Disposition' => 'inline; filename="'.$file->filename.'"', // Mengatur disposition
            ]);
        }

        abort(404); // Jika file tidak ada di storage
    }

    public function download($id): StreamedResponse
    {
        // Ambil data file berdasarkan ID dari lawArticleStores
        $file = File::findOrFail($id);

        // Periksa apakah file ada di storage
        if (Storage::disk('local')->exists($file->file_path)) {

            // Mengunduh file dengan nama aslinya
            return Storage::download($file->file_path, $file->file_name);
        }

        // Jika file tidak ditemukan, tampilkan pesan error
        abort(404, 'File not found.');
    }
}
