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
            'portfolio_title' => 'required',
            'description' => 'required|max:3500',
            'completion_date' => 'required',
            'video_url' => 'required|url',
            'project_specific_skills_id'=> 'required', 
            'project_specific_skills_id.*' => 'required|exists:master_skills,id',
            'project_country_id'=> 'required', 
            'project_country_id.*' => 'required|exists:master_countries,id',
            'portfolio_images_count' => 'required|numeric|min:1'

        ];
    }
    public function messages()
    {
        return [
            'portfolio_images_count.required' => 'This field is required.',
            'portfolio_images_count.min' => 'Please upload at least one portfolio image.',
            'portfolio_title.required' => 'This field is required.',
            'description.required' => 'This field is required.',
            'completion_datevideo_url.required' => 'This field is required.',
            'project_specific_skills_id.required' => 'This field is required.',
            'project_country_id.required' => 'This field is required.'            
        ];            
    }
}
