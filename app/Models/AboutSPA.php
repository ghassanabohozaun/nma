<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSPA extends Model
{
    protected $table = 'about_spcs';
    protected $fillable = [
        'language',
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
        'status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    //////////////////////////////////////////////////////////////
    /// language accessors
    public function getLanguageAttribute($value)
    {
        if ($value == 'ar') {
            return trans('general.ar');

        } elseif ($value == 'en') {
            return trans('general.en');

        } elseif ($value == 'ar_en') {
            return trans('general.ar_en');
        }
    }
}
