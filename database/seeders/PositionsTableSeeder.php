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
                'title'     => 'رئیس',
                'code'      => "BCD-001",
                'position_number' => 2,
                'desc'      => 'مقام ریاست گمرک بلخ'
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمر عملیاتی',
                'code'      => "BCD-002",
                'position_number' => 3,
                'desc'      => 'آمریت عملیاتی گمرک بلخ'
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمر تخنیکی و مسلکی',
                'code'      => "BCD-003",
                'position_number' => 3,
                'desc'      => 'آمریت تخنیکی و مسلکی ریاست گمرک بلخ'
            ],
            [
                'parent_id' => 1,
                'title'     => 'آمر گمرک سرحدی حیرتان',
                'code'      => "BCD-004",
                'position_number' => 3,
                'desc'      => 'آمریت گمرک سرحدی حیرتان واقع لب مرز با کشور اوزبیکستان'
            ],
            [
                'parent_id'     => 2,
                'title'         => 'مدیر عمومی اداری',
                'code'          => "BCD-005",
                'position_number' => 4,
                'desc'          => 'مدیریت عمومی اداری ریاست گمرک بلخ'
            ],
            [
                'parent_id'     => 3,
                'title'         => 'مدیر عمومی سیستم',
                'code'          => "BCD-001=6",
                'position_number' => 4,
                'desc'          => 'مدیریت عمومی سیستم ریاست گمرک بلخ'
            ],
            [
                'parent_id'     => 4,
                'title'         => 'مدیر عمومی تشریح اموال',
                'code'          => "BCD-007",
                'position_number' => 4,
                'desc'          => 'مدیریت عمومی اداری آمریت گمرک سرحدی حیرتان'
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
