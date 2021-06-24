<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = [
        'photo',
        'language',
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
        'mobile_number',
        'status',
    ];
    protected $hidden=['updated_at'];
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

        } elseif ($value == 'without_language') {
            return trans('sliders.without_language');
        }
    }

}
