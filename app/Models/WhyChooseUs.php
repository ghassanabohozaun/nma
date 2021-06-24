<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $table = 'why_choose_us';
    protected $fillable = [
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
        'photo'
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
