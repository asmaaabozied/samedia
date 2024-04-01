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
            ['id' => 24, 'value' => json_encode(['ar' => 'التقط جمال الممتلكات الخاصة بك', 'en' => 'CAPTURE THE BEAUTY OF YOUR PROPERTY']), 'item_name' => 'home', 'item_id' => 24, 'page_type' => 'home'],
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
            ['id' => 38, 'value' => json_encode(['ar' => 'محفظة ', 'en' => ' Portfolio']), 'item_name' => 'Portfolio', 'item_id' => 38, 'page_type' => 'Portfolio'],
            ['id' => 39, 'value' => json_encode(['ar' => 'كتالوج العقارات 1 ', 'en' => ' Listing catalogue real esrate 1']), 'item_name' => 'header_Portfolio', 'item_id' => 39, 'page_type' => 'Portfolio'],
            ['id' => 40, 'value' => json_encode(['ar' => 'يُستخدم بشكل شائع في مسابقة الطباعة الرسومية بسبب صناعة النشر لمعاينة النماذج المرئية الخفيفة ', 'en' => 'Commonly used in the graphic prit quis due publishing indust for previewing lightlyvisual mockups']), 'item_name' => 'description_Portfolio', 'item_id' => 40, 'page_type' => 'Portfolio'],
            ['id' => 41, 'value' => json_encode(['ar' => 'كتالوج العقارات 2 ', 'en' => ' Listing catalogue real esrate 2']), 'item_name' => 'header2_Portfolio', 'item_id' => 41, 'page_type' => 'Portfolio'],

            ['id' => 42, 'value' => json_encode(['ar' => 'بطاقة بريدية جذابة لـ Home Finder ', 'en' => ' Compelling Home Finder postcard']), 'item_name' => 'description_Portfolio', 'item_id' => 42, 'page_type' => 'Portfolio'],
            ['id' => 43, 'value' => json_encode(['ar' => 'اتصل بنا اليوم للحصول على تصوير عقاري من الدرجة الأولى يسلط الضوء على الميزات الفريدة لممتلكاتك ويجذب المشترين المتحمسين', 'en' => ' Contact Us today for top- notch real estate photography that highlights the unique features of your property and attracts eager buyers']), 'item_name' => 'description2_Portfolio', 'item_id' => 43, 'page_type' => 'Portfolio'],

            ['id' => 44, 'value' => json_encode(['ar' => 'محفظة ', 'en' => ' Portfolio']), 'item_name' => 'SitePortfolio', 'item_id' => 44, 'page_type' => 'Portfolio'],
            ['id' => 45, 'value' => json_encode(['ar' => 'محفظة ', 'en' => ' Portfolio']), 'item_name' => 'SitePortfolio', 'item_id' => 45, 'page_type' => 'Portfolio'],
            ['id' => 46, 'value' => json_encode(['ar' => 'نحن نضمن تقديم الخدمة التي تلبي احتياجاتك وتتجاوز توقعاتك ', 'en' => ' we ensure to delivers as service that meets your needs and exceeds your expections']), 'item_name' => 'title1SitePortfolio', 'item_id' => 46, 'page_type' => 'SitePortfolio'],
            ['id' => 47, 'value' => json_encode(['ar' => 'تعزيز رائع لكل سعر المنزل والمبيعات', 'en' => ' exquistely enhance every home and sales price']), 'item_name' => 'title2SitePortfolio', 'item_id' => 47, 'page_type' => 'SitePortfolio'],
            ['id' => 48, 'value' => json_encode(['ar' => 'دعنا نأخذك في رحلة تصوير استثنائية', 'en' => 'let us take you on an exceptional photography jounery']), 'item_name' => 'title3SitePortfolio', 'item_id' => 48, 'page_type' => 'SitePortfolio'],
            ['id' => 49, 'value' => json_encode(['ar' => 'دعنا نأخذك في رحلة تصوير استثنائية', 'en' => 'let us take you on an exceptional photography jounery']), 'item_name' => 'descriptionSitePortfolio', 'item_id' => 49, 'page_type' => 'SitePortfolio'],
            ['id' => 50, 'value' => json_encode(['ar' => 'دعنا نأخذك في رحلة تصوير استثنائية', 'en' => 'let us take you on an exceptional photography jounery']), 'item_name' => 'description2SitePortfolio', 'item_id' => 50, 'page_type' => 'SitePortfolio'],
            ['id' => 51, 'value' => json_encode(['ar' => 'شريكك الإبداعي لهذه القائمة أو المشروع وما يليه', 'en' => 'your creative partner for this listing or project and the next']), 'item_name' => 'description3SitePortfolio', 'item_id' => 51, 'page_type' => 'SitePortfolio'],
            ['id' => 52, 'value' => json_encode(['ar' => 'فنية استثنائية في كل صورة', 'en' => 'exceptional artistry in every photo']), 'item_name' => 'description4SitePortfolio', 'item_id' => 52, 'page_type' => 'SitePortfolio'],
            ['id' => 53, 'value' => json_encode(['ar' => 'دعنا نأخذك في رحلة تصوير استثنائية', 'en' => 'let us take you on an exceptional photography jounery']), 'item_name' => 'description4SitePortfolio', 'item_id' => 53, 'page_type' => 'SitePortfolio'],

            ['id' => 54, 'value' => json_encode(['ar' => 'ثق بأفضل خبراء التصوير والتسويق العقاري في الخليج.', 'en' => "Trust the Bay's Best Real Estate Photography and Marketing Experts."]), 'item_name' => 'home', 'item_id' => 54, 'page_type' => 'home'],
            ['id' => 55, 'value' => json_encode(['ar' => 'فهو ملزم وما لم ينال المتعة التي متاعب الحقيقة هي ألم رفض قبول الألم. لأنه سوف ينتقد نفسه هنا لكونه مفيدا إلى حد ما.', 'en' => 'Tenetur eum et nisi suscipit voluptatem quae. Molestias veritatis incidunt sunt est dolore dolorem assumenda recusandae. Aliquid expedita esse ipsum hic reprehenderit enim.']), 'item_name' => 'home', 'item_id' => 55, 'page_type' => 'home'],
            ['id' => 56, 'value' => json_encode(['ar' => 'خدماتنا', 'en' => 'OUR SERVICES']), 'item_name' => 'home', 'item_id' => 56, 'page_type' => 'home'],
            ['id' => 57, 'value' => json_encode(['ar' => 'اكتشف خدمتنا لتحقيق أقصى قدر من إمكانات منزلك.', 'en' => "Discover Our Service to Maximize Your Home's Potential."]), 'item_name' => 'home', 'item_id' => 57, 'page_type' => 'home'],
            ['id' => 58, 'value' => json_encode(['ar' => 'جولات الفيديو السينمائية', 'en' => 'CINEMATIC VIDEO TOURS']), 'item_name' => 'home', 'item_id' => 58, 'page_type' => 'home'],
            ['id' => 59, 'value' => json_encode(['ar' => 'افتح الباب أمام عالم من الجمال والتصميم الأنيق', 'en' => 'Open the Door to a World of Beauty and Elegant Design']), 'item_name' => 'home', 'item_id' => 59, 'page_type' => 'home'],
            ['id' => 60, 'value' => json_encode(['ar' => 'إبراز جماليات مشاريعك العقارية، وتصوير فيديو احترافي: إضافة لمسة سحرية إلى مشاريعك العقارية
            تم تصميم خدمات تصوير الفيديو والتصوير العقاري لدينا لتزويد الوسطاء بأفضل المواد للمساعدة في بيع عقاراتهم', 'en' => 'Showcasing the Aesthetics of Your Real Estate Projects, Professional Video Shooting: Adding a Magical Touch to Your Real Estate Ventures Our real estate videography and photography services are designed to provide brokers with the best materials to help sell their properties']), 'item_name' => 'home', 'item_id' => 60, 'page_type' => 'home'],
            ['id' => 61, 'value' => json_encode(['ar' => 'العقارات', 'en' => 'REAL ESTATE']), 'item_name' => 'home', 'item_id' => 61, 'page_type' => 'home'],
            ['id' => 62, 'value' => json_encode(['ar' => 'استكشف الإمكانيات اللانهائية في عالم العقارات', 'en' => 'Explore Infinite Possibilities in the World of Real Estate']), 'item_name' => 'home', 'item_id' => 62, 'page_type' => 'home'],
            ['id' => 63, 'value' => json_encode(['ar' => 'استثمارك العقاري المثالي يبدأ هنا، واكتشاف الفرص التي لا نهاية لها، وخدمات الوساطة العقارية المتخصصة في دولة الإمارات العربية المتحدة. نحن نساعد عملائنا على شراء وبيع وتأجير العقارات بكل سهولة وثقة.', 'en' => 'Your Perfect Real Estate Investment Starts Here, Discovering Endless Opportunities,Expert real estate brokerage services in the United Arab Emirates. We help our clients buy, sell, and rent properties with ease and confidence.']), 'item_name' => 'home', 'item_id' => 63, 'page_type' => 'home'],
            ['id' => 64, 'value' => json_encode(['ar' => 'تصميم وتطوير المواقع الإلكترونية', 'en' => 'WEBSITE DESIGN & DEVELOPMENT']), 'item_name' => 'home', 'item_id' => 64, 'page_type' => 'home'],
            ['id' => 65, 'value' => json_encode(['ar' => 'تصميم موقع ويب يلهم ويثير الإعجاب', 'en' => 'Website Design that Inspires and Impresses']), 'item_name' => 'home', 'item_id' => 65, 'page_type' => 'home'],
            ['id' => 66, 'value' => json_encode(['ar' => 'انطلق في رحلة حضورك الرقمي مع فريقنا المحترف، صمم صفحتك الإلكترونية بباقة مناسبة من اختيارك، تجربة مميزة في عالم تصميم وتطوير الويب', 'en' => 'Embark on Your Digital Presence Journey with Our Professional Team, Design your web page with a suitable package of your choice, A Distinctive Experience in the World of Design and Web Development']), 'item_name' => 'home', 'item_id' => 66, 'page_type' => 'home'],
            ['id' => 67, 'value' => json_encode(['ar' => 'التسويق عبر الإنترنت', 'en' => 'ONLINE MARKETING']), 'item_name' => 'home', 'item_id' => 67, 'page_type' => 'home'],
            ['id' => 68, 'value' => json_encode(['ar' => 'قم بإلقاء الضوء على علامتك التجارية بنقرة واحدة', 'en' => 'Illuminate Your Brand with a Single Click']), 'item_name' => 'home', 'item_id' => 68, 'page_type' => 'home'],
            ['id' => 69, 'value' => json_encode(['ar' => 'استراتيجيات تسويق قوية تحقق نتائج استثنائية، وتسويقًا بارعًا عبر الإنترنت يضعك في المقدمة. يمكن أن تساعدك خدمة التسويق عبر الإنترنت لدينا في إنشاء استراتيجية تسويق رقمية شاملة مصممة خصيصًا لتلبية احتياجات عملك. يمكننا مساعدتك في تحديد القنوات المناسبة للوصول إلى جمهورك المستهدف وإنشاء محتوى جذاب يلقى صدى لديهم.', 'en' => 'Powerful Marketing Strategies Delivering Exceptional Results, Masterful Online Marketing that Puts You at the Forefront. Our online marketing service can help you create a comprehensive digital marketing strategy that is tailored to your business needs. We can help you identify the right channels to reach your target audience and create engaging content that resonates with them.']), 'item_name' => 'home', 'item_id' => 69, 'page_type' => 'home'],

            ['id' => 70, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 70, 'page_type' => 'services'],
            ['id' => 71, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 71, 'page_type' => 'services'],
            ['id' => 72, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 72, 'page_type' => 'services'],
            ['id' => 73, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 73, 'page_type' => 'services'],
            ['id' => 74, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 74, 'page_type' => 'services'],
            ['id' => 75, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 75, 'page_type' => 'services'],
            ['id' => 76, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 76, 'page_type' => 'services'],
            ['id' => 77, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 77, 'page_type' => 'services'],
            ['id' => 78, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 78, 'page_type' => 'services'],
            ['id' => 79, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 79, 'page_type' => 'services'],
            ['id' => 80, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 80, 'page_type' => 'services'],
            ['id' => 81, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 81, 'page_type' => 'services'],
            ['id' => 82, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 82, 'page_type' => 'services'],
            ['id' => 83, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 83, 'page_type' => 'services'],
            ['id' => 84, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 84, 'page_type' => 'services'],
            ['id' => 85, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 85, 'page_type' => 'services'],
            ['id' => 86, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 86, 'page_type' => 'services'],
            ['id' => 87, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 87, 'page_type' => 'services'],
            ['id' => 88, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 88, 'page_type' => 'services'],
            ['id' => 89, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 89, 'page_type' => 'services'],
            ['id' => 90, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 90, 'page_type' => 'services'],
            ['id' => 91, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 91, 'page_type' => 'services'],
            ['id' => 92, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 92, 'page_type' => 'services'],
            ['id' => 93, 'value' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'item_name' => 'services', 'item_id' => 93, 'page_type' => 'services'],




        ];

        Lang::insert($langs);

    }
}
