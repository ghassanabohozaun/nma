<?php

namespace App\Http\Requests\Regions;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'city_name_ar' => 'required',
            'city_name_en' => 'required',
            'governorate_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'city_name_ar.required' => trans('regions.city_name_ar_required'),
            'city_name_en.required' => trans('regions.city_name_en_required'),
            'governorate_id.required' => trans('regions.governorate_id_required'),
        ];
    }
}
