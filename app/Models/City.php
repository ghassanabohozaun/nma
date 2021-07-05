<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'city_name_ar',
        'city_name_en',
        'governorate_id'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    /////////////////////////////////// Relations ///////////////////////////////////////////
    ////// governorate
    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id', 'id');
    }
    /////////////////////////////////////////////////////////////////////////////////////////
    ////// neighborhoods
    public function neighborhoods(){
        return $this->hasMany(Neighborhood::class,'city_id','id');
    }
}
