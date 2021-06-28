<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class UsersResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.users.parts.options', ['instance' => $this])->render();
        $status = view('admin.users.parts.status', ['instance' => $this])->render();
        $photo = view('admin.users.parts.photo', ['instance' => $this])->render();
        $role = view('admin.users.parts.role', ['instance' => $this->role])->render();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $role,
            'mobile' => $this->mobile,
            'gender' => $this->gender,
            'last_login_at' => $this->last_login_at,
            'last_login_ip' => $this->last_login_ip,
            'photo' => $photo,
            'status' => $status,
            'actions' => $options
        ];
    }
}
