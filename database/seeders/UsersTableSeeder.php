<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        $users = [
            [
                'employee_id'       => null,
                'name'              => 'Admin',
                'username'          => '1402',
                'email'             => 'admin@admin.com',
                'password'          => Hash::make('1402'),
                'info'              => 'This is some information.',
                'remember_token'    => null
            ],
            [
                'employee_id'       => null,
                'name'              => 'Semi-Admin',
                'username'          => '1403',
                'email'             => 'semi-admin@admin.com',
                'password'          => Hash::make('1403'),
                'info'              => 'This is some information.',
                'is_admin'          => 0,
                'remember_token'    => null
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
