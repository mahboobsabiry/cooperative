<?php

namespace Database\Seeders;

use App\Models\Office\PositionCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $code = [
            'position_id'   => 1,
            'code'          => '001'
        ];

        PositionCode::create($code);
    }
}
