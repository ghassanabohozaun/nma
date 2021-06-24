<?php

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
        $this->call(AdminSeeder::class);
        //$this->call(SettingsSeeder::class);
        //$this->call(AboutSiteSeeder::class);
        //$this->call(WhyChooseUsSeeder::class);
        //$this->call(WebsiteMainPageSeeder::class);
    }
}
