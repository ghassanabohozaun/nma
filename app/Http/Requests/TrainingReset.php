<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingReset extends FormRequest
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
            'started_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('trainings.required')
        ];
    }
}
