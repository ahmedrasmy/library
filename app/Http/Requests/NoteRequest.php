<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
            'content_en'=>'required|string',
            'content_ar'=>'required|string',
        ];
    }
    public function messages()
    {
        return [
            'content_en.required' => __('siteValid.content required'),
            'content_en.string' => __('siteValid.content string'),
            'content_ar.required' => __('siteValid.content required'),
            'content_ar.string' => __('siteValid.content string'),

        ];
    }
}
