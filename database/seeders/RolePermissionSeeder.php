<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {

        Permission::create(['name' => 'manage employees']);
        Permission::create(['name' => 'manage projects']);
        Permission::create(['name' => 'view tasks']);

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