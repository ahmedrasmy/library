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
            'name.required'     =>  __('siteValid.name required'),
            'name.string'       =>  __('siteValid.name string'),
            'name.max'          =>  __('siteValid.name max'),
            'email.required'    =>  __('siteValid.email required'),
            'email.string'      =>  __('siteValid.email type'),
            'email.max'         =>  __('siteValid.email max'),
            'password.required' =>  __('siteValid.password required'),
            'password.string'   =>  __('siteValid.password string'),
            'password.max'      =>  __('siteValid.password max'),
            'password.min'      =>  __('siteValid.password min'),
            
        ];
        
    }
}
