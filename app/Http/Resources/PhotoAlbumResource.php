<?php

namespace App\Http\Resources;
use View;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoAlbumResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.medias.photo-albums.parts.options', ['instance' => $this])->render();
        $main_photo = view('admin.medias.photo-albums.parts.mainPhoto', ['instance' => $this])->render();
        $status = view('admin.medias.photo-albums.parts.status', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'main_photo' => $main_photo,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'language' => $this->language,
            'status' => $status,
            'actions' => $options
        ];
    }
}
