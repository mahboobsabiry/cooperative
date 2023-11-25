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
                'avatar'         => 'default-avatar.jpg',
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('engineer'),
                'info'           => 'This is some information.',
                'status'          => 1,
                'remember_token' => null
            ],
            [
                'avatar'         => 'default-avatar.jpg',
                'name'           => 'Milad Sabiry',
                'email'          => 'msabiry@gmail.com',
                'password'       => Hash::make('engineer'),
                'info'           => 'This is some information.',
                'status'          => 1,
                'remember_token' => null
            ],
            [
                'avatar'         => 'default-avatar.jpg',
                'name'           => 'Milad',
                'email'          => 'mdsabiry@gmail.com',
                'password'       => Hash::make('engineer'),
                'info'           => 'This is some information.',
                'status'          => 1,
                'remember_token' => null
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
