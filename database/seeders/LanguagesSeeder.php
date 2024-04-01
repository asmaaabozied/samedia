<?php

namespace Database\Seeders;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();

        $langs = [
            ['id' => 1, 'name' => 'English', 'character' => 'en'],
            ['id' => 2, 'name' => 'العربية', 'character' => 'ar'],
        ];

        Language::insert($langs);
    }
}
