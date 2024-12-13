<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role "Superadmin" jika belum ada
        $superadminRole = Role::firstOrCreate(['name' => 'Superadmin']);

        // Buat akun Superadmin
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@example.com', // Ganti dengan email pilihan
            'nomor_hp' => '081234567890', // Ganti dengan nomor telepon pilihan
            'password' => Hash::make('password123'), // Ganti dengan password aman
            'status' => 'active',
        ]);

        // Berikan role "Superadmin" ke pengguna ini
        $superadmin->assignRole($superadminRole);
    }
}
