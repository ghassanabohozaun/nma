<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'photo',
        'language',
        'title_ar',
        'title_en',
        'summary_ar',
        'summary_en',
        'details_ar',
        'details_en',
        'status',
        'is_treatment_area',
    ];
    protected $hidden = ['updated_at'];

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    /// Relation
    public function slider(){
        return $this->hasMany('App\Models\Slider','service_id','id');
    }

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
