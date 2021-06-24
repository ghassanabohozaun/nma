<?php

use App\Models\AboutSite;
use Illuminate\Database\Seeder;

class AboutSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutSite::create([
            'whom_ar' => '',
            'whom_en' => '',
            'contact_us_ar' => '',
            'contact_us_en' => '',
        ]);
    }
}
