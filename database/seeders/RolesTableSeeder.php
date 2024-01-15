<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name'      => 'Admin'
            ],
            [
                'name'      => 'Office'
            ],
            [
                'name'      => 'Hostel Office'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
