<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';

    protected $fillable = [
        'language',
        'title_ar',
        'title_en',
        'status',
        'started_date',
        'photo',
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
