<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // ========== Admin ==========
            [
                'name'      => 'site_admin' // Admin special permissions
            ],
            [
                'name'      => 'user_mgmt' // Manage all Permission, Roles and Users
            ],
            [
                'name'      => 'user_view'
            ],
            [
                'name'      => 'setting_mgmt' // Manage app settings
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
