<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class CommunicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('admin.communication-requests.parts.options', ['instance' => $this])->render();
        $status = view('admin.communication-requests.parts.status', ['instance' => $this])->render();
        $sendDate = view('admin.communication-requests.parts.sendDate', ['instance' => $this])->render();
        return [
            'id' => $this->id,
            'communication_sender' => $this->communication_sender,
            'communication_email' => $this->communication_email,
            'communication_mobile' => $this->communication_mobile,
            'communication_title' => $this->communication_title,
            'communication_details' => $this->communication_details,
            'communication_status' => $status,
            'sendDate' => $sendDate,
            'options' => $options
        ];
    }
}
