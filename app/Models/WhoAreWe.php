<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoAreWe extends Model
{
    protected $table = 'who_are_we';
    protected $fillable = [
        'who_are_we_ar',
        'who_are_we_en',
        'brochure',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
