<?php

namespace Database\Seeders;

use App\Models\ExitDoor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExitDoorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExitDoor::factory()->count(20)->create();
    }
}
