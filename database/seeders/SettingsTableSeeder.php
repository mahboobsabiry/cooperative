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
                'value_tr'  => 'https://youtube.com/@BEAM.Global',
                'value_fa'  => 'https://youtube.com/@BEAM.Global',
                'value_ar'  => 'https://youtube.com/@BEAM.Global',
                'value_en'  => 'https://youtube.com/@BEAM.Global',
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
            ],
            [
                'key'	=> 'educationTxt',
                'value_tr'  => 'Sizlere en iyi ve en uygun eğitim hizmetlerini sunuyoruz. İlkokuldan koleje ve üniversiteye.',
                'value_fa'  => 'ما بهترین و راحت ترین خدمات تحصیلی را برای شما فراهم می‌کنیم. از مکتب ابتدائیه شروع تا کالیج و دانشگاه.',
                'value_ar'  => 'نحن نقدم لك أفضل الخدمات التعليمية وأكثرها ملاءمة. من المدرسة الابتدائية إلى الكلية والجامعة.',
                'value_en'  => 'We provide the best and comfortable education services for our people. From School to College and University.',
            ],
            [
                'key'	=> 'tourTxt',
                'value_tr'  => 'Turizm hizmetlerimizle Türkiye\'nin her yerinde en huzurlu yerlerini ziyaret edebilirsiniz.',
                'value_fa'  => 'با خدمات گردشگری ما شما می‌توانید پرآرامش ترین مکان ها را در هرجای ترکیه دیدار نمایید.',
                'value_ar'  => 'مع خدماتنا السياحية، يمكنك زيارة الأماكن الأكثر هدوءًا في أي مكان في تركيا.',
                'value_en'  => 'With tour services you can visit beautiful and heart-touching places all over Turkey.',
            ],
            [
                'key'	=> 'healthTxt',
                'value_tr'  => 'Sıcak ve sağlıklı görünün. Bedenin sağlığı Allah\'ın nimetinin bir parçasıdır. Bu alanda eşsiz hizmetlerimizden yararlanabilirsiniz.',
                'value_fa'  => 'خود را گرم و صحتمند نگاه کنید. سلامتی بدن جزئی از نعمات پروردگار است. شما می‌توانید از خدمات بی‌نظیر ما در این عرصه بهره‌مند شوید.',
                'value_ar'  => 'تبدو دافئة وصحية. صحة الجسد من نعم الله. يمكنك الاستفادة من خدماتنا الفريدة في هذا المجال.',
                'value_en'  => 'Keep yourself warm and heal your body, you can enjoy our best services in this area.',
            ],
            [
                'key'	=> 'realEstateTxt',
                'value_tr'  => 'Türkiye\'nin en iyi lokasyonlarında bulunan gayrimenkul ve arsa alım satımı alanında danışmanlık hizmetlerimizden yararlanabilirsiniz.',
                'value_fa'  => 'شما میتوانید در عرصه خرید و تجارت املاک و زمین که در بهترین موقعیت های ترکیه قرار دارند، از خدمات مشورتی ما مستفید شوید.',
                'value_ar'  => 'يمكنكم الاستفادة من خدماتنا الاستشارية في مجال شراء وتجارة العقارات والأراضي الواقعة في أفضل المواقع في تركيا.',
                'value_en'  => 'You can buy and trade with the best houses and villas located in the best part of Turkey-Land.',
            ],
            [
                'key'	=> 'translationTxt',
                'value_tr'  => 'Çeviri hizmetlerimizden yararlanarak her türlü makale, metin ve kitabı, hatta kendi metinlerinizi bile istediğiniz dile hızlı ve doğru bir şekilde çevirebilirsiniz.',
                'value_fa'  => 'شما هر نوع مقالات، متن ها و کتاب های خویش و حتی متون خاص خویش را به صورت سریع و دقیق با استفاده از خدمات ترجمانی ما به هر زبان که میخواهید، ترجمه نمائید',
                'value_ar'  => 'يمكنك ترجمة أي نوع من المقالات والنصوص والكتب وحتى النصوص الخاصة بك بسرعة ودقة باستخدام خدمات الترجمة لدينا إلى أي لغة تريدها.',
                'value_en'  => 'You can translate every kind of your articles, posts, books and even any special words with fast and complete services in any languages.',
            ]
        ];

        foreach ($settings as $n) {
            Setting::create($n);
        }
    }
}
