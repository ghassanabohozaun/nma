<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        return [
            'name' => 'required',
            'password' => 'sometimes|nullable|min:6',
            'gender' => 'required|in:male,female',
            'role_id' => 'required',
            'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
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
