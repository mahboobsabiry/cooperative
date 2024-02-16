<?php

namespace Database\Seeders;

use App\Models\Office\Position;
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
                'position_number' => 2,
                'num_of_pos' => 1,
                'desc'      => 'مقام ریاست گمرک بلخ'
            ],
            [
                'parent_id' => 1,
                'title'     => 'مدیر اجرائیه',
                'position_number' => 5,
                'num_of_pos' => 1,
                'desc'      => ''
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمر عملیاتی',
                'position_number' => 3,
                'num_of_pos' => 1,
                'desc'      => 'آمریت عملیاتی گمرک بلخ'
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمر تخنیکی و مسلکی',
                'position_number' => 3,
                'num_of_pos' => 1,
                'desc'      => 'آمریت تخنیکی و مسلکی ریاست گمرک بلخ'
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمر گمرک سرحدی حیرتان',
                'position_number' => 3,
                'num_of_pos' => 1,
                'type'          => 'سرحدی',
                'desc'          => 'آمریت گمرک سرحدی حیرتان واقع لب مرز با کشور اوزبیکستان'
            ],
            [
                'parent_id'     => 1,
                'title'         => 'مدیر عمومی مالی و اداری',
                'position_number' => 4,
                'num_of_pos'    => 1,
                'desc'          => 'مدیریت عمومی اداری ریاست گمرک بلخ'
            ],
            [
                'parent_id'     => 3,
                'title'         => 'مدیر عمومی اسیکودا و سیستم های گمرکی',
                'position_number' => 4,
                'num_of_pos'    => 1,
                'desc'          => 'مدیریت عمومی سیستم ریاست گمرک بلخ'
            ],
            [
                'parent_id'     => 5,
                'title'         => 'مدیر عمومی تشریح اموال',
                'position_number' => 4,
                'num_of_pos'    => 1,
                'type'          => 'سرحدی',
                'desc'          => ' آمریت گمرک سرحدی حیرتان'
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
