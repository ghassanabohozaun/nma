<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    protected $table = 'metrics';
    protected $fillable = [
        'statement',
        'evaluation',
        'minimum',
        'maximum',
        'test_id',
        'photo',
    ];
    protected $hidden = ['updated_at'];
}
