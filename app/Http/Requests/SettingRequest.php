<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_name_ar'=>'required|max:100',
            'site_name_en'=>'required|max:100',
            'site_language'=>'required|in:ar,en',
            'site_icon'=>'image|mimes:png|max:2048',
            'site_logo'=>'image|mimes:png,jpeg,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required'=>trans('settings.required'),
            'max'=>trans('settings.max'),
            'in'=>trans('settings.in'),
            'image'=>trans('settings.image'),
            'image_max'=>trans('settings.image_max'),
            'site_icon.mimes'=>trans('settings.site_icon_mimes'),
            'site_logo.mimes'=>trans('settings.site_logo_mimes'),

        ];
    }
}
