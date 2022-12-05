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
            'category_id' => 'nullable', 
            'category_id' => 'nullable|exists:master_project_categories,id',  
            'gener' => 'required' ,
            'gener' => 'required|exists:master_project_genres,id' ,   
            'duration' => 'nullable', 
            'total_budget' => 'required',
            'financing_secured' => 'required',
            'project_associate_title' => 'nullable',
            'project_associate_name' => 'nullable'    
            
        ];
    }
}
