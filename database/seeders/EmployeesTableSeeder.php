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
                'father_name'   => '',
                'grand_f_name'  => '',
                'p2number'      => '',
                'emp_number'    => 458752,
                'dob'           => '',
                'phone'         => '',
                'phone2'        => '',
                'email'         => 'm.bilal@gmail.com',
                'province'      => 'کندز',
                'info'          => '',
                'on_duty'       => 0,
                'status'        => 1
            ],
            [
                'position_id'    => 4,
                'name'      => 'مولوی محمد اعظم',
                'last_name' => 'طارق',
                'father_name'   => '',
                'grand_f_name'  => '',
                'p2number'      => '',
                'emp_number'    => 4557822,
                'dob'           => '',
                'phone'         => '',
                'phone2'        => '',
                'email'         => 'm.tariq@gmail.com',
                'province'      => 'بدخشان',
                'info'          => '',
                'on_duty'       => 0,
                'status'        => 1
            ],
            [
                'position_id'    => 6,
                'name'      => 'نقیب الله',
                'last_name' => 'صافی',
                'father_name'   => '',
                'grand_f_name'  => '',
                'p2number'      => '',
                'emp_number'    => 41125663,
                'dob'           => '',
                'phone'         => '',
                'phone2'        => '',
                'email'         => 'naqib.safai@gmail.com',
                'province'      => 'بلخ',
                'info'          => '',
                'on_duty'       => 0,
                'status'        => 1
            ],
            [
                'position_id'    => 7,
                'name'      => 'محبوب الرحمن',
                'last_name' => 'صابری',
                'father_name'   => 'محمدالله',
                'grand_f_name'  => 'علم خان',
                'p2number'      => '',
                'emp_number'    => 13933,
                'dob'           => '28/01/1997',
                'phone'         => '0711481544',
                'phone2'        => '0780977316',
                'email'         => 'm.sabiry1997@gmail.com',
                'province'      => 'تخار',
                'info'          => 'من یک برنامه نویس خوب هستم!',
                'on_duty'       => 0,
                'status'        => 1
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
