<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectMilestoneRequest extends FormRequest
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

            'project_stage_id'=>'required',
            'loking_for'=>'required',
            'loking_for.*'=>'required|exists:master_looking_fors,id',
            'stage_of_funding_id'=>'nullable',
            'crowdfund_link' => 'nullable|url',
           
        ];
    }
}
