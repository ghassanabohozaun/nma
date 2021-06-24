<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhoAreWeRequest extends FormRequest
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
            'who_are_we_ar' => 'required',
            'who_are_we_en' => 'required',
            'brochure' => 'nullable|sometimes|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'who_are_we_ar.required' => trans('aboutSite.who_are_we_ar_required'),
            'who_are_we_en.required' => trans('aboutSite.who_are_we_en_required'),
            'brochure.required' => trans('aboutSite.brochure_required'),
            'brochure.mimes' => trans('aboutSite.brochure_mimes'),
        ];
    }
}
