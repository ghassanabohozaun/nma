<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
                'language'=>'required|in:ar,en,ar_en',
                'question_ar'=>'required',
                'answer_ar'=>'required',
            ];
        } elseif ($this->input('language') == 'en') {
            return [
                'language'=>'required|in:ar,en,ar_en',
                'question_en'=>'required',
                'answer_en'=>'required',
            ];
        } elseif ($this->input('language') == 'ar_en') {
            return [
                'language'=>'required|in:ar,en,ar_en',
                'question_ar'=>'required',
                'question_en'=>'required',
                'answer_ar'=>'required',
                'answer_en'=>'required',
            ];
        }

    }

    public function messages()
    {
        return [
            'required'=>trans('faqs.required'),
            'in'=>trans('faqs.in'),

        ];
    }
}
