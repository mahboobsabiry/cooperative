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
                'position_code' => '001',
                'name'          => 'مولوی عبدالله',
                'last_name'     => 'بلال',
                'father_name'   => 'قبله گاه',
                'gender'        => 1,
                'emp_number'    => '31425',
                'nid_number'    => '1401-1003-15450',
                'appointment_number'    => '1908',
                'appointment_date'      => '1444-12-03',
                'last_duty'     => 'ریاست گمرک هرات',
                'birth_year'    => '1370',
                'education'     => 'لیسانس',
                'prr_npr'       => 'NPR',
                'prr_date'      => null,
                'phone'         => '0702195317',
                'phone2'        => null,
                'email'         => null,
                'main_province' => 'غزنی',
                'main_district' => 'ناوه',
                'current_province'  => 'بلخ',
                'current_district'  => 'مزار شریف',
                'introducer'    => null,
                'signature'     => null,
                'status'        => 0,
                'info'          => null
            ],
            [
                'position_id'   => 9,
                'hostel_id'     => null,
                'start_job'     => '1400-09-01',
                'position_code' => '029',
                'name'          => 'محبوب الرحمن',
                'last_name'     => 'صابری',
                'father_name'   => 'محمد الله',
                'gender'        => 1,
                'emp_number'    => '13933',
                'nid_number'    => '1399-1003-15450',
                'appointment_number'    => '1908',
                'appointment_date'      => '1444-12-03',
                'last_duty'     => 'مدیر بخش مسافرین میدان هوایی بلخ',
                'birth_year'    => '1376',
                'education'     => 'لیسانس',
                'prr_npr'       => 'NPR',
                'prr_date'      => null,
                'phone'         => '0711481544',
                'phone2'        => '0780977316',
                'email'         => 'mahboobulrahmansabiry@gmail.com',
                'main_province' => 'تخار',
                'main_district' => 'رستاق',
                'current_province'  => 'تخار',
                'current_district'  => 'رستاق',
                'introducer'    => 'مولوی ندا محمد صدیقی',
                'signature'     => null,
                'status'        => 0,
                'info'          => 'بر علاوه، برنامه نویس این سیستم نیز می باشد.'
            ]
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
