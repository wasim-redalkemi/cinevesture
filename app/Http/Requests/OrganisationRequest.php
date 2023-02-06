<?php

namespace App\Http\Requests;

use App\Models\UserOrganisation;
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
    $UserOrganisation=UserOrganisation::query()->where('user_id',auth()->user()->id)->first();
    if (!empty($UserOrganisation->logo)) {
        return [
            // 'logo' => 'required|mimes:jpeg,jpg,png|nullable|max:40000',
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
    }else{
        return [
            
            'logo' => 'required|mimes:jpeg,jpg,png|nullable|max:40000',
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
    }
    public function messages()
    {
        return [
            "logo.required" => "This field is required",
            "name.required" => "This field is required",
            "organisation_type.required" => "This field is required",
            "service_id.required" => "This field is required",
            "language_id.required" => "This field is required",
            "located_in.required" => "This field is required",
            "available_to_work_in.required" => "This field is required",
            
        ];            
    }
}
