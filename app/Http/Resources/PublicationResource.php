<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;
class PublicationResource extends JsonResource
{

    public function toArray($request)
    {
        $options = view('admin.publications.parts.options', ['instance' => $this])->render();
        $photo = view('admin.publications.parts.photo', ['instance' => $this])->render();
        $section_id = view('admin.publications.parts.section', ['instance' => $this->section])->render();
        $status = view('admin.publications.parts.status', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'photo' => $photo,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'language' => $this->language,
            'add_date' => $this->add_date,
            'status' => $status,
            'section_id' => $section_id,
            'actions' => $options
        ];
    }
}
