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

            // Finance
            [
                'name'      => 'finance_view'
            ],
            // Currencies
            [
                'name'      => 'finance_currency_view'
            ],
            [
                'name'      => 'finance_currency_create'
            ],
            [
                'name'      => 'finance_currency_edit'
            ],
            [
                'name'      => 'finance_currency_delete'
            ],

            // Budgets
            [
                'name'      => 'finance_budget_view'
            ],
            [
                'name'      => 'finance_budget_create'
            ],
            [
                'name'      => 'finance_budget_edit'
            ],
            [
                'name'      => 'finance_budget_delete'
            ],

            // ========== Office ==========
            [
                'name'      => 'office_view'
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
