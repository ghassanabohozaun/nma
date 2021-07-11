<?php

namespace App\Models;

use App\Models\Aides\Beneficiary_Address;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    protected $table = 'neighborhoods';
    protected $fillable = [
        'neighborhood_name_ar',
        'neighborhood_name_en',
        'city_id'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    /////////////////////////////////////////////////////////////////////////////////////////
    ////// city
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    ////// beneficiary Address
    public function beneficiaryAddress(){
        return $this->hasOne(Beneficiary_Address::class,'neighborhood');
    }
}
