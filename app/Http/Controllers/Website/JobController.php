<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MasterCountry;
use App\Models\MasterEmployement;
use App\Models\MasterSkill;
use App\Models\UserJob;
use App\Models\Workspace;
use Database\Seeders\MasterWorkspaceSeeder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    // Views
     
    public function index()
    {   
        $countries = MasterCountry::all();
        $skills = MasterSkill::all();
        $emplyements = MasterEmployement::all();

        return view('website.job.index',compact('countries','skills','emplyements'));
    }

    public function create()
    {
        $countries = MasterCountry::all();
        $skills = MasterSkill::all();
        $workspaces = Workspace::all();
        $emplyements = MasterEmployement::all();

        return view('website.job.post_a_job',compact(['countries','skills','emplyements','workspaces']));
    }


    // functions

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                    'save_type'=>'required',
                    'job_title' => 'required',
                    'emplyements.*' => 'required',
                    'workspaces.*' => 'required',
                    'comapny_name' => 'required',
                    'countries.*' => 'required',
                    'description' => 'required',
                    'skills.*' => 'required',    
            ]);
            
            if ($validator->fails()) {
                return back()->withErrors($validator->errors()->messages())->withInput();
            }

            $job = new UserJob();
            $job

        }catch(Exception $e){
            
        }
    }



}
