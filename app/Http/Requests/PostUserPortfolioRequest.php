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
            'project_title' => 'nullable|max:255',
            'description' => 'nullable|max:350',
            'project_country_id' => 'nullable|integer',
            'completion_date' => 'nullable',
            'video' => 'nullable|url',
        ];
    }
    public function messages()
    {
        return [
            'description.max' => 'Description maximum 350 character',
        ];            
    }
}
