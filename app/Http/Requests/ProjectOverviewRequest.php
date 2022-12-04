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
            'project_name' => 'nullable|',            
            'location' => 'nullable|',            
        ];
    }
    public function messages()
    {
        return [
            'project_name.max' => 'Project name allow max 5 character.',
        ];            
    }
}
