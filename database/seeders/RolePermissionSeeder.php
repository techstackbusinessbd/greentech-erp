<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions
    $permissions = ['role.create', 'role.edit', 'role.delete', 'role.view'];

    foreach ($permissions as $perm) {
        Permission::firstOrCreate(['name' => $perm]);
    }

    // Super Admin Role
    $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
    $superAdmin->syncPermissions(Permission::all());

    // Admin Role
    $admin = Role::firstOrCreate(['name' => 'Admin']);
    $admin->syncPermissions(['role.view']);

    // Assign Role to User (ID = 1)
    $user = \App\Models\User::find(1);
    if ($user) {
        $user->assignRole('Super Admin');
    }
    }
}
