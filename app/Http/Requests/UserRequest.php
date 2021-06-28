<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:6',
            'gender' => 'required|in:male,female',
            'role_id' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('users.required'),
            'in' => trans('users.in'),
            'email.unique' => trans('users.email_unique'),
            'email.email' => trans('users.email_email'),
            'password.min' => trans('users.min'),
            'photo.image' => trans('users.image'),
            'photo.required' => trans('users.image_required'),
            'photo.mimes' => trans('users.mimes'),
            'photo.max' => trans('users.image_max'),

        ];
    }
}
