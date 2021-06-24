<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website_main_page extends Model
{
    protected $table = 'website_main_pages';
    protected $fillable = [
        'counter_one_icon',
        'counter_one_text_ar',
        'counter_one_text_en',
        'counter_one_number',
        'counter_tow_icon',
        'counter_tow_text_ar',
        'counter_tow_text_en',
        'counter_tow_number',
        'counter_three_icon',
        'counter_three_text_ar',
        'counter_three_text_en',
        'counter_three_number',
        'counter_four_icon',
        'counter_four_text_ar',
        'counter_four_text_en',
        'counter_four_number',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
