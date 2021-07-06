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

}
