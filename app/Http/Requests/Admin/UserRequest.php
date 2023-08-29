<?php

namespace App\Http\Requests\Admin;

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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            // 'cpassowrd' => 'required|required_with:password|same:password|min:6',
            
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "This field is required",
            "last_name.required" => "This field is required",
            "email.required" => "This field is required",
            "email.email" => "please enter correct email address",
            "password.required" => "This field is required",
            "password.min" => "Please enter min. 6 charactor",
        ];            
    }
    
}
