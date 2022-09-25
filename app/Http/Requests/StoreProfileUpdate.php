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
            'profile_image' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'job_title' => 'required|unique:posts|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'gender_pronouns' => 'required|string',
            'located_in' => 'required|string',
            'about' => 'required|string',
            'available_to_work_in' => 'required|string',
            'language' => 'required|string',
            'skills' => 'required|string',
            'imdb_profile' => 'required|string',
            'linkedin_profile' => 'required|string',
            'website' => 'required|email|string',
        ];
    }
    public function messages()
    {
        return [
            'profile_image' => 'Profile image must.',
        ];
            
    }
}
