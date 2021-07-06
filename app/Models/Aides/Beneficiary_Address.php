<?php

namespace App\Models\Aides;

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
}
