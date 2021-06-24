<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
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
                'started_date' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        } elseif ($this->input('language') == 'en') {
            return [
                'language' => 'required|in:ar,en,ar_en',
                'title_en' => 'required',
                'started_date' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        } elseif ($this->input('language') == 'ar_en') {
            return [
                'language' => 'required|in:ar,en,ar_en',
                'title_ar' => 'required',
                'title_en' => 'required',
                'started_date' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }


    }

    public function messages()
    {
        return [
            'required' => trans('trainings.required'),
            'in' => trans('trainings.in'),
            'image' => trans('trainings.image'),
            'mimes'=>trans('trainings.mimes'),
            'max'=>trans('trainings.image_max'),
            'photo.required' => trans('trainings.photo_required'),
        ];
    }
}
