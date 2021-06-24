<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoAlbumsRequest extends FormRequest
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
        if($this->language =='ar'){
            return [
                'language'=>'required|in:ar,en,ar_en',
                'title_ar'=>'required',
                'main_photo'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }elseif ($this->language =='en'){
            return [
                'language'=>'required|in:ar,en,ar_en',
                'title_en'=>'required',
                'main_photo'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }elseif ($this->language =='ar_en'){
            return [
                'language'=>'required|in:ar,en,ar_en',
                'title_ar'=>'required',
                'title_en'=>'required',
                'main_photo'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }

    }
    public function messages()
    {
        return [
            'required'=>trans('photoAlbums.required'),
            'in'=>trans('photoAlbums.in'),
            'image'=>trans('photoAlbums.image'),
            'mimes'=>trans('photoAlbums.mimes'),
            'max'=>trans('photoAlbums.image_max'),
            'photo.required' => trans('photoAlbums.photo_required'),
        ];
    }
}
