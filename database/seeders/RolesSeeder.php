<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstWhere('email', 'admin@example.com');

        $roles = [
            "Global Admin",
        ];

        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            Permission::firstOrCreate(['name' => "assign role '$roleName'"]);
            $admin->assignRole($role);
        }

        Permission::all()->each(function ($permission) use ($admin) {
            $admin->givePermissionTo($permission->name);
        });
    }
}
