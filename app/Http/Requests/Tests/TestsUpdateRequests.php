<?php

namespace App\Http\Requests\Tests;

use Illuminate\Foundation\Http\FormRequest;

class TestsUpdateRequests extends FormRequest
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
            'language'=>'required',
            'test_name' => 'required',
            'test_details'=> 'required',
            'test_photo' => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('tests.required'),
            'test_photo.required' => trans('tests.photo_required'),
            'test_photo.image' => trans('tests.photo_image'),
            'test_photo.mimes' => trans('tests.photo_mimes'),
            'test_photo.max' => trans('tests.photo_max'),
        ];
    }
}
