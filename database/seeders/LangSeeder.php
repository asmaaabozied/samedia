<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('langs')->delete();

        $langs = [


            ['id' => 1, 'value' => json_encode(['ar' => 'معلومات عنا', 'en' => 'About Us']), 'item_name' => 'title1', 'item_id' => 1, 'page_type' => 'about-us'],

            ['id' => 2, 'value' => json_encode(['ar' => ' نحن ملتزمون بتحقيق رضا العملاء وتقديم حلول مبتكرة وفعالة لتلبية احتياجاتهم', 'en' => 'We are committed to achieving customer satisfaction & delivering innovative & effective solutions to meet their needs']), 'item_name' => 'title2', 'item_id' => 2, 'page_type' => 'about-us'],

            ['id' => 3, 'value' => json_encode(['ar' => ' قصتنا', 'en' => 'OUR STORY']), 'item_name' => 'content1', 'item_id' => 3, 'page_type' => 'about-us'],


            ['id' => 4, 'value' => json_encode(['ar' => ' رحلة مليئة بالمغامرات تعكس روح الإبداع وإحداث التأثير', 'en' => 'An Adventurous Journey Reflecting the Spirit of Creativity and Making an Impact']), 'item_name' => 'content2', 'item_id' => 4, 'page_type' => 'about-us'],
            ['id' => 5, 'value' => json_encode(['ar' => ' تطور', 'en' => 'EVOLUTION']), 'item_name' => 'content3', 'item_id' => 5, 'page_type' => 'about-us'],
            ['id' => 6, 'value' => json_encode(['ar' => ' تطورت ساميديا من مجرد فكرة إلى شركة مرخصة في عام 2023، مما أظهر التزامها بالتميز في سوق الإمارات العربية المتحدة.', 'en' => 'Samedia evolved from an idea into a licensed company in 2023, showcasing its commitment to excellence in the UAE market.']), 'item_name' => 'content4', 'item_id' => 6, 'page_type' => 'about-us'],

            ['id' => 7, 'value' => json_encode(['ar' => ' عضو فريقنا الموهوب ينتظر الخادم.', 'en' => 'Our talented team member waiting to server.']), 'item_name' => 'content5', 'item_id' => 7, 'page_type' => 'about-us'],
            ['id' => 8, 'value' => json_encode(['ar' => ' فريقنا', 'en' => 'OUR TEAM']), 'item_name' => 'content6', 'item_id' => 8, 'page_type' => 'about-us'],
            ['id' => 9, 'value' => json_encode(['ar' => ' اتصل بنا اليوم للحصول على تصوير عقاري من الدرجة الأول', 'en' => 'Contact us today for top-notch real estate photography that highlights the unique features of your property and attracts eager buyers.']), 'item_name' => 'description', 'item_id' => 9, 'page_type' => 'about-us'],
            ['id' => 10, 'value' => json_encode(['ar' => ' تؤاصل معنا', 'en' => 'Contact Us']), 'item_name' => 'contactus', 'item_id' => 10, 'page_type' => 'about-us'],
            ['id' => 11, 'value' => json_encode(['ar' => ' تؤاصل معنا', 'en' => 'Contact Us']), 'item_name' => 'contact-us', 'item_id' => 11, 'page_type' => 'contact-us'],
            ['id' => 12, 'value' => json_encode(['ar' => '  يسعى فريقنا لتقديم خدمة عملاء ممتازة', 'en' => 'Our team strives to deliver excellent customer service ']), 'item_name' => 'contact-us', 'item_id' => 12, 'page_type' => 'contact-us'],
            ['id' => 13, 'value' => json_encode(['ar' => '  نرحب بتواصلك ونتطلع لتقديم المساعدة', 'en' => 'We welcome your contact & look forward to providing assistance ']), 'item_name' => 'contact-us', 'item_id' => 13, 'page_type' => 'contact-us'],
            ['id' => 14, 'value' => json_encode(['ar' => '  يمكنكم التواصل معنا عبر القنوات التالية', 'en' => 'You can reach us through the following channels']), 'item_name' => 'contact-us', 'item_id' => 14, 'page_type' => 'contact-us'],
            ['id' => 15, 'value' => json_encode(['ar' => ' وسائل التواصل الاجتماعي', 'en' => 'Social Media']), 'item_name' => 'contact-us', 'item_id' => 15, 'page_type' => 'contact-us'],
            ['id' => 16, 'value' => json_encode(['ar' => 'اتصال', 'en' => 'Contact']), 'item_name' => 'contact-us', 'item_id' => 16, 'page_type' => 'contact-us'],
            ['id' => 17, 'value' => json_encode(['ar' => 'موقع', 'en' => 'Location']), 'item_name' => 'contact-us', 'item_id' => 17, 'page_type' => 'contact-us'],
            ['id' => 18, 'value' => json_encode(['ar' => 'التقط جمال الممتلكات الخاصة بك', 'en' => 'CAPTURE THE BEAUTY OF YOUR PROPERTY']), 'item_name' => 'contact-us', 'item_id' => 18, 'page_type' => 'contact-us'],
            ['id' => 19, 'value' => json_encode(['ar' => 'يسعى فريقنا لتقديم خدمة عملاء ممتازة وضمان رضاكم الكامل.', 'en' => 'Our team strives to deliver excellent customer service and ensure your complete satisfaction.']), 'item_name' => 'contentcontact-us1', 'item_id' => 19, 'page_type' => 'contact-us'],
            ['id' => 20, 'value' => json_encode(['ar' => 'لا تتردد في الاتصال بنا للحصول على أية أسئلة أو المساعدة التي قد تحتاجها. نحن هنا لخدمتك!', 'en' => 'Don t hesitate to contact us for any questions or assistance you may need. We are here to serve you!']), 'item_name' => 'description_contact-us', 'item_id' => 20, 'page_type' => 'contact-us'],
            ['id' => 21, 'value' => json_encode(['ar' => 'موقع', 'en' => 'Portfolio']), 'item_name' => 'portfolio-title', 'item_id' => 21, 'page_type' => 'portfolio'],
            ['id' => 22, 'value' => json_encode(['ar' => 'نحن نفخر بمحفظتنا التي تتميز بمزيج متناغم من الإبداع والابتكار', 'en' => 'We take pride in our portfolio, which features a harmonious blend of creativity, innovation']), 'item_name' => 'portfolio-content', 'item_id' => 22, 'page_type' => 'portfolio'],
            ['id' => 23, 'value' => json_encode(['ar' => 'قائمة وكتالوج العقارات 1', 'en' => 'Listing & catalogue Real Estate 1']), 'item_name' => 'portfolio-content2', 'item_id' => 23, 'page_type' => 'portfolio'],
            ['id' => 24, 'value' => json_encode(['ar' => 'الرئيسية', 'en' => 'Home']), 'item_name' => 'home', 'item_id' => 24, 'page_type' => 'home'],
            ['id' => 25, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 25, 'page_type' => 'services'],
            ['id' => 26, 'value' => json_encode(['ar' => 'التسعير', 'en' => 'Pricing']), 'item_name' => 'pricing', 'item_id' => 26, 'page_type' => 'pricing'],
            ['id' => 27, 'value' => json_encode(['ar' => 'محل', 'en' => 'Store']), 'item_name' => 'Store', 'item_id' => 27, 'page_type' => 'Store'],
            ['id' => 28, 'value' => json_encode(['ar' => 'سجل الدخول', 'en' => 'login']), 'item_name' => 'login', 'item_id' => 28, 'page_type' => 'login'],
            ['id' => 29, 'value' => json_encode(['ar' => 'خدمة النظام ', 'en' => 'order service']), 'item_name' => 'order_service', 'item_id' => 29, 'page_type' => 'order_service'],
            ['id' => 30, 'value' => json_encode(['ar' => ' الروابط ', 'en' => 'Links']), 'item_name' => 'links', 'item_id' => 30, 'page_type' => 'links'],
            ['id' => 31, 'value' => json_encode(['ar' => ' التسويق عبر الإنترنت ', 'en' => 'Online Marketing']), 'item_name' => 'Online_Marketing', 'item_id' => 31, 'page_type' => 'Online_Marketing'],
            ['id' => 32, 'value' => json_encode(['ar' => '   أدارة الحدث ', 'en' => 'Event Management ']), 'item_name' => 'Event_Management', 'item_id' => 32, 'page_type' => 'Event_Management'],
            ['id' => 33, 'value' => json_encode(['ar' => '   العقارات', 'en' => 'Real Estate  ']), 'item_name' => 'Real_Estate', 'item_id' => 33, 'page_type' => 'Real_Estate'],
            ['id' => 34, 'value' => json_encode(['ar' => 'تصميم وتطوير الموقع', 'en' => 'Website design & development']), 'item_name' => 'Website_development', 'item_id' => 34, 'page_type' => 'Website_development'],
            ['id' => 35, 'value' => json_encode(['ar' => 'جولات الفيديو السينمائية', 'en' => 'Cinematic Video Tours']), 'item_name' => 'Cinematic', 'item_id' => 35, 'page_type' => 'Cinematic'],
            ['id' => 36, 'value' => json_encode(['ar' => 'التصوير الفوتوغرافي المتميز', 'en' => 'Premium Photography']), 'item_name' => 'Premium_Photography', 'item_id' => 36, 'page_type' => 'Premium_Photography'],
            ['id' => 37, 'value' => json_encode(['ar' => 'محفظة العمل', 'en' => 'Work Portfolio']), 'item_name' => 'Work_Portfolio', 'item_id' => 37, 'page_type' => 'Work_Portfolio'],


        ];

        Lang::insert($langs);

    }
}
