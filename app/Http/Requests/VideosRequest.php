<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideosRequest extends FormRequest
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
                'language' => 'required|in:ar,en,ar_en',
                'title_ar' => 'required',
                'link' => 'required',
                'photo'=>'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
            ];
        } elseif ($this->input('language') == 'en') {
            return [
                'language' => 'required|in:ar,en,ar_en',
                'title_en' => 'required',
                'link' => 'required',
                'photo'=>'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
            ];
        } elseif ($this->input('language') == 'ar_en') {
            return [
                'language' => 'required|in:ar,en,ar_en',
                'title_ar' => 'required',
                'title_en' => 'required',
                'link' => 'required',
                'photo'=>'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
            ];
        }

    }

    public function messages()
    {
        return [
            'required' => trans('videos.required'),
            'in' => trans('videos.in'),
            'image' => trans('videos.image'),
            'mimes' => trans('videos.mimes'),
            'max' => trans('videos.image_max'),
        ];
    }
}
