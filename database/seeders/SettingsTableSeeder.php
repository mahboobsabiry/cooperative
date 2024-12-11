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
                'value_tr'  => 'BEAM Danışmanlık Hizmetleri Şirketi',
                'value_ar'  => 'ركة الخدمات الاستشارية بی‌ام',
                'value_fa'  => 'شرکت خدمات مشورتی بی‌ام',
                'value_en'  => 'BEAM Consulting Services Company',
            ]
        ];

        foreach ($settings as $n) {
            Setting::create($n);
        }
    }
}
