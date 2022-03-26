<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'  => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password'  => 'required|string|max:50|min:5'
        ];
    }

    public function messages()
    {
        return[
            'name.required'     =>  __('site.name required'),
            'name.string'       =>  __('site.name string'),
            'name.max'          =>  __('site.name max'),
            'email.required'    =>  __('site.email required'),
            'email.string'      =>  __('site.email type'),
            'email.max'         =>  __('site.email max'),
            'password.required' =>  __('site.password required'),
            'password.string'   =>  __('site.password string'),
            'password.max'      =>  __('site.password max'),
            'password.min'      =>  __('site.password min'),
            
        ];
        
    }
}
