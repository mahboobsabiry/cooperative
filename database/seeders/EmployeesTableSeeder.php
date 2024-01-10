<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->delete();

        $employees = [
            [
                'position_id'   => 1,
                'name'      => 'مولوی عبدالله',
                'last_name' => 'بلال',
                'father_name'   => 'محمد یونس',
                'gender'        => 1,
                'emp_number'    => 458752,
                'appointment_number'    => 1912,
                'appointment_date'      => "1444/12/03",
                'last_duty'     => 'ریاست گمرک هرات',
                'birth_year'    => 1362,
                'education'     => null,
                'prr_npr'       => 'NPR',
                'prr_date'      => null,
                'phone'         => null,
                'phone2'        => null,
                'email'         => null,
                'main_province'     => 'غزنی',
                'current_province'  => 'کابل',
                'info'          => '',
                'on_duty'       => 1,
                'is_responsible' => 1,
                'status'        => 1
            ],
            [
                'position_id'   => 3,
                'name'      => 'علی خان',
                'last_name' => null,
                'father_name'   => 'سلطان محمد',
                'gender'        => 1,
                'emp_number'    => 13396,
                'appointment_number'    => 1913,
                'appointment_date'      => "1444/12/03",
                'last_duty'     => 'ریاست گمرک کندهار',
                'birth_year'    => 1372,
                'education'     => 'لیسانس',
                'prr_npr'       => 'NPR',
                'prr_date'      => null,
                'phone'         => null,
                'phone2'        => null,
                'email'         => null,
                'main_province'     => 'بغلان',
                'current_province'  => 'بغلان',
                'info'          => '',
                'on_duty'       => 1,
                'is_responsible' => 1,
                'status'        => 1
            ],
            [
                'position_id'   => 5,
                'name'      => 'محمد اعظم',
                'last_name' => 'طارق',
                'father_name'   => 'اسلام',
                'gender'        => 1,
                'emp_number'    => 13391,
                'appointment_number'    => 1908,
                'appointment_date'      => "1444/12/03",
                'last_duty'     => 'آمریت عملیاتی ریاست گمرک بلخ',
                'birth_year'    => 1360,
                'education'     => 'مدرسه',
                'prr_npr'       => 'NPR',
                'prr_date'      => null,
                'phone'         => null,
                'phone2'        => null,
                'email'         => null,
                'main_province'     => 'بدخشان',
                'current_province'  => 'کابل',
                'info'          => '',
                'on_duty'       => 1,
                'is_responsible' => 1,
                'status'        => 1
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
