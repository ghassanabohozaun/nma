<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class AboutSpaResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.about-spa.parts.options', ['instance' => $this])->render();
        $status = view('admin.about-spa.parts.status', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'language' => $this->language,
            'status' => $status,
            'actions' => $options
        ];
    }
}
