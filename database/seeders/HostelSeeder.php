<?php

namespace Database\Seeders;

use App\Models\Hostel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hostels')->delete();

        $hostels = [
            [
                'number'    => 1,
                'section'   => 'A'
            ],
            [
                'number'    => 1,
                'section'   => 'B'
            ],
            [
                'number'    => 2,
                'section'   => 'A'
            ],
            [
                'number'    => 2,
                'section'   => 'B'
            ],
            [
                'number'    => 3,
                'section'   => 'A'
            ],
            [
                'number'    => 3,
                'section'   => 'B'
            ],
            [
                'number'    => 4,
                'section'   => 'A'
            ],
            [
                'number'    => 4,
                'section'   => 'B'
            ],
            [
                'number'    => 5,
                'section'   => 'A'
            ],
            [
                'number'    => 5,
                'section'   => 'B'
            ],
            [
                'number'    => 6,
                'section'   => 'A'
            ],
            [
                'number'    => 6,
                'section'   => 'B'
            ],
            [
                'number'    => 7,
                'section'   => 'A'
            ],
            [
                'number'    => 7,
                'section'   => 'B'
            ],
            [
                'number'    => 8,
                'section'   => 'A'
            ],
            [
                'number'    => 8,
                'section'   => 'B'
            ],
            [
                'number'    => 9,
                'section'   => 'A'
            ],
            [
                'number'    => 9,
                'section'   => 'B'
            ],
            [
                'number'    => 10,
                'section'   => 'A'
            ],
            [
                'number'    => 10,
                'section'   => 'B'
            ],
            [
                'number'    => 11,
                'section'   => 'A'
            ],
            [
                'number'    => 11,
                'section'   => 'B'
            ],
            [
                'number'    => 12,
                'section'   => 'A'
            ],
            [
                'number'    => 12,
                'section'   => 'B'
            ],
            [
                'number'    => 13,
                'section'   => 'A'
            ],
            [
                'number'    => 13,
                'section'   => 'B'
            ],
            [
                'number'    => 14,
                'section'   => 'A'
            ],
            [
                'number'    => 14,
                'section'   => 'B'
            ],
            [
                'number'    => 15,
                'section'   => 'A'
            ],
            [
                'number'    => 15,
                'section'   => 'B'
            ],
            [
                'number'    => 16,
                'section'   => 'A'
            ],
            [
                'number'    => 16,
                'section'   => 'B'
            ],
            [
                'number'    => 17,
                'section'   => 'A'
            ],
            [
                'number'    => 17,
                'section'   => 'B'
            ],
            [
                'number'    => 18,
                'section'   => 'A'
            ],
            [
                'number'    => 18,
                'section'   => 'B'
            ],
            [
                'number'    => 19,
                'section'   => 'A'
            ],
            [
                'number'    => 19,
                'section'   => 'B'
            ],
            [
                'number'    => 20,
                'section'   => 'A'
            ],
            [
                'number'    => 20,
                'section'   => 'B'
            ],
        ];

        foreach ($hostels as $hostel) {
            Hostel::create($hostel);
        }
    }
}
