<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();

        $settings = [
            [
                'key'	=> 'mainTitle',
                'value_tr'  => 'BEAM Danışmanlık Hizmetleri Şirketi',
                'value_fa'  => 'شرکت خدمات مشورتی بی‌ام',
                'value_ar'  => 'ركة الخدمات الاستشارية بی‌ام',
                'value_en'  => 'BEAM Consulting Services Company',
            ],
            [
                'key'	=> 'aboutText',
                'value_tr'  => 'BEAM Company, organizasyonel danışmanlık hizmetleri, proje yönetimi ve uluslararası ticaret alanında faaliyet gösteren, müşterilerinin iş ve eğitim süreçlerini kolaylaştırmak için çaba gösteren profesyonel bir gruptur.',
                'value_fa'  => 'شرکت بی‌ام یک مجموعه حرفه‌ای است که در زمینه ارائه خدمات مشاوره سازمانی، مدیریت پروژه و تجارت بین‌المللی فعالیت می‌کند و با هدف تسهیل فرآیندهای تجاری و آموزشی برای مشتریان خود تلاش می‌نماید.',
                'value_ar'  => 'شركة بی‌ام هي مجموعة مهنية تعمل في مجال تقديم خدمات الاستشارات التنظيمية وإدارة المشاريع والتجارة الدولية وتسعى جاهدة لتسهيل العمليات التجارية والتعليمية لعملائها.',
                'value_en'  => 'BEAM Company is a professional group that provides organizational consulting, project management, and international trade services, and strives to facilitate business and educational processes for its clients.',
            ],
            [
                'key'	=> 'facebookLink',
                'value_tr'  => 'https://www.facebook.com/profile.php?id=61553810194495',
                'value_fa'  => 'https://www.facebook.com/profile.php?id=61553810194495',
                'value_ar'  => 'https://www.facebook.com/profile.php?id=61553810194495',
                'value_en'  => 'https://www.facebook.com/profile.php?id=61553810194495',
            ],
            [
                'key'	=> 'instagramLink',
                'value_tr'  => 'https://www.instagram.com/beam.global.service',
                'value_fa'  => 'https://www.instagram.com/beam.global.service',
                'value_ar'  => 'https://www.instagram.com/beam.global.service',
                'value_en'  => 'https://www.instagram.com/beam.global.service',
            ],
            [
                'key'	=> 'twitterLink',
                'value_tr'  => 'https://twitter.com/beam.global',
                'value_fa'  => 'https://twitter.com/beam.global',
                'value_ar'  => 'https://twitter.com/beam.global',
                'value_en'  => 'https://twitter.com/beam.global',
            ],
            [
                'key'	=> 'youtubeLink',
                'value_tr'  => 'https://youtube.com/beam.global',
                'value_fa'  => 'https://youtube.com/beam.global',
                'value_ar'  => 'https://youtube.com/beam.global',
                'value_en'  => 'https://youtube.com/beam.global',
            ],
            [
                'key'	=> 'address',
                'value_tr'  => 'Ünalan Mah. Libadiye Caddesi No 82 Emaar Square Sitesi E Blok Kat:29 Daire:291 Üsküdar / İstanbul',
                'value_fa'  => 'Ünalan Mah. Libadiye Caddesi No 82 Emaar Square Sitesi E Blok Kat:29 Daire:291 Üsküdar / İstanbul',
                'value_ar'  => 'Ünalan Mah. Libadiye Caddesi No 82 Emaar Square Sitesi E Blok Kat:29 Daire:291 Üsküdar / İstanbul',
                'value_en'  => 'Ünalan Mah. Libadiye Caddesi No 82 Emaar Square Sitesi E Blok Kat:29 Daire:291 Üsküdar / İstanbul',
            ],
            [
                'key'	=> 'phone',
                'value_tr'  => '+93780003171',
                'value_fa'  => '+93780003171',
                'value_ar'  => '+93780003171',
                'value_en'  => '+93780003171',
            ],
            [
                'key'	=> 'secondPhone',
                'value_tr'  => '+905011313015',
                'value_fa'  => '+905011313015',
                'value_ar'  => '+905011313015',
                'value_en'  => '+905011313015',
            ],
            [
                'key'	=> 'email',
                'value_tr'  => 'info@beamdanismanlik.com.tr',
                'value_fa'  => 'info@beamdanismanlik.com.tr',
                'value_ar'  => 'info@beamdanismanlik.com.tr',
                'value_en'  => 'info@beamdanismanlik.com.tr',
            ],
            [
                'key'	=> 'secondEmail',
                'value_tr'  => 'services@beamdanismanlik.com.tr',
                'value_fa'  => 'services@beamdanismanlik.com.tr',
                'value_ar'  => 'services@beamdanismanlik.com.tr',
                'value_en'  => 'services@beamdanismanlik.com.tr',
            ]
        ];

        foreach ($settings as $n) {
            Setting::create($n);
        }
    }
}
