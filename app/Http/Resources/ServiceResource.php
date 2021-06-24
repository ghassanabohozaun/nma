<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class ServiceResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.services.parts.options', ['instance' => $this])->render();
        $photo = view('admin.services.parts.photo', ['instance' => $this])->render();
        $status = view('admin.services.parts.status', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'photo' => $photo,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'language' => $this->language,
            'status' => $status,
            'actions' => $options
        ];
    }
}
