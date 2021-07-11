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
        $mobile = view('admin.aides.beneficiaries.parts.mobile', ['instance' => $this->beneficiaryAddress])->render();
        $city = view('admin.aides.beneficiaries.parts.city', ['instance' => $this->beneficiaryAddress->cityRelation])->render();
        $neighborhood = view('admin.aides.beneficiaries.parts.neighborhood', ['instance' => $this->beneficiaryAddress->neighborhoodRelation])->render();
        $familyCount = view('admin.aides.beneficiaries.parts.family_count', ['instance' => $this])->render();
        $aidesCount = view('admin.aides.beneficiaries.parts.aides_count', ['instance' => $this])->render();
        $isNoorEmployee= view('admin.aides.beneficiaries.parts.is_noor_employee', ['instance' => $this->beneficiaryJob])->render();


        return [
            'id' => $this->id,
            'full_name' => $fullName,
            'personal_id' => $this->personal_id,
            'mobile' => $mobile,
            'city' => $city,
            'neighborhood' => $neighborhood,
            'family_count' => $familyCount,
            'aides_count' => $aidesCount,
            'is_noor_employee'=>$isNoorEmployee,
            'actions' => $options,
        ];
    }
}
