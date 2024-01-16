<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Org;
use App\Models\Tenant;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $systemUser = User::firstOrCreate([
            'id' => env('SYSTEM_USER_UUID', '759b8f44-7c9e-47b5-a5f4-f25265acac4e'),
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('asdfasdf')
        ]);

        $acmeTenant = Tenant::firstOrCreate([
            'id' => env('DEFAULT_TENANT_UUID'),
            'name' => 'Acme Inc'
        ]);
        $blueOrg = Org::firstOrCreate([
            'id' => env('DEFAULT_ORG_UUID'),
            'name' => 'Blue'
        ]);
        $blueOrg->tenant()->associate($acmeTenant);

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => app()->isLocal() ? Hash::make('asdfasdf') : Hash::make(Str::random(20))
            ]
        );

        $admin->tenants()->attach($acmeTenant->id);
        $admin->orgs()->attach($blueOrg->id);

        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
        ]);
    }
}
