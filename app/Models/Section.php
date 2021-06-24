<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    protected $fillable = [
        'language',
        'title_ar',
        'title_en',
        'publications_number',
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

        } elseif ($value == 'without_language') {
            return trans('sliders.without_language');
        }
    }
    //////////////////////////////////////////////////////////////
    /// Relations
    public function publication()
    {
        return $this->hasMany('App\Models\Publication', 'section_id', 'id');
    }
}
