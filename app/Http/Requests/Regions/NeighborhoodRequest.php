<?php

namespace App\Http\Requests\Regions;

use Illuminate\Foundation\Http\FormRequest;

class NeighborhoodRequest extends FormRequest
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
            'neighborhood_name_ar'=>'required',
            'neighborhood_name_en'=>'required',
            'city_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'neighborhood_name_ar.required'=>trans('regions.neighborhood_name_ar_required'),
            'neighborhood_name_en.required'=>trans('regions.neighborhood_name_en_required'),
            'city_id.required'=>trans('regions.city_id_required'),
        ];
    }
}
