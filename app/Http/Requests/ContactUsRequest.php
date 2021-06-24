<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'contact_us_ar' => 'required',
            'contact_us_en' => 'required',
        ];
    }

    function messages()
    {
        return [
            'contact_us_ar.required' => trans('aboutSite.contact_us_ar_required'),
            'contact_us_en.required' => trans('aboutSite.contact_us_en_required'),
        ];
    }
}
