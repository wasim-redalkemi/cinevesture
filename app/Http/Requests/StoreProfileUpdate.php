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
            'profile_image' => 'mimes:jpeg,jpg,png|nullable|max:100000',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'job_title' => 'nullable|max:100',
            'age' => 'nullable|int',
            'gender' => 'nullable|string',
            'gender_pronouns' => 'nullable|string',
            'located_in' => 'nullable|string',
            'about' => 'nullable|string|max:500',
            'available_to_work_in' => 'nullable|string',
            'languages.*'=>'nullable|exists:master_languages,id',
            'skills.*'=>'nullable|exists:master_skills,id',
            'imdb_profile' => 'nullable|url',
            'linkedin_profile' => 'nullable|url',
            'website' => 'nullable|url',
            'intro_video_link'=>'nullable|url'
        ];
    }
    public function messages()
    {
        return [
            'profile_image.max' => 'Image must be 4mb',
        ];
    }
}
