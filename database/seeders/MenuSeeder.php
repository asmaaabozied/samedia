<?php

namespace Database\Seeders;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->delete();

        $langs = [
            ['id' => 1, 'name' => json_encode(['ar' => 'الرئيسية', 'en' => 'Home']), 'order'=> 1, 'url'=>'/'],
            ['id' => 2, 'name' => json_encode(['ar' => 'الخدمات', 'en' => 'Services']), 'order'=> 2, 'url'=>'/services'],
            ['id' => 3, 'name' => json_encode(['ar' => 'سابقة أعمال', 'en' => 'Portfolio']), 'order' => 3, 'url'=>'/portfolio'],
            ['id' => 4, 'name' => json_encode(['ar' => 'معلومات عنا', 'en' => 'About us']), 'order' => 4, 'url'=>'/about-us'],
            ['id' => 5, 'name' => json_encode(['ar' => 'أتصل بنا', 'en' => 'Contact us']), 'order' => 5, 'url'=>'/contact-us'],
        ];

        Menu::insert($langs);
    }
}
