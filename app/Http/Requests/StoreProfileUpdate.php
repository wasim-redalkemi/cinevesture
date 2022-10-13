<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileUpdate extends FormRequest
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
            'profile_image' => 'nullable',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'job_title' => 'max:255',
            'age' => 'integer',
            'gender' => 'string',
            'gender_pronouns' => 'string',
            'located_in' => 'string',
            'about' => 'string',
            'available_to_work_in' => 'string',
            'languages.*' => 'nullable',
            'skills.*' => 'nullable',
            'imdb_profile' => 'string',
            'linkedin_profile' => 'string',
            'website' => 'string',
        ];
    }
    public function messages()
    {
        return [
         
        ];
    }
}
