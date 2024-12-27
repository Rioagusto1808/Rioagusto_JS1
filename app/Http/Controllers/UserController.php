<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (! Auth::user()->hasRole('Superadmin')) {
            Auth::logout();

            return redirect('/login')->withErrors(['error' => 'Akses di tolak, anda tidak memiliki izin!']);
        }

        // Ambil filter dari request
        $nama = $request->get('nama');
        $email = $request->get('email');
        $status = $request->get('status');
        $guru_id = $request->get('guru_id');

        // Query awal
        $query = User::with('guru', 'roles');

        // Tambahkan kondisi pencarian
        if (! empty($nama)) {
            $query->where('name', 'LIKE', "%{$nama}%");
        }

        if (! empty($email)) {
            $query->where('email', 'LIKE', "%{$email}%");
        }

        if (! empty($status)) {
            $query->where('status', $status);
        }

        if (! empty($guru_id)) {
            $query->where('guru_id', $guru_id);
        }

        $users = $query->paginate(10);

        $gurus = Guru::all();

        return view('users.index', compact('users', 'gurus', 'nama', 'email', 'status', 'guru_id'));
    }

    // Create: Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        if (! Auth::user()->hasRole('Superadmin')) {
            Auth::logout();

            return redirect('/login')->withErrors(['error' => 'Akses di tolak, anda tidak memiliki izin !']);
        }
        $roles = Role::orderBy('name', 'ASC')->get();
        $gurus = Guru::all(); // Mendapatkan semua data guru untuk opsi select

        return view('users.create', compact('gurus', 'roles'));
    }

    // Store: Menyimpan pengguna baru ke database
    public function store(Request $request)
    {
        if (! Auth::user()->hasRole('Superadmin')) {
            Auth::logout();

            return redirect('/login')->withErrors(['error' => 'Akses di tolak, anda tidak memiliki izin !']);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nomor_hp' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:inactive,active,banned',
            'guru_id' => 'nullable|exists:guru,id',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',

            'nomor_hp.string' => 'Nomor HP harus berupa teks.',
            'nomor_hp.max' => 'Nomor HP tidak boleh lebih dari 20 karakter.',

            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',

            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status yang dipilih tidak valid.',

            'guru_id.exists' => 'Guru yang dipilih tidak valid.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'nomor_hp' => $validated['nomor_hp'],
            'password' => Hash::make($validated['password']),
            'status' => $validated['status'],
            'guru_id' => $validated['guru_id'],
        ]);

        if ($request->has('role')) {
            $user->syncRoles($request->role);
        }

        return redirect()->route('users.index')->with('success', 'User Berhasil Dibuat.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $gurus = Guru::all();
        $roles = Role::orderBy('name', 'ASC')->get();
        $hasRoles = $user->roles->pluck('id');

        return view('users.edit', compact('user', 'gurus', 'roles', 'hasRoles')); // Kirim data user dan guru ke view
    }

    public function update(Request $request, User $user)
    {

        $isSuperAdmin = auth()->user()->hasRole('Superadmin');

        // Basic validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'nomor_hp' => 'nullable|string|max:20',
            'status' => 'required|in:inactive,active,banned',
            'guru_id' => 'nullable|exists:guru,id',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Profile picture validation
        ];

        // Add role validation if the user is a Superadmin
        if ($isSuperAdmin) {
            $rules['role'] = 'nullable|array';
            $rules['role.*'] = 'exists:roles,name';
        }

        // Perform validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $imageUuid = $user->profile_picture;  // Keep the current profile picture

        // Check if a new image is uploaded
        if ($request->hasFile('profile_picture')) {
            try {
                $newFile = $request->file('profile_picture'); // Get the uploaded file

                // If the user already has a profile picture, update it
                if ($user->profile_picture) {
                    $existingFile = File::find($user->profile_picture);
                    if ($existingFile) {
                        // Update the existing file
                        $existingFile->updateFile($newFile);
                        $imageUuid = $existingFile->id;  // Keep the same file ID after update
                    } else {
                        // If the profile picture exists but not found in DB (edge case), save new file
                        $newFileModel = new File;
                        $newFileModel->updateFile($newFile);  // Save new file
                        $imageUuid = $newFileModel->id;  // Get the new file ID
                    }
                } else {
                    // If there's no existing profile picture, save the new file
                    $newFileModel = new File;
                    $newFileModel->updateFile($newFile);  // Save new file
                    $imageUuid = $newFileModel->id;  // Get the new file ID
                }
            } catch (\Exception $e) {
                // Log any errors during image upload
                Log::error('Error during image upload: '.$e->getMessage());

                // Return error to the user with a friendly message
                return redirect()->back()->withErrors('Failed to upload image, please try again.');
            }
        }

        // Update user data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'nomor_hp' => $request->input('nomor_hp'),
            'status' => $request->input('status'),
            'guru_id' => $request->input('guru_id'),
        ]);

        $user->profile_picture = $imageUuid;
        $user->save();

        // If password is provided, update it
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }

        // Sync roles if the user is a Superadmin
        if ($isSuperAdmin) {
            if ($user->id === auth()->user()->id) {
                // Sync roles only if there is a change
                if ($request->has('role')) {
                    $roles = $request->input('role', []);  // Get the role input
                    $user->syncRoles($roles);  // Sync roles if there are any
                }
            } else {
                // Sync roles for users other than the Superadmin themselves
                $roles = $request->input('role', []);  // Get the role input
                $user->syncRoles($roles);  // Sync roles
            }
        }

        // Redirect to appropriate page after update
        if (str_contains(url()->previous(), '/users')) {
            return redirect('/users')->with('success', 'Profile updated successfully.');
        } else {
            return redirect('/profile')->with('success', 'Profile updated successfully.');
        }
    }

    // Delete: Menghapus pengguna
    public function destroy(User $user)
    {
        if (! Auth::user()->hasRole('Superadmin')) {
            Auth::logout();

            return redirect('/login')->withErrors(['error' => 'Akses di tolak, anda tidak memiliki izin !']);
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User Berhasil Dihapus.');
    }

    public function delete_picture($id)
    {

        $user = User::findOrFail($id);
        $defaultProfilePicture = File::where('file_name', 'default_profile.jpg')->first()->id ?? null;

        if ($user->profile_picture && $user->profile_picture != $defaultProfilePicture) {
            $oldImage = File::find($user->profile_picture);
            if ($oldImage) {
                Storage::disk('local')->delete($oldImage->file_path);
                $oldImage->delete();
            }
        }

        // Set profile picture to default
        $user->profile_picture = $defaultProfilePicture;
        $user->save();

        return redirect()->back()->with('success', 'Profile picture deleted successfully.');
    }
}
