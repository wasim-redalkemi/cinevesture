<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectOverviewRequest extends FormRequest
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
            'project_name' => 'required',  
            'project_type_id'=> 'required' ,         
            'listing_project_as'=> 'required' , 
            'countries'=> 'required' , 
            'countries.*' => 'required|exists:master_countries,id',
            'languages'=> 'required' , 
            'languages.*' => 'required|exists:master_languages,id',
            'location'=> 'nullable'               
        ];
    }
    
}
