<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSite extends Model
{

    protected $table = 'about_sites';
    protected $fillable = [
        'whom_ar',
        'whom_en',
        'contact_us_ar',
        'contact_us_en',
        'brochure',
    ];
    protected $hidden = ['created_at', 'updated_at'];

}
