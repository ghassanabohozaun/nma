<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
                'language' => 'required|in:ar,en,ar_en,',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
                'title_ar' => 'required',
                'summary_ar' => 'required',
                'details_ar' => 'required',
            ];
        } elseif ($this->input('language') == 'en') {
            return [
                'language' => 'required|in:ar,en,ar_en,',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
                'title_en' => 'required',
                'summary_en' => 'required',
                'details_en' => 'required',
            ];
        } elseif ($this->input('language') == 'ar_en') {
            return [
                'language' => 'required|in:ar,en,ar_en,',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
                'title_ar' => 'required',
                'title_en' => 'required',
                'summary_ar' => 'required',
                'summary_en' => 'required',
                'details_ar' => 'required',
                'details_en' => 'required',

            ];
        }

    }

    public function messages()
    {
        return [
            'language.required' => trans('services.language_required'),
            'title_ar.required' => trans('services.title_ar_required'),
            'title_en.required' => trans('services.title_en_required'),
            'summary_ar.required' => trans('services.summary_ar_required'),
            'summary_en.required' => trans('services.summary_en_required'),
            'details_ar.required' => trans('services.details_ar_required'),
            'details_en.required' => trans('services.details_en_required'),
            'in' => trans('services.in'),
            'numeric' => trans('services.numeric'),
            'image' => trans('services.image'),
            'unique'=>trans('services.unique'),
            'mimes'=>trans('services.mimes'),
            'max'=>trans('services.image_max'),
            'photo.required' => trans('services.photo_required'),
        ];
    }
}
