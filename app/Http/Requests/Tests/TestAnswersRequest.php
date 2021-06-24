<?php

namespace App\Http\Requests\Tests;

use Illuminate\Foundation\Http\FormRequest;

class TestAnswersRequest extends FormRequest
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
            'answer_text.*'=>'required',
            'answer_value.*'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'answer_text.*.required'=>trans('tests.answer_text_required'),
            'answer_value.*.required'=>trans('tests.answer_value_required'),
            'answer_value.*.numeric'=>trans('tests.answer_value_numeric'),
        ];
    }
}
