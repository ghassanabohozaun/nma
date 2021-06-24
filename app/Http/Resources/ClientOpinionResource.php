<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;
class ClientOpinionResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.opinions.parts.options', ['instance' => $this])->render();
        $photo = view('admin.opinions.parts.photo', ['instance' => $this])->render();
        $status = view('admin.opinions.parts.status', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'photo' => $photo,
            'language'=>$this->language,
            'opinion_ar' => $this->opinion_ar,
            'opinion_en' => $this->opinion_en,
            'client_name_ar' => $this->client_name_ar,
            'client_name_en' => $this->client_name_en,
            'client_age' => $this->client_age,
            'gender' => $this->gender,
            'rating' => $this->rating,
            'status' => $status,
            'actions' => $options,

        ];
    }
}
