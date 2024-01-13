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
            // Admin
            [
                'name'      => 'site_admin' // Admin special permissions
            ],
            [
                'name'      => 'user_mgmt' // Manage all Permission, Roles and Users
            ],
            [
                'name'      => 'setting_mgmt' // Manage app settings
            ],
            // Office
            [
                'name'      => 'organization_mgmt' // Manage all organization settings
            ],
            [
                'name'      => 'employee_mgmt' // Manage employees
            ],
            [
                'name'      => 'hostel_mgmt' // Manage Hostel Employees
            ],
            [
                'name'      => 'company_mgmt' // Manage Companies
            ],
            [
                'name'      => 'agent_mgmt' // Manage Companies Agents
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
