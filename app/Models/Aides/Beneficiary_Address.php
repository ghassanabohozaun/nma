<?php

namespace App\Models\Aides;

use App\Models\City;
use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Model;

class Beneficiary_Address extends Model
{
    protected $table = 'beneficiary_addresses';
    protected $fillable = [
        'beneficiary_id',
        'governorate',
        'city',
        'neighborhood',
        'address_details',
        'mobile',
        'mobile_tow',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    ////////////////////////////// Relations//////////////////////////////////////
    ///With beneficiary
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
    }
    ////////////////////////////////////////////////////////////////////////////
    ///With city
    public function cityRelation(){
        return $this->belongsTo(City::class,'city');
    }

    ////////////////////////////////////////////////////////////////////////////
    ///With neighborhood
    public function neighborhoodRelation(){
        return $this->belongsTo(Neighborhood::class,'neighborhood');
    }

}
