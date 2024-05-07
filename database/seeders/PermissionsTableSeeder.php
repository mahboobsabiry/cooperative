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
            ],
            // Employees
            [
                'name'      => 'office_employee_view'
            ],
            [
                'name'      => 'office_employee_create'
            ],
            [
                'name'      => 'office_employee_edit'
            ],
            [
                'name'      => 'office_employee_delete'
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
