<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'name'=>'required',
            'password'=>'sometimes|nullable|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>trans('login.name_requires'),
            'email.required'=>trans('login.email_required'),
            'email.email'=>trans('login.email_email'),
            'password.min'=>trans('login.password_min'),
        ];
    }
}
