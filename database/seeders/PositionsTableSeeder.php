<?php

namespace Database\Seeders;

use App\Models\Office\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'parent_id' => null,
                'title'     => 'ریاست گمرک بلخ',
                'position_number'   => 2,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'محصولی',
                'custom_code'       => 'AF151',
                'status'            => 1
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمریت عملیاتی',
                'position_number'   => 3,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'محصولی',
                'custom_code'       => 'AF151',
                'status'            => 1
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمریت تخنیکی و مسلکی',
                'position_number'   => 3,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'محصولی',
                'custom_code'       => 'AF151',
                'status'            => 1
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمریت گمرک سرحدی حیرتان',
                'position_number'   => 3,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'سرحدی',
                'custom_code'       => 'AF152',
                'status'            => 1
            ],
            [
                'parent_id' => 1,
                'title'     => 'مدیریت اجرائیه',
                'position_number'   => 5,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'محصولی',
                'custom_code'       => 'AF151',
                'status'            => 1
            ],
            [
                'parent_id' => 3,
                'title'     => 'مدیر عمومی اسیکودا و سیستم های گمرکی',
                'position_number'   => 4,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'محصولی',
                'custom_code'       => 'AF151',
                'status'            => 1
            ],
            [
                'parent_id' => 1,
                'title'     => 'مدیر عمومی مالی و اداری',
                'position_number'   => 4,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'محصولی',
                'custom_code'       => 'AF151',
                'status'            => 1
            ],
            [
                'parent_id' => 4,
                'title'     => 'مدیر اداری',
                'position_number'   => 5,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'سرحدی',
                'custom_code'       => 'AF152',
                'status'            => 1
            ],
            [
                'parent_id' => 4,
                'title'     => 'مدیر عمومی تشریح اموال',
                'position_number'   => 4,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'سرحدی',
                'custom_code'       => 'AF152',
                'status'            => 1
            ],
            [
                'parent_id' => 4,
                'title'     => 'مدیر عمومی دروازه ها',
                'position_number'   => 4,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'سرحدی',
                'custom_code'       => 'AF152',
                'status'            => 1
            ],
            [
                'parent_id' => 4,
                'title'     => 'مدیر عمومی ترانزیت',
                'position_number'   => 4,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'سرحدی',
                'custom_code'       => 'AF152',
                'status'            => 1
            ],
            [
                'parent_id' => 4,
                'title'     => 'مدیر عمومی چیک محموله های مسافرین',
                'position_number'   => 4,
                'num_of_pos'        => 1,
                'desc'              => '',
                'place'             => 'سرحدی',
                'custom_code'       => 'AF152',
                'status'            => 1
            ]
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
