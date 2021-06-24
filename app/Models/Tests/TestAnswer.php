<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    protected $table = 'test_answers';
    protected $fillable = [
        'answer_text',
        'answer_value',
        'test_question_id'
    ];
    protected $hidden = ['updated_at'];

}
