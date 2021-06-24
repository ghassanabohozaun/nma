<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';
    protected $fillable = [
        'language',
        'test_name',
        'test_details',
        'test_photo',
        'question_count',
        'metrics_count',
        'added_date',
        'number_times_of_use',
        'status',
        'file'
    ];


    ////////////////////////////////////////////////////////////////////////////
    /// relations
    public function questions()
    {
        return $this->hasMany('App\Models\Tests\TestQuestion', 'test_id', 'id');
    }

}
