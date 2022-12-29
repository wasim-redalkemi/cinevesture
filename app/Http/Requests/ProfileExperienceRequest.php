<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileExperienceRequest extends FormRequest
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
            'job_title' => 'required|max:100',
            'company' => 'required|max:100',
            'country_id' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
            'employement_type_id' => 'required',
            'employement_type_id.*' => 'required|exists:employements,id',
            'description' => 'required|max:600',
        ];
    }
    public function messages()
    {
        return [
           'country_id.required' => 'The location field is required.'
        ];            
    }
}
