<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectDescriptionRequest extends FormRequest
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
            'logline' => 'required|max:280' ,
            'synopsis' => 'required|max:600' ,   
            'director_statement' => 'required|max:600', 
        ];
    }
    public function messages()
    {
        return [
            'logline.max' => 'Maximum 280 character are allowed',
            'synopsis.max' => 'Maximum 600 character are allowed',
            'director_statement.max' => 'Maximum 600 character are allowed',
        ];            
    }
}
