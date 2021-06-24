<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class OfferResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.offers.parts.options', ['instance' => $this])->render();
        $photo = view('admin.offers.parts.photo', ['instance' => $this])->render();
        $status = view('admin.offers.parts.status', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'photo' => $photo,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'language' => $this->language,
            'mobile_number' => $this->mobile_number,
            'status' => $status,
            'actions' => $options
        ];
    }
}
