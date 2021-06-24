<?php

namespace App\Http\Resources\Tests;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class TestScalesResource extends JsonResource
{

    public function toArray($request)
    {
        $options = view('admin.tests.scales.parts.options', ['instance' => $this])->render();
        $photo = view('admin.tests.scales.parts.photo', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'statement' => $this->statement,
            'evaluation' => $this->evaluation,
            'minimum' => $this->minimum,
            'maximum' => $this->maximum,
            'photo' => $photo,
            'options' => $options
        ];
    }
}
