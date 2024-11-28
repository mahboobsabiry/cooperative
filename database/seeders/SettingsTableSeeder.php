<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();

        $settings = [
            [
                'key'	=> 'mainTitle',
                'value'	=> 'BEAM SYSTEM',
            ],
            [
                'key'	=> 'aboutText',
                'value'	=> 'This is a text about BEAM SYSTEM',
            ]
        ];

        foreach ($settings as $n) {
            Setting::create($n);
        }
    }
}
