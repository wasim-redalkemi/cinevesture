<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfieQualificationRequest extends FormRequest
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
            'institue_name' => 'required|max:100',
            'degree_name' => 'required',
            'field_of_study' => 'required|max:50',
            'start_year' => 'required|date_format:Y|before_or_equal:end_year',
            'end_year' => 'required|date_format:Y|after_or_equal:start_year',
            'description' => 'required|max:600',
        ];
    }
    public function messages()
    {
        return [
           'start_year.before_or_equal' => 'The start year must be before or equal to end year.',
           'end_year.after_or_equal' => 'The end year must be after or equal to start year.',
        ];            
    }
}
