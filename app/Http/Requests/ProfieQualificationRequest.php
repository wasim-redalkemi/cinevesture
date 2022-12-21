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
            'start_year' => 'required|max:50',
            'end_year' => 'required|after_or_equal:start_year',
            'description' => 'required|max:600',
        ];
    }
}
