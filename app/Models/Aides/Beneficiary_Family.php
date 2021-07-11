<?php

namespace App\Models\Aides;

use Illuminate\Database\Eloquent\Model;

class Beneficiary_Family extends Model
{
    protected $table = 'beneficiary_families';
    protected $fillable = [
        'beneficiary_id',
        'family_status',
        'family_count',
        'family_male_count',
        'family_female_male_count',
        'family_count_less_than_18',
        'family_male_count_less_than_18',
        'family_female_count_less_than_18',
        'family_with_disabled',
        'disabled_count',
        'disabled_less_than_18_count',
        'family_with_patients',
        'patients_count',
    ];
    protected $hidden = ['created_at', 'updated_at'];

    ////////////////////////////// Relations//////////////////////////////////////
    /// with beneficiary
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
    }

    //////////////////////////////////// accessors ///////////////////////
    /// Family Status accessors
    public function getFamilyStatusAttribute($value)
    {
        if ($value == 'very_week') {
            return trans('aides.very_week');
        } elseif ($value == 'week') {
            return trans('aides.week');
        } elseif ($value == 'medium') {
            return trans('aides.medium');
        } elseif ($value == 'good') {
            return trans('aides.good');
        } elseif ($value == 'very_good') {
            return trans('aides.very_good');
        }
    }

}
