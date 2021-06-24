<?php

use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WhyChooseUs::create([
            'title_ar' => '',
            'title_en' => '',
            'details_ar' => '',
            'details_en' => '',
        ]);
    }
}
