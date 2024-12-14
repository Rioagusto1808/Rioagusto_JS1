<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class ShowImageController extends Controller
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
            abort(404); // If the file is not found, show 404
        }

        // Check if the file type indicates an image
        if (! str_starts_with($file->file_format, 'image/')) {
            abort(404); // If the file is not an image, show 404
        }

        // Get the file path from storage
        $filePath = $file->file_path;

        if (Storage::disk('local')->exists($filePath)) {
            // Return the file with the appropriate MIME type
            return response()->file(Storage::disk('local')->path($filePath), [
                'Content-Type' => $file->file_format, // Set the content type
                'Content-Disposition' => 'inline; filename="'.$file->file_name.'"', // Set disposition
            ]);
        }

        abort(404); // If the file does not exist in storage
    }
}
