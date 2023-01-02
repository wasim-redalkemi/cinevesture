<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUserPortfolioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'project_title' => 'required',
            'description' => 'required|max:600',
            'completion_date' => 'required',
            'video_url' => 'required|url',
            'project_specific_skills_id'=> 'required', 
            'project_specific_skills_id.*' => 'required|exists:master_skills,id',
            'project_country_id'=> 'required', 
            'project_country_id.*' => 'required|exists:master_countries,id',
        ];
    }
    public function messages()
    {
        return [
            //
        ];            
    }
}
