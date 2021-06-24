<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
                'title_ar' => 'required',
                'language' => 'required|in:ar,en,ar_en',
            ];
        } elseif ($this->input('language') == 'en') {
            return [
                'title_en' => 'required',
                'language' => 'required|in:ar,en,ar_en',
            ];
        } elseif ($this->input('language') == 'ar_en') {
            return [
                'title_ar' => 'required',
                'title_en' => 'required',
                'language' => 'required|in:ar,en,ar_en',
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => trans('sections.required'),
            'in' => trans('sections.in'),
        ];
    }
}
