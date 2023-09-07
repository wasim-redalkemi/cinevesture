<?php

namespace App\Http\Requests;

use App\Http\Controllers\Helper\AppUtilityController;
use App\Http\Controllers\Traits\Utils;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateJobRequest extends FormRequest
{

    use Utils;
    
    protected function failedValidation(Validator $validator)
    {        
        throw new HttpResponseException($this->jsonResponse(false,$validator->errors(),[]));
    }


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
            'save_type'=>'required',
            'job_title' => 'required|max:100',                    
            'employments.*' => 'required',                    
            'workspaces.*' => 'required',
            'company_name' => 'required',
            'description' => 'required|max:5500',                     
            'skills.*' => 'required'
        ];
    }

    public function messages()
    {
        return [
            // 'countries.required'=>"The location field is required."
        ]; 

    }
}
