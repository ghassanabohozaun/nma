<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhomRequest extends FormRequest
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
            'whom_ar' => 'required',
            'whom_en' => 'required',
            'brochure' => 'nullable|sometimes|mimes:pdf',
        ];
    }

    function messages()
    {
        return [
            'whom_ar.required' => trans('aboutSite.whom_ar_required'),
            'whom_en.required' => trans('aboutSite.whom_en_required'),
            'brochure.required' => trans('aboutSite.brochure_required'),
            'brochure.mimes' => trans('aboutSite.brochure_mimes'),
        ];
    }
}
