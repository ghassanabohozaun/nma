<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class SectionResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.publications.sections.parts.options', ['instance' => $this])->render();
        $publications_number = view('admin.publications.sections.parts.publicationsNumber', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'language' => $this->language,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'publications_number' => $publications_number,
            'actions' => $options
        ];
    }
}
