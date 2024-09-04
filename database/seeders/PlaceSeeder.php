<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            [
                'name'      => "ریاست گمرک بلخ",
                'code'      => 'P01',
                'custom_code'   => 'AF151'
            ],
            [
                'name'      => "آمریت گمرک سرحدی حیرتان",
                'code'      => 'P02',
                'custom_code'   => 'AF152'
            ],
            [
                'name'      => "مدیریت عمومی میدان هوایی",
                'code'      => 'P03',
                'custom_code'   => 'AF153'
            ],
            [
                'name'      => "مدیریت عمومی نایب آباد",
                'code'      => 'P04',
                'custom_code'   => 'AF154'
            ],
            [
                'name'      => "مدیریت عمومی مراقبت سیار",
                'code'      => 'P05'
            ],
            [
                'name'      => "پورت یکم",
                'code'      => 'P06'
            ],
            [
                'name'      => "پورت دوم",
                'code'      => 'P07'
            ]
        ];

        foreach ($places as $place) {
            Place::create($place);
        }
    }
}
