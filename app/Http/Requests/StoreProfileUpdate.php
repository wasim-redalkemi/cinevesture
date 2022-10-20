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
            'job_title' => 'nullable|max:255',
            'age' => 'nullable|int',
            'gender' => 'nullable|string',
            'gender_pronouns' => 'nullable|string',
            'located_in' => 'nullable|string',
            'about' => 'nullable|string|max:1000',
            'available_to_work_in' => 'nullable|string',
            'languages.*' => 'nullable',
            'skills.*' => 'nullable',
            'imdb_profile' => 'nullable|url',
            'linkedin_profile' => 'nullable|url',
            'website' => 'nullable|url',
            'intro_video_link'=>'nullable|url'
        ];
    }
    public function messages()
    {
        return [
         
        ];
    }
}
