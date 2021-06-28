<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;
class UsersTrashedResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.users.parts.trashed_options', ['instance' => $this])->render();
        $photo = view('admin.users.parts.photo', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'gender' => $this->gender,
            'last_login_at' => $this->last_login_at,
            'last_login_ip' => $this->last_login_ip,
            'photo' => $photo,
            'actions' => $options
        ];
    }
}
