<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Daftar Role dan Permissions
        $rolesWithPermissions = [
            'Kepala Sekolah' => ['Kepala Sekolah'],
            'Staff' => ['Staff'],
            'Guru' => ['Guru'],
            'Siswa' => ['Siswa'],
        ];

        // Membuat role Superadmin tanpa permissions
        Role::create(['name' => 'Superadmin']);

        // Loop untuk membuat Permissions dan Roles lainnya
        foreach ($rolesWithPermissions as $role => $permissions) {
            // Membuat role
            $roleModel = Role::create(['name' => $role]);

            // Membuat permissions dan menambahkan ke role
            foreach ($permissions as $permission) {
                $permissionModel = Permission::firstOrCreate(['name' => $permission]);
                $roleModel->givePermissionTo($permissionModel);
            }
        }
    }
}
