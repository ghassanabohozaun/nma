<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $table = 'governorates';
    protected $fillable = [
        'governorate_name_ar',
        'governorate_name_en'
    ];
    protected $hidden = ['updated_at'];

    /////////////////////////////////// Relations ///////////////////////////////////////////
    ////// cities
    public function cities()
    {
        return $this->hasMany(City::class, 'governorate_id', 'id');
    }
}
