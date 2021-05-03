<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOffersRequest extends FormRequest
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
            'name_ar'=>'required|max:100|unique:offers,name_ar',
            'name_en'=>'required|max:100|unique:offers,name_en',
            'details_ar'=>'required',
            'details_en'=>'required'
        ];
    }

    public function messages()
    {
        return [
             'name_ar.required'=>__('messages.offer name required'),
             'name_ar.unique'=>__('messages.offer name is already used'),
             'name_in.required'=>__('messages.offer name required'),
             'name_in.unique'=>__('messages.offer name is already used'),
             'details_ar.required' => __('messages.details required'),
             'details_en.required' => __('messages.details required'),
        ];
    }
}
