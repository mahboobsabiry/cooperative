<?php

namespace Database\Seeders;

use App\Models\Office\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'position'      => 'سهام‌دار',
                'name'          => 'عتیق الرحمن صابری',
                'father_name'   => 'عبدالحنان صابری',
                'emp_code'      => 'EMP-001',
                'nid_number'    => '1401-1003-11230',
                'birth_date'    => '1362',
                'phone'         => '0702195317',
                'phone2'        => null,
                'email'         => null,
                'address'       => 'تخار - تالقان',
                'signature'     => null,
                'info'          => null
            ]
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
