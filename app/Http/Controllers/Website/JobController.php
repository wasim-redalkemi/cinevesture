<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
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

class JobController extends WebController
{
    // Views
    public function __construct()
    {
        $this->return_response = ['error_msg'=>'','success_msg'=>''];
    }
     
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
        if(!isset($_REQUEST['job_id']))
        {
            return view('website.job.post_a_job',compact(['countries','skills','emplyements','workspaces']));

        }
        $userJob = UserJob::query()->find($_REQUEST['job_id'])->first();
        

        return view('website.job.post_a_job',compact(['countries','skills','emplyements','workspaces','userJob']));
    }
    
    public function validatejob()
    {
        try {
            if(!empty($_REQUEST['job_id']))
            {
                $jobEditResponse = $this->jobStoreEdit();
                if($jobEditResponse['status'] ==0)
                {
                    return ['status'=>0,'msg'=>$jobEditResponse['msg']];
                }
                else
                {
                    return ['status'=>1,'msg'=>$jobEditResponse['msg']];
                }
            }
            else 
            {
                $jobCreateResponse = $this->store($_REQUEST['job_id']);
                if($jobCreateResponse['status'] ==0)
                {
                    return ['status'=>0,'msg'=>$jobCreateResponse['msg']];
                }
                else
                {
                    return ['status'=>1,'msg'=>$jobCreateResponse['msg']];
                }
            }
        } catch (Exception $e) {
            return ['status'=>0,'msg'=>$e->getMessage()];
        }
    }

    // functions

    public function store()
    {
        try{
            $request = (object) $_REQUEST;
    
            // $validator = Validator::make($request->all(), [
            //         'save_type'=>'required',
            //         'job_title' => 'required',
            //         'emplyements' => 'required',
            //         'emplyements.*' => 'required',
            //         'workspaces'=>'required',
            //         'workspaces.*' => 'required',
            //         'company_name' => 'required',
            //         'countries' => 'required',
            //         'description' => 'required',
            //         'skills' => 'required',   
            //         'skills.*' => 'required',    
            // ],['countries.required'=>"The location field is required."]);
            
            // if ($validator->fails()) {
            //     return ['status'=>0,'msg'=>$validator->errors()->first()];
            // }

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

    public function jobStoreEdit()
    {
        try {
            $request = (object) $_REQUEST;
            $id = $request->job_id;

            $job = UserJob::query()->where('id',$id)->first();
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
            $job->update();
 
            // workspace
            $work_spaces_all = JobWorkSpace::query()->where('job_id',$id)->delete();
            foreach($request->workspaces as $work){
                $link_workspace = new JobWorkSpace();
                $link_workspace->job_id = $id;
                $link_workspace->workspace_id = $work;
                $link_workspace->save();                 
            }

            // emplyements
            $emplyements_all = JobEmployement::query()->where('job_id',$id)->delete();
            foreach($request->emplyements as $emp){
                $link_emplyement = new JobEmployement();
                $link_emplyement->job_id = $id;
                $link_emplyement->employment_id = $emp;
                $link_emplyement->save();                  
            }

            // skills
            $skills_all = JobSkill::query()->where('job_id',$id)->delete();
            foreach($request->skills as $skill){
                $link_skill = new JobSkill();
                $link_skill->job_id = $job->id;
                $link_skill->skill_id = $skill;
                $link_skill->save();
                 
            }
            return ['status'=>1,'msg'=>"A draft of your job was succefuly updated"];           
            
        } catch (Exception $e) {
            return ['status'=>0,'msg'=>$e->getMessage()];
        }
    }

    public function applyPromotion(Request $request)
    {
        
    }

    public function postedJob(Request $request)
    {
        try{
            if (!empty($_REQUEST['id']) && $_REQUEST['status']) {
                $userJob = $this->getUserJobData($_REQUEST['id'],$_REQUEST['status']);

            } else {
                $userJob = $this->getUserJobData(auth()->user()->id);
            }
    
            return view('website.job.posted_job',compact(['userJob']));
     

        }catch(Exception $e){
            return ['status'=>0,'msg'=>$e->getMessage()];
        }
    }   
    

    public function savedJob(Request $request)
    {
        try{
            return view('website.job.saved_job');


        }catch(Exception $e){
            return ['status'=>0,'msg'=>$e->getMessage()];
        }
    }

    public function appliedJob(Request $request)
    {
        try{
            return view('website.job.applied_job');


        }catch(Exception $e){
            return ['status'=>0,'msg'=>$e->getMessage()];
        }
    }

    public function getUserJobData($user_id,$status='')
    {
        try{
            $userJob='';
            $userJob = UserJob::query()
            ->with(['jobSkills','jobWorkSpaces','jobEmployements','jobLocation'])
            ->where('user_id',$user_id)
            ->where(function($q)use($status)
            {
                if(!empty($status))
                {
                    $q->where('save_type', $status);
                }
            })
            ->paginate(5);
            return $userJob;
        }catch(Exception $e){
            return back()->withErrors($e->getmessage());
        }
    }

    public function getJobData($job_id)
    {
        try{
            $JobData='';
            $JobData = UserJob::query()
            ->with(['jobSkills','jobWorkSpaces','jobEmployements','jobLocation'])
            ->where('id',$job_id)
            ->first();
            return $JobData;
        }catch(Exception $e){
            return back()->withErrors($e->getmessage());
        }
    }

    public function postedJobView(Request $request)
    {
        try{
            if (!empty($request->job_id)) {
                $Job_data = $this->getJobData($request->job_id);

            } else {
                return back()->with('Something went wrong');
            }    
            return view('website.job.job_post_single',compact(['Job_data']));
        }catch(Exception $e){
            return back()->withErrors($e->getmessage());
        }
    }



}
