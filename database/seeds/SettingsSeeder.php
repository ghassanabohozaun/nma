<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Setting::create([
           'site_name_ar'=>'-',
           'site_name_en'=>'-',
           'site_status'=>1,
           'site_language'=>'en',
       ]);
    }
}
