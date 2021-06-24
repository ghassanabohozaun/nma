<?php

namespace App\Http\Resources\Tests;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('admin.tests.parts.options', ['instance' => $this])->render();
        $active = view('admin.tests.parts.active', ['instance' => $this])->render();
        $question_count = view('admin.tests.parts.question-count', ['instance' => $this])->render();
        $metrics_count = view('admin.tests.parts.metrics-count', ['instance' => $this])->render();
        $testPhoto = view('admin.tests.parts.test_photo', ['instance' => $this])->render();
        $file = view('admin.tests.parts.file', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'test_name' => $this->test_name,
            'question_count' => $question_count,
            'metrics_count' => $metrics_count,
            'added_date' => $this->added_date,
            'number_times_of_use' => $this->number_times_of_use,
            'status' => $active,
            'file' => $file,
            'test_photo' => $testPhoto,
            'options' => $options
        ];
    }
}
