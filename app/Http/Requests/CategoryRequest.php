<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_en'=>'required|string|max:100',
            'name_ar'=>'required|string|max:100',
        ];
    }

    public function messages()
    {
        return[
            'name_en.required' =>  __('siteValid.name required'),
            'name_en.string'   =>  __('siteValid.name string'),
            'name_en.max'      =>  __('siteValid.name max'),
            'name_ar.required' =>  __('siteValid.name required'),
            'name_ar.string'   =>  __('siteValid.name string'),
            'name_ar.max'      =>  __('siteValid.name max'),
        ];
    }
}
