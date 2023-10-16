<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectDetailRequest extends FormRequest
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
            'duration' => 'nullable|integer|max:'.config('constants.MAX_PROJECT_DURATION_IN_MIN').'|min:1',
            'category_id' => 'nullable|exists:master_project_categories,id',  
            // 'gener' => '' ,
            'primary_gener_id' => 'required',
            'gener.*' => 'required|exists:master_project_genres,id' ,   
            // 'duration' => 'nullable|integer', 
            'total_budget' => 'nullable|integer|max:'.config('constants.MAX_TOTAL_BUDGET').'',
            // 'total_budget' => 'required|integer',
            
            
            'financing_secured' => 'nullable|integer|max:'.config('constants.MAX_TOTAL_BUDGET').'', 
           
        ];
    }
    public function messages()
    {
        return [
           'duration.integer' => 'Duration should be less then 60000 min.',
           'total_budget.integer' => 'Total Budget should be less then $1000000000.',
        //    'financing_secured.integer' => 'Financing Secured Budget should be less then $1000000000.',
           'financing_secured.lt:total_budget' => 'Financing Secured Budget should be less then Total Budget.',
            //
        ];            
    }
}
