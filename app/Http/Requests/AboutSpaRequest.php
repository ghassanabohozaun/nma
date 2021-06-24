<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutSpaRequest extends FormRequest
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
                'details_ar' => 'required',
            ];
        } elseif ($this->input('language') == 'en') {
            return [
                'language' => 'required|in:ar,en,ar_en',
                'title_en' => 'required',
                'details_en' => 'required',
            ];
        } elseif ($this->input('language') == 'ar_en') {
            return [
                'language' => 'required|in:ar,en,ar_en',
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
            'required' => trans('aboutSpa.required'),
            'in' => trans('aboutSpa.in'),
        ];
    }
}
