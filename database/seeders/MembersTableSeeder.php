<?php

namespace Database\Seeders;

use App\Models\Admin\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->delete();
        $members = [
            [
                'avatar'    => null,
                'name'      => 'محبوب الرحمن صابری',
                'father_name'   => 'محمد الله صابری',
                'position'      => 'کارمند گمرک سرحدی حیرتان',
                'phone'         => '0711481544',
                'phone2'        => '0780977316',
                'email'         => 'm.sabiry1997@gmail.com',
                'address'       => 'رستاق - تخار'
            ],
            [
                'avatar'    => null,
                'name'      => 'عتیق الرحمن صابری',
                'father_name'   => 'عبدالحنان صابری',
                'position'      => 'استاد دانشگاه تخار',
                'phone'         => '0706895531',
                'phone2'        => null,
                'email'         => 'atiqurrahmansabiry@gmail.com',
                'address'       => 'تالقان - تخار'
            ]
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
