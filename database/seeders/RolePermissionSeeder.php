<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'manage employees',
            'manage projects',
            'view tasks',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $employee = Role::create(['name' => 'Employee']);

        $admin->givePermissionTo(Permission::all());

        $manager->givePermissionTo([
            'manage employees',
            'manage projects'
        ]);

        $employee->givePermissionTo([
            'view tasks'
        ]);
    }
}