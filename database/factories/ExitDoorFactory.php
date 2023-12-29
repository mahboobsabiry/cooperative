<?php

namespace Database\Factories;

use App\Models\ExitDoor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExitDoor>
 */
class ExitDoorFactory extends Factory
{
    protected $model = ExitDoor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'exit_type'     => rand(0,1),
            'company_name'  => fake()->company(),
            'vp_number'     => rand(000, 99999),
            'vpt_number'    => rand(000, 99999),
            'good_name'     => fake()->name,
            'bx_total'      => rand(12, 2400),
            'bx_total_tx'   => 'بسته',
            'weight'        => rand(1000, 25000),
            'enex'          => rand(1, 150000),
            'desc'          => fake()->text,
            'created_at'    => fake()->dateTimeThisMonth($max = 'now', $timezone = null)
        ];
    }
}
