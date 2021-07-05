<?php

namespace App\Http\Requests\Regions;

use Illuminate\Foundation\Http\FormRequest;

class GovernorateRequest extends FormRequest
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
            'governorate_name_ar' => 'required',
            'governorate_name_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'governorate_name_ar.required' => trans('regions.governorate_name_ar_required'),
            'governorate_name_en.required' => trans('regions.governorate_name_en_required'),
        ];
    }
}
