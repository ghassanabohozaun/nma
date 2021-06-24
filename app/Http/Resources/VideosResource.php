<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class VideosResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.medias.videos.parts.options', ['instance' => $this])->render();
        $status = view('admin.medias.videos.parts.status', ['instance' => $this])->render();
        $photo = view('admin.medias.videos.parts.photo', ['instance' => $this])->render();
        $duration = view('admin.medias.videos.parts.duration', ['instance' => $this])->render();
        $added_date = view('admin.medias.videos.parts.added_date', ['instance' => $this])->render();


        return [
            'id' => $this->id,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'language' => $this->language,
            'status' => $status,
            'actions' => $options,
            'photo' => $photo,
            'duration' => $duration,
            'added_date' => $added_date,
        ];
    }
}
