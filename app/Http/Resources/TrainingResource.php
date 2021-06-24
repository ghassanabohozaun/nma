<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class TrainingResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.trainings.parts.options', ['instance' => $this])->render();
        $photo = view('admin.trainings.parts.photo', ['instance' => $this])->render();
        $status = view('admin.trainings.parts.status', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'language' => $this->language,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'status' => $status,
            'started_date' => $this->started_date,
            'photo' => $photo,
            'actions' => $options
        ];
    }
}
