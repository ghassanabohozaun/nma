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
            'name' => $this->name,
            'permissions'=>$permissions,
            'actions' => $options
        ];
    }
}
