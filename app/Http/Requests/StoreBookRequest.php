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
            'title'=>'required|string|max:100',
            'desc'=>'required|string',
            'img' =>'required|image|mimes:jpg,bmp,png',
            'categories_ids' => 'required',
            'categories_ids.*' => 'exists:categories,id',
        ];
    }
    public function messages(){
        return [
            'title.required' => __('site.title required'),
            'title.string' => __('site.title string'),
            'title.max' => __('site.title max'),
            'desc.required' => __('site.desc required'),
            'desc.string' => __('site.desc string'),
            'img.required' => __('site.img required'),
            'img.image' => __('site.img image'),
            'categories_ids.required' => __('site.categories ids'),

        ];
    }
}
