<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Index: Menampilkan daftar pengguna
    public function index()
    {
        if (! Auth::user()->hasRole('Superadmin')) {
            Auth::logout();

            return redirect('/login')->withErrors(['error' => 'Akses di tolak, anda tidak memiliki izin !']);
        }
        $users = User::with('guru', 'roles')->paginate(10); // Mendapatkan semua pengguna beserta guru yang terhubung

        return view('users.index', compact('users'));
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
        if (! Auth::user()->hasRole('Superadmin')) {
            Auth::logout();

            return redirect('/login')->withErrors(['error' => 'Akses di tolak, anda tidak memiliki izin !']);
        }
        $user = User::findOrFail($id);
        $gurus = Guru::all();
        $roles = Role::orderBy('name', 'ASC')->get();
        $hasRoles = $user->roles->pluck('id');

        return view('users.edit', compact('user', 'gurus', 'roles', 'hasRoles')); // Kirim data user dan guru ke view
    }

    public function update(Request $request, User $user)
    {
        if (! Auth::user()->hasRole('Superadmin')) {
            Auth::logout();

            return redirect('/login')->withErrors(['error' => 'Akses di tolak, anda tidak memiliki izin !']);
        }
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'nomor_hp' => 'nullable|string|max:20',
            'status' => 'required|in:inactive,active,banned',
            'guru_id' => 'nullable|exists:guru,id',
            'password' => 'nullable|string|min:8|confirmed', // Pastikan password di-validasi
        ]);

        // Perbarui data user
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'nomor_hp' => $validated['nomor_hp'],
            'status' => $validated['status'],
            'guru_id' => $validated['guru_id'],
        ]);

        // Jika password diinputkan, perbarui password
        if ($request->filled('password')) {
            $user->password = bcrypt($validated['password']);
            $user->save();
        }

        // Jika user adalah superadmin, peran bisa diubah
        if (auth()->user()->hasRole('Superadmin')) {
            $user->syncRoles($request->input('role', []));
        }

        return redirect()->route('users.index')->with('success', 'User Berhasil Diperbarui.');
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
}
