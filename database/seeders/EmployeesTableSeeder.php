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
                'position_id'   => 1,
                'hostel_id'     => null,
                'start_job'     => '1402-09-01',
                'ps_code_id'    => 1,
                'name'          => 'مولوی عبدالله',
                'last_name'     => 'بلال',
                'father_name'   => 'محمد یونس',
                'gender'        => 1,
                'emp_number'    => '31425',
                'nid_number'    => '1401-1003-15450',
                'appointment_number'    => '1912',
                'appointment_date'      => '1444-12-03',
                'last_duty'     => 'ریاست گمرک هرات',
                'birth_year'    => '1362',
                'education'     => 'لیسانس',
                'prr_npr'       => 'NPR',
                'prr_date'      => null,
                'phone'         => '0702195317',
                'phone2'        => null,
                'email'         => null,
                'main_province' => 'غزنی',
                'main_district' => 'مرکز',
                'current_province'  => 'کابل',
                'current_district'  => 'مرکز',
                'introducer'    => null,
                'signature'     => null,
                'status'        => 0,
                'info'          => null
            ]
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
