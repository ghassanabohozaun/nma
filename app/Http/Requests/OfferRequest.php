<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
                'details_ar' => 'required',
                'language' => 'required|in:ar,en,ar_en',
                'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'mobile_number' => 'required',
            ];
        } elseif ($this->input('language') == 'en') {
            return [
                'title_en' => 'required',
                'details_en' => 'required',
                'language' => 'required|in:ar,en,ar_en',
                'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'mobile_number' => 'required',
            ];
        } elseif ($this->input('language') == 'ar_en') {
            return [
                'title_ar' => 'required',
                'title_en' => 'required',
                'details_ar' => 'required',
                'details_en' => 'required',
                'language' => 'required|in:ar,en,ar_en',
                'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'mobile_number' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => trans('offers.required'),
            'in' => trans('offers.in'),
            'image' => trans('offers.image'),
            'mimes'=>trans('offers.mimes'),
            'max'=>trans('offers.image_max'),
            'photo.required' => trans('offers.photo_required'),
        ];
    }
}
