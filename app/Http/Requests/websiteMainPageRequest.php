<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class websiteMainPageRequest extends FormRequest
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
            'counter_one_icon' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            'counter_one_text_ar' => 'required',
            'counter_one_text_en' => 'required',
            'counter_one_number' => 'required',
            'counter_tow_icon' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            'counter_tow_text_ar' => 'required',
            'counter_tow_text_en' => 'required',
            'counter_tow_number' => 'required',
            'counter_three_icon' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            'counter_three_text_ar' => 'required',
            'counter_three_text_en' => 'required',
            'counter_three_number' => 'required',
            'counter_four_icon' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            'counter_four_text_ar' => 'required',
            'counter_four_text_en' => 'required',
            'counter_four_number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('settings.required'),
            'image' => trans('settings.image'),
            'mimes' => trans('settings.mimes'),
            'max' => trans('settings.image_max'),
        ];
    }
}
