<?php

namespace App\Models\Aides;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $table = 'beneficiaries';
    protected $fillable = [
        'first_name',
        'father_name',
        'grandfather_name',
        'family_name',
        'personal_id',
        'wife_name',
        'wife_personal_id',
    ];
    protected $hidden = ['created_at', 'updated_at'];

    ////////////////////////////// Relations//////////////////////////////////////
    /// With Address
    public function beneficiaryAddress()
    {
        return $this->hasOne(Beneficiary_Address::class, 'beneficiary_id');
    }

    /// With Family
    public function beneficiaryFamily()
    {
        return $this->hasOne(Beneficiary_Family::class, 'beneficiary_id');
    }

    /// With Job
    public function beneficiaryJob()
    {
        return $this->hasOne(Beneficiary_Job::class, 'beneficiary_id');
    }


}
