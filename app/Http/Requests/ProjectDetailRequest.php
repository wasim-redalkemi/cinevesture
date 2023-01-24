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
            'gener' => 'required' ,
            'gener.*' => 'required|exists:master_project_genres,id' ,   
            // 'duration' => 'nullable|integer', 
            'total_budget' => 'required|integer|max:'.config('constants.MAX_TOTAL_BUDGET').'|min:1',
            // 'total_budget' => 'required|integer',
            'financing_secured' => 'required|integer|lt:total_budget|max:'.config('constants.MAX_TOTAL_BUDGET').'|min:1',
           
        ];
    }
    public function messages()
    {
        return [
           'duration.integer' => 'Duration should be less then 60000 min.',
           'total_budget.integer' => 'Total Budget should be less then $1000000000.',
           'financing_secured.integer' => 'Financing Secured Budget should be less then $1000000000.',
           'financing_secured.lt:total_budget' => 'Financing Secured Budget should be less then Total Budget.',
            //
        ];            
    }
}
