<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title_en'=>'required|string|max:100',
            'title_ar'=>'required|string|max:100',
            'desc_en'=>'required|string',
            'desc_ar'=>'required|string',
            'img' =>'required|image|mimes:jpg,bmp,png',
            'categories_ids' => 'required',
            'categories_ids.*' => 'exists:categories,id',
        ];
    }
    public function messages(){
        return [
            'title_en.required' => __('siteValid.title required'),
            'title_en.string' => __('siteValid.title string'),
            'title_en.max' => __('siteValid.title max'),
            'title_ar.required' => __('siteValid.title required'),
            'title_ar.string' => __('siteValid.title string'),
            'title_ar.max' => __('siteValid.title max'),
            'desc_en.required' => __('siteValid.desc required'),
            'desc_en.string' => __('siteValid.desc string'),
            'desc_ar.required' => __('siteValid.desc required'),
            'desc_ar.string' => __('siteValid.desc string'),
            'img.required' => __('siteValid.img required'),
            'img.image' => __('siteValid.img image'),
            'categories_ids.required' => __('siteValid.categories ids'),

        ];
    }
}
