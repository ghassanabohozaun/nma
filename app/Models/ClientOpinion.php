<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientOpinion extends Model
{
    protected $table = 'client_opinions';
    protected $fillable = [
        'photo',
        'language',
        'opinion_ar',
        'opinion_en',
        'client_name_ar',
        'client_name_en',
        'client_age',
        'country',
        'gender',
        'job_title_ar',
        'job_title_en',
        'rating',
        'status',
    ];
    protected $hidden = ['updated_at'];
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

    /// language accessors
    public function getGenderAttribute($value)
    {
        if ($value == 'male') {
            return trans('general.male');
        } elseif ($value == 'female') {
            return trans('general.female');
        }elseif ($value == 'others') {
            return trans('general.others');
        }

    }
}
