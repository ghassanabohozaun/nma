<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;
class RoleResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.roles.parts.options', ['instance' => $this])->render();
        $permissions = view('admin.roles.parts.permissions', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'role_name_ar' => $this->role_name_ar,
            'role_name_en' => $this->role_name_en,
            'permissions'=>$permissions,
            'actions' => $options
        ];
    }
}
