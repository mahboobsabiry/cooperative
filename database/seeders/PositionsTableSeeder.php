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
        $position = [
            'parent_id' => null,
            'place_id'  => 1,
            'title'     => 'ریاست گمرک بلخ',
            'position_number'   => 2,
            'num_of_pos'        => 1,
            'desc'              => '',
            'status'            => 1
        ];

        Position::create($position);
    }
}
