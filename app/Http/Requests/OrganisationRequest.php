<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganisationRequest extends FormRequest
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
            'logo' => 'required',
            'name' => 'required',
            'organisation_type' => 'required',
            'about' => 'required|max:600',
            'service_id' => 'required',
            'service_id.*' => 'required|exists:master_organisation_services,id',
            'language_id' => 'required',
            'language_id.*' => 'required|exists:master_languages,id',
            'located_in' => 'required',
            'located_in.*' => 'required|exists:master_countries,id',
            'available_to_work_in.*' => 'required',
        ];
    }
    public function messages()
    {
        return [
        ];            
    }
}
