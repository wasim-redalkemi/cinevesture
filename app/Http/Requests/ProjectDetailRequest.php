<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectDetailRequest extends FormRequest
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
            'category_id' => 'required', 
            'category_id.*' => 'required|exists:master_project_categories,id',  
            'gener' => 'required' ,
            'gener.*' => 'required|exists:master_project_genres,id' ,   
            'duration' => 'nullable|integer', 
            'total_budget' => 'required|integer',
            'financing_secured' => 'required|integer',
           
        ];
    }
    
}
