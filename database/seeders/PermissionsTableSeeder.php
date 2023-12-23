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
            [
                'name'      => 'user_management_access'
            ],
            [
                'name'      => 'permission_create'
            ],
            [
                'name'      => 'permission_update'
            ],
            [
                'name'      => 'permission_delete'
            ],
            [
                'name'      => 'permission_access'
            ],
            [
                'name'      => 'role_create'
            ],
            [
                'name'      => 'role_update'
            ],
            [
                'name'      => 'role_delete'
            ],
            [
                'name'      => 'role_access'
            ],
            [
                'name'      => 'user_create'
            ],
            [
                'name'      => 'user_update'
            ],
            [
                'name'      => 'user_delete'
            ],
            [
                'name'      => 'user_access'
            ],

            // Positions
            [
                'name'      => 'position_access'
            ],
            [
                'name'      => 'position_create'
            ],
            [
                'name'      => 'position_update'
            ],
            [
                'name'      => 'position_delete'
            ],

            // Employees
            [
                'name'      => 'employee_create'
            ],
            [
                'name'      => 'employee_update'
            ],
            [
                'name'      => 'employee_delete'
            ],
            [
                'name'      => 'employee_access'
            ],

            // Settings
            [
            'name'      => 'setting_create'
            ],
            [
                'name'      => 'setting_update'
            ],
            [
                'name'      => 'setting_delete'
            ],
            [
                'name'      => 'setting_access'
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
