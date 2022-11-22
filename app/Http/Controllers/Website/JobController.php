<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\JobEmployement;
use App\Models\JobSkill;
use App\Models\JobWorkSpace;
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
                    'emplyements' => 'required',
                    'emplyements.*' => 'required',
                    'workspaces'=>'required',
                    'workspaces.*' => 'required',
                    'company_name' => 'required',
                    'countries' => 'required',
                    'description' => 'required',
                    'skills' => 'required',   
                    'skills.*' => 'required',    
            ],['countries.required'=>"The location field is required."]);
            
            if ($validator->fails()) {
                return ['status'=>0,'msg'=>$validator->errors()->first()];
            }

            $job = new UserJob();
            $job->user_id = auth()->user()->id;
            $job->title = $request->job_title;
            $job->company_name = $request->company_name;
            $job->description = $request->description;
            if($request->save_type == 'publish'){
                $job->save_type = "published";
            }else{
                $job->save_type = "draft";
            }
            $job->location_id = $request->countries;
            $job->save();
 
            // workspace
            $work_spaces_all = Workspace::all()->pluck('id')->toArray();
            foreach($request->workspaces as $work){
                if(in_array($work,$work_spaces_all)){
                    $link_workspace = new JobWorkSpace();
                    $link_workspace->job_id = $job->id;
                    $link_workspace->workspace_id = $work;
                    $link_workspace->save();
                }  
            }

            // emplyements
            $emplyements_all = MasterEmployement::all()->pluck('id')->toArray();
            foreach($request->emplyements as $emp){
                if(in_array($emp,$emplyements_all)){
                    $link_emplyement = new JobEmployement();
                    $link_emplyement->job_id = $job->id;
                    $link_emplyement->employment_id = $emp;
                    $link_emplyement->save();
                }  
            }

            // skills
            $skills_all = MasterSkill::all()->pluck('id')->toArray();
            foreach($request->skills as $skill){
                if(in_array($skill,$skills_all)){
                    $link_skill = new JobSkill();
                    $link_skill->job_id = $job->id;
                    $link_skill->skill_id = $skill;
                    $link_skill->save();
                }  
            }
            return ['status'=>1,'msg'=>"A draft of your job was succefuly saved"];


        }catch(Exception $e){
            return ['status'=>0,'msg'=>$e->getMessage()];
        }
    }

    public function applyPromotion(Request $request)
    {
        
    }



}
