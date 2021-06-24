<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = "publications";
    protected $fillable = [
        'photo',
        'language',
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
        'add_date',
        'section_id',
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

    //////////////////////////////////////////////////////////////
    /// Relations
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id', 'id');
    }


}
