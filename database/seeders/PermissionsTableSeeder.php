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
                'name'      => 'permission_edit'
            ],
            [
                'name'      => 'permission_show'
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
                'name'      => 'role_edit'
            ],
            [
                'name'      => 'role_show'
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
                'name'      => 'user_edit'
            ],
            [
                'name'      => 'user_show'
            ],
            [
                'name'      => 'user_delete'
            ],
            [
                'name'      => 'user_access'
            ],
            [
                'name'      => 'setting_create'
            ],
            [
                'name'      => 'setting_edit'
            ],
            [
                'name'      => 'setting_show'
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
