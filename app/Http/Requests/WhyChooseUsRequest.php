<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhyChooseUsRequest extends FormRequest
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
            'title_ar'=>'required',
            'title_en'=>'required',
            'details_ar'=>'required',
            'details_en'=>'required',
            'photo'=>'image|mimes:png,jpeg,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required'=>trans('aboutSite.required'),
            'image'=>trans('aboutSite.image'),
            'image_max'=>trans('aboutSite.image_max'),
            'mimes'=>trans('aboutSite.site_icon_mimes'),
        ];
    }
}
