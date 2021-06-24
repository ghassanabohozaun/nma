<?php

namespace App\Http\Requests\Tests;

use Illuminate\Foundation\Http\FormRequest;

class TestScalesRequest extends FormRequest
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
            'statement' => 'required',
            'evaluation' => 'required',
            'minimum' => 'required',
            'maximum' => 'required',
            'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2024'
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('tests.required'),
            'photo.required' => trans('tests.photo_required'),
            'photo.image' => trans('tests.photo_image'),
            'photo.mimes' => trans('tests.photo_mimes'),
            'photo.max' => trans('tests.photo_max'),
        ];
    }
}
