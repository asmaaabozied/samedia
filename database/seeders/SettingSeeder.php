<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'terms_conditions' =>  json_encode(['ar' => 'معلومات عنا', 'en' => 'About Us']),
            'description' =>  json_encode(['ar' => 'معلومات عنا', 'en' => 'About Us']),
//            'key_words' => fake()->text,
            'closing_message' =>  json_encode(['ar' => 'معلومات عنا', 'en' => 'About Us']),

            'website_address' =>  json_encode(['ar' => 'معلومات عنا', 'en' => 'About Us']),
            'website_link' => fake()->url(),

            'email' => fake()->email(),


            'time_difference' => fake()->time,

            'logo' => fake()->image,


            'phone_one' => fake()->phoneNumber(),
            'phone_two' => fake()->phoneNumber(),

            'twitter' => fake()->url(),
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'youtube' => fake()->url(),
            'snapchat' => fake()->url(),
            'play_store' => fake()->url(),
            'google_play' => fake()->url(),


        ]);
    }
}
