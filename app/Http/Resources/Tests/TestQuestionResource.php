<?php

namespace App\Http\Resources\Tests;
use View;
use Illuminate\Http\Resources\Json\JsonResource;

class TestQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        $options = view('admin.tests.questions.parts.options', ['instance' => $this])->render();
        $answer_count = view('admin.tests.questions.parts.answer_count', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'test_question' => $this->test_question,
            'answer_count'=>$answer_count,
            'options' => $options
        ];
    }
}
