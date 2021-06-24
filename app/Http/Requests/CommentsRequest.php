<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
            'person_ip'=>'required',
            'person_name'=>'required',
            'person_email'=>'required|email',
            'commentary'=>'required',
            'status'=>'required|in:enable,disable',
            'post_id'=>'required|numeric',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'person_name.required'=>trans('posts.person_name_required'),
            'person_email.required'=>trans('posts.person_email_required'),
            'commentary.required'=>trans('posts.commentary_required'),
            'person_email.email'=>trans('posts.person_email_email'),
            'required'=>trans('posts.required'),
            'in'=>trans('posts.in'),
            'numeric'=>trans('posts.numeric'),
        ];
    }
}
