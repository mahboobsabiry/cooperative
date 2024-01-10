<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->delete();

        $positions = [
            [
                'parent_id' => 0,
                'title'     => 'ریاست گمرک بلخ',
                'code'      => "20-27-01-001",
                'position_number' => 2,
                'desc'      => 'مقام ریاست گمرک بلخ'
            ],
            [
                'parent_id' => 1,
                'title'     => 'مدیر اجرائیه',
                'code'      => "20-27-01-002",
                'position_number' => 5,
                'desc'      => ''
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمر عملیاتی',
                'code'      => "20-27-01-029",
                'position_number' => 3,
                'desc'      => 'آمریت عملیاتی گمرک بلخ'
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمر تخنیکی و مسلکی',
                'code'      => "20-27-01-118",
                'position_number' => 3,
                'desc'      => 'آمریت تخنیکی و مسلکی ریاست گمرک بلخ'
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمر گمرک سرحدی حیرتان',
                'code'      => "20-27-01-154",
                'position_number' => 3,
                'desc'      => 'آمریت گمرک سرحدی حیرتان واقع لب مرز با کشور اوزبیکستان'
            ],
            [
                'parent_id'     => 1,
                'title'         => 'مدیر عمومی مالی و اداری',
                'code'          => "20-27-01-008",
                'position_number' => 4,
                'desc'          => 'مدیریت عمومی اداری ریاست گمرک بلخ'
            ],
            [
                'parent_id'     => 3,
                'title'         => 'مدیر عمومی اسیکودا و سیستم های گمرکی',
                'code'          => "20-27-01-115",
                'position_number' => 4,
                'desc'          => 'مدیریت عمومی سیستم ریاست گمرک بلخ'
            ],
            [
                'parent_id'     => 5,
                'title'         => 'مدیر عمومی تشریح اموال',
                'code'          => "20-27-01-172",
                'position_number' => 4,
                'desc'          => ' آمریت گمرک سرحدی حیرتان'
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
