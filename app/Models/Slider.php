<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
        'language',
        'status',
        'order',
        'details_status',
        'button_status',
        'service_id',
        'photo',
    ];
    protected $hidden = ['updated_at'];

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    /// Relation
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
    //////////////////////////////////////////////////////////////
    /// accessors
    //////////////////////////////////////////////////////////////
    /// language
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

    /// Details Status
    public function getDetailsStatusAttribute($value)
    {
        if ($value == 'show') {
            return trans('sliders.show');
        } elseif ($value == 'hide') {
            return trans('sliders.hide');
        }
    }

    /// Button Status
    public function getButtonStatusAttribute($value)
    {
        if ($value == 'show') {
            return trans('sliders.show');
        } elseif ($value == 'hide') {
            return trans('sliders.hide');
        }
    }

}
