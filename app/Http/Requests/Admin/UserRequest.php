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
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:50',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|max:40',
            'email' => 'required|max:50|unique:users',
            'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'confirmed' => 'required_with:password|same:password|required|min:6',
            
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "First name is required",
            "first_name.regex" => "Please enter valid first name",
            "last_name.required" => "Last name is required",
            "last_name.regex" => "Please enter valid last name",
            "email.required" => "Email is required",
            "email.email" => "please enter correct email address",
            // "email.exists" => "This email address is already exist",
            "password.required" => "Password is required",
            "password.min" => "Please enter min. 8 charactor",
            "password.confirmed" => "Password and confirm password dose not match",
            "password.regex" => "Use 8 or more characters with a mix of letters, numbers & symbols.",
        ];            
    }
    
}
