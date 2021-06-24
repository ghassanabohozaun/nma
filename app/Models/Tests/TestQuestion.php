<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $table = 'test_questions';
    protected $fillable = [
        'test_question',
        'test_id',
    ];
    protected $hidden = ['updated_at'];
    ////////////////////////////////////////////////////////////////////////////
    /// relations
    public function test()
    {
        return $this->belongsTo('App\Models\Tests\Test', 'test_id', 'id');
    }
}
