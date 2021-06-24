<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommunicationRequestsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'communication_sender' => 'required',
            'communication_email' => 'required|email',
            'communication_mobile' => 'required',
            'communication_title' => 'required',
            'communication_details' => 'required',
            'communication_status' => 'sometimes|nullable|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'communication_sender.required' => trans('communicationRequests.sender_required'),
            'communication_email.required' => trans('communicationRequests.email_required'),
            'communication_mobile.required' => trans('communicationRequests.mobile_required'),
            'communication_title.required' => trans('communicationRequests.title_required'),
            'communication_details.required' => trans('communicationRequests.details_required'),
            'communication_status.required' => trans('communicationRequests.status_required'),



            'email'=>trans('communicationRequests.email_email'),
            'in' => trans('communicationRequests.in'),
        ];
    }
}
