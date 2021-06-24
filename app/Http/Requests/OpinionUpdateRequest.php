<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpinionUpdateRequest extends FormRequest
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
        if ($this->input('language') == 'ar') {
            return [
                'opinion_ar' => 'required',
                'client_name_ar' => 'required',
                'rating' => 'required',
                'language' => 'required|in:ar,en,ar_en',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            ];
        } elseif ($this->input('language') == 'en') {
            return [
                'opinion_en' => 'required',
                'client_name_en' => 'required',
                'rating' => 'required',
                'language' => 'required|in:ar,en,ar_en',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            ];
        } elseif ($this->input('language') == 'ar_en') {
            return [
                'opinion_ar' => 'required',
                'opinion_en' => 'required',
                'client_name_ar' => 'required',
                'client_name_en' => 'required',
                'rating' => 'required',
                'language' => 'required|in:ar,en,ar_en',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => trans('opinions.required'),
            'in' => trans('opinions.in'),
            'image' => trans('opinions.image'),
            'mimes'=>trans('opinions.mimes'),
            'max'=>trans('opinions.image_max'),
            'photo.required' => trans('opinions.photo_required'),
        ];
    }
}
