<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'file_name',
        'file_format',
        'file_size',
        'file_path',
    ];

    /**
     * Save the uploaded file to storage with a SHA-256 hash and random string as the file_name.
     *
     * @param  \Illuminate\Http\UploadedFile  $file  The file to be saved.
     * @param  string  $folder  The folder path where the file will be stored.
     * @return self The created file model instance.
     */
    public static function saveFile($file, $folder)
    {
        $userId = Auth::id();

        // Generate a SHA-256 hash for the file
        $fileHash = hash_file('sha256', $file->getRealPath());
        $randomString = bin2hex(random_bytes(20));
        $extension = $file->getClientOriginalExtension();

        // Construct the storage path
        $path = "{$folder}/{$userId}/".date('Y/m')."/{$fileHash}{$randomString}.{$extension}";
        Storage::disk('local')->makeDirectory(dirname($path));
        Storage::disk('local')->put($path, file_get_contents($file->getRealPath()));

        return self::create([
            'file_name' => $file->getClientOriginalName(),
            'file_format' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'file_path' => $path,
        ]);
    }

    /**
     * Update the file details and optionally replace the file in storage.
     *
     * @param  \Illuminate\Http\UploadedFile|null  $newFile  The new file to replace the existing one.
     * @return bool Indicates whether the update was successful.
     */
    public function updateFile($newFile = null)
    {
        // Check if a new file is provided
        if ($newFile) {
            // Generate a new SHA-256 hash for the new file
            $newFileHash = hash_file('sha256', $newFile->getRealPath());
            $randomString = bin2hex(random_bytes(20));
            $extension = $newFile->getClientOriginalExtension();

            // Create a new storage path for the file
            $newPath = dirname($this->file_path)."/{$newFileHash}{$randomString}.{$extension}";

            // Delete the old file if it exists in storage
            if ($this->file_path && Storage::disk('local')->exists($this->file_path)) {
                Storage::disk('local')->delete($this->file_path);
            }

            // Store the new file
            Storage::disk('local')->put($newPath, file_get_contents($newFile->getRealPath()));

            // Update model properties with new file information
            $this->file_path = $newPath;
            $this->file_size = $newFile->getSize();
            $this->file_format = $newFile->getClientMimeType();
            $this->file_name = $newFile->getClientOriginalName();
        }

        return $this->save();
    }

    /**
     * Retrieve the file model by its ID.
     *
     * @param  string  $id  The ID of the file to retrieve.
     * @return mixed The file model instance or null if not found.
     */
    public static function retrieveFile($id)
    {
        return self::find($id);
    }

    /**
     * Delete the file from storage and the database by its ID.
     *
     * @param  string  $id  The ID of the file to delete.
     * @return bool|null Indicates whether the deletion was successful.
     */
    public static function deleteFile($id)
    {
        $file = self::find($id);
        if ($file) {
            Storage::disk('local')->delete($file->file_path);

            return $file->delete();
        }

        return false;
    }

    /**
     * Get the URL to access the file.
     *
     * @return string|null The URL for the file, or null if not accessible.
     */
    public function url()
    {
        return Storage::url($this->file_path);
    }
}
