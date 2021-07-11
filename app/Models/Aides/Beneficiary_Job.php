<?php

namespace App\Models\Aides;

use Illuminate\Database\Eloquent\Model;

class Beneficiary_Job extends Model
{
    protected $table = 'beneficiary_jobs';
    protected $fillable = [
        'beneficiary_id',
        'job_status',
        'job_class',
        'benefit_from_agency_coupon',
        'benefit_from_social_affairs',
        'is_noor_employee',
    ];
    protected $hidden = ['created_at', 'updated_at'];

    ////////////////////////////// Relations//////////////////////////////////////
    /// with beneficiary
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
    }
    //////////////////////////////////// accessors ///////////////////////
    /// Job Status accessors
    public function getJobStatusAttribute($value)
    {
        if ($value == 'permanent') {
            return trans('aides.permanent');
        } elseif ($value == 'unemployment') {
            return trans('aides.unemployment');
        } elseif ($value == 'daily') {
            return trans('aides.daily');
        } elseif ($value == 'Unemployed') {
            return trans('aides.Unemployed');
        }
    }
    //////////////////////////////////// accessors ///////////////////////
    /// Job Class accessors
    public function getJobClassAttribute($value)
    {
        if ($value == 'gaza_government') {
            return trans('aides.gaza_government');
        } elseif ($value == 'west_bank_government') {
            return trans('aides.west_bank_government');
        } elseif ($value == 'unrwa') {
            return trans('aides.unrwa');
        } elseif ($value == 'private_job') {
            return trans('aides.private_job');
        } elseif ($value == 'none') {
            return trans('aides.none');
        }
    }
}
