<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationUpdateRequest extends FormRequest
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

    public function rules()
    {
        if ($this->input('language') == 'ar') {
            return [
                'language' => 'required|in:ar,en,ar_en,',
                'add_date' => 'required',
                'section_id' => 'required|numeric',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
                'title_ar' => 'required',
                'details_ar' => 'required',
            ];
        } elseif ($this->input('language') == 'en') {
            return [
                'language' => 'required|in:ar,en,ar_en,',
                'add_date' => 'required',
                'section_id' => 'required|numeric',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
                'title_en' => 'required',
                'details_en' => 'required',
            ];
        } elseif ($this->input('language') == 'ar_en') {
            return [
                'language' => 'required|in:ar,en,ar_en,',
                'add_date' => 'required',
                'section_id' => 'required|numeric',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
                'title_ar' => 'required',
                'title_en' => 'required',
                'details_ar' => 'required',
                'details_en' => 'required',

            ];
        }

    }

    public function messages()
    {
        return [
            'language.required' => trans('publications.language_required'),
            'add_date.required' => trans('publications.add_date_required'),
            'section_id.required' => trans('publications.section_id_required'),
            'title_ar.required' => trans('publications.title_ar_required'),
            'title_en.required' => trans('publications.title_en_required'),
            'details_ar.required' => trans('publications.details_ar_required'),
            'details_en.required' => trans('publications.details_en_required'),
            'in' => trans('publications.in'),
            'numeric' => trans('publications.numeric'),
            'image' => trans('publications.image'),
            'unique' => trans('publications.unique'),
            'mimes' => trans('publications.mimes'),
            'max' => trans('publications.image_max'),
            'photo.required' => trans('publications.photo_required'),
        ];
    }
}
