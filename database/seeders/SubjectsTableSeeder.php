<?php

namespace Database\Seeders;

use App\Models\Admin\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->delete();

        $subjects = [
            [
                'title' => 'تفسیر شریف'
            ],
            [
                'title' => 'حدیث شریف'
            ],
            [
                'title' => 'فقه'
            ],
            [
                'title' => 'اصول'
            ],
            [
                'title' => 'تاریخ'
            ],
            [
                'title' => 'نحو'
            ],
            [
                'title' => 'صرف'
            ],
            [
                'title' => 'منطق'
            ],
            [
                'title' => 'حکمت'
            ],
            [
                'title' => 'علم تصوف'
            ]
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
