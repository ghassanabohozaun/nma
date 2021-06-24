<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class testimonialRequest extends FormRequest
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
        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            return [
                'opinion_ar' => 'required',
                'client_name_ar' => 'required',
                'client_age' => 'required',
                'country' => 'required',
                'gender' => 'required',
                'rating' => 'required',
                'language' => 'sometimes|nullable|in:ar,en,ar_en',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
                'captcha' => 'required|captcha',

            ];
        } else {
            return [
                'opinion_en' => 'required',
                'client_name_en' => 'required',
                'client_age' => 'required',
                'country' => 'required',
                'gender' => 'required',
                'rating' => 'required',
                'language' => 'sometimes|nullable|in:ar,en,ar_en',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
                'captcha' => 'required|captcha'
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => trans('opinions.required'),
            'in' => trans('opinions.in'),
            'image' => trans('opinions.image'),
            'mimes' => trans('opinions.mimes'),
            'max' => trans('opinions.image_max'),
            'photo.required' => trans('opinions.photo_required'),
            'captcha'=>trans('general.captcha'),
        ];
    }
}
