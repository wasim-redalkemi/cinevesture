<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyNowRequest extends FormRequest
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
            'resume' => 'required',
            'cover_letter' => 'required',
           
        ];
       
    }
    public function messages()
    {
        return [
            'resume.required'=>'This filed is required'
            
        ];            
    }
}
