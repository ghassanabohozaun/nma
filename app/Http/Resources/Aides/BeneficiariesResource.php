<?php

namespace App\Http\Resources\Aides;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class BeneficiariesResource extends JsonResource
{
    public function toArray($request)
    {
        $options = view('admin.aides.beneficiaries.parts.options', ['instance' => $this])->render();
        $fullName = view('admin.aides.beneficiaries.parts.full-name', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'full_name' => $fullName,
            'personal_id' => $this->personal_id,
            'actions' => $options
        ];
    }
}
