<?php

namespace Database\Seeders;

use App\Models\Finance\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->delete();

        $currencies = [
            [
                'name'  => 'USA Dollar',
                'code'  => 'USD',
                'symbol'    => '$',
                'info'      => 'USA dollar is the most powerful international currency.'
            ],
            [
                'name'  => 'Afghanistan Afghani',
                'code'  => 'AFN',
                'symbol'    => '؋',
                'info'      => 'Afghani is the best currency in context of Afghanistan.'
            ],
            [
                'name'  => 'Turkish Lira',
                'code'  => 'TL',
                'symbol'    => '₺',
                'info'      => 'Turkish Lira is the most valuable currency in context of Turkey.'
            ],
            [
                'name'  => 'Euro Europe',
                'code'  => 'ERU',
                'symbol'    => '€',
                'info'      => 'Euro is the most international currency in context of Europe.'
            ]
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
