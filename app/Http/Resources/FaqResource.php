<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class FaqResource extends JsonResource
{

    public function toArray($request)
    {
        $options = view('admin.faqs.parts.options', ['instance' => $this])->render();
        $status = view('admin.faqs.parts.status', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'question_ar' => $this->question_ar,
            'question_en' => $this->question_en,
            'language' => $this->language,
            'status' => $status,
            'actions' => $options
        ];
    }
}
