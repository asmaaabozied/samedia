<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LangSeeder::class,
            PermissionSeeder::class,
            SettingSeeder::class,
            LanguagesSeeder::class,
            MenuSeeder::class
        ]);
    }
}



