<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Traits\Utils;
use App\Http\Controllers\WebController;
use App\Models\JobEmployement;
use App\Models\JobSkill;
use App\Models\JobWorkSpace;
use App\Models\MasterCountry;
use App\Models\MasterEmployement;
use App\Models\MasterProjectCategory;
use App\Models\MasterProjectGenre;
use App\Models\MasterSkill;
use App\Models\User;
use App\Models\UserAppliedJob;
use App\Models\UserFavoriteJob;
use App\Models\UserFavouriteProfile;
use App\Models\UserJob;
use App\Models\UserPortfolio;
use App\Models\Workspace;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class JobController extends WebController
{
    use Utils;
    // Views
    public function __construct()
    {
        $this->return_response = ['error_msg'=>'','success_msg'=>''];
    }
     
    public function index()
    {   
        $countries = MasterCountry::all();
        $skills = MasterSkill::all();
        $employments = MasterEmployement::all();

        return view('website.job.index',compact('countries','skills','employments'));
    }

    public function create()
    {
        $countries = MasterCountry::all();
        $skills = MasterSkill::all();
        $workspaces = Workspace::all();
        $employments = MasterEmployement::all();
        if(!isset($_REQUEST['job_id']))
        {
            return view('website.job.post_a_job',compact(['countries','skills','employments','workspaces']));
        }
        $userJobData = $this->getJobData($_REQUEST['job_id']);
        $userJobData = $userJobData->toArray();
    
        $temp_employements = [];
        if (!empty($userJobData['job_employements'])) {
            foreach ($userJobData['job_employements'] as $k => $v){
                array_push($temp_employements, $v['id']);
            }
            $userJobData['job_employements'] = $temp_employements;
        }

        $temp_workspaces = [];
        if (!empty($userJobData['job_work_spaces'])) {
            foreach ($userJobData['job_work_spaces'] as $k => $v){
                array_push($temp_workspaces, $v['id']);
            }
            $userJobData['job_work_spaces'] = $temp_workspaces;
        }

        $temp_skills = [];
        if (!empty($userJobData['job_skills'])) {
            foreach ($userJobData['job_skills'] as $k => $v){
                array_push($temp_skills, $v['id']);
            }
            $userJobData['job_skills'] = $temp_skills;
        }           

        return view('website.job.post_a_job',compact(['countries','skills','employments','workspaces','userJobData']));
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
            //         'employments' => 'required',
            //         'employments.*' => 'required',
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

            // employments
            $emplyements_all = MasterEmployement::all()->pluck('id')->toArray();
            foreach($request->employments as $emp){
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

            // employments
            $emplyements_all = JobEmployement::query()->where('job_id',$id)->delete();
            foreach($request->employments as $emp){
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
            $status = isset($_REQUEST['status'])?$_REQUEST['status']:'published';
            $userJob = $this->getUserJobData(auth()->user()->id,$status);
            return view('website.job.posted_job',compact(['userJob','status']));    

        }catch(Exception $e){
            return ['status'=>0,'msg'=>$e->getMessage()];
        }
    }   
    

    public function savedJob(Request $request)
    {
        $jobs = UserJob::query()
        ->has("favorite")
        ->with(["jobLocation:id,name","jobSkills:id,name","favorite","applied"])               
        ->paginate($this->records_limit);
        $notFoundMessage = "You haven't saved any job.";
        return view('website.job.saved_job',compact('jobs','notFoundMessage'));
    }

    public function showJobApplicants($jobId)
    {
        $applicants = User::query()
        ->with(["skill","organization.country"])
                    ->whereHas('appliedJobs', function ($query) use($jobId){
                        $query->where('job_id',$jobId);
                    })
                    ->paginate($this->records_limit);
        

        $jobTitle = UserJob::query()->where("id",$jobId)->value('title');
        return view('website.job.applicants',compact('applicants','jobTitle','jobId'));
    }

    public function showAppliedJobCoverLetter($jobId,$userId)
    {
        $applicant = User::query()->find($userId);
        $coverLetter = UserAppliedJob::query()->where("user_id",$userId)->where("job_id",$jobId)->first();
        $portfolios = UserPortfolio::query()
        ->with('getPortfolio')
        ->where('user_id', $userId)
        ->get();   

        $jobTitle = UserJob::query()->where("id",$jobId)->value('title');

        $isLiked = UserFavouriteProfile::query()->where("user_id",auth()->id())->where("profile_id",$userId)->exists();

        return view('website.job.cover_letter',compact('jobTitle','applicant','coverLetter','portfolios','isLiked'));
    }

    public function appliedJob(Request $request)
    {
        $jobs = UserJob::query()
        ->has("applied")
        ->with(["jobLocation:id,name","jobSkills:id,name","favorite","applied"])               
        ->paginate($this->records_limit);   
        $showApplied = false;   
        $notFoundMessage = "You haven't applied to any job, please add.";
        return view('website.job.applied_job',compact('jobs','showApplied','notFoundMessage'));
    }

    public function showApplyJob($jobId)
    {
        $jobTitle = UserJob::query()->where("id",$jobId)->value('title');
        return view('website.job.apply_now',compact('jobTitle'));
    }
    public function storeApplyJob(Request $request,$jobId)
    {       
        $request->validate(["resume"=>"required|file|mimes:pdf,doc,docx","cover_letter"=>"required"]);        
        if (UserAppliedJob::query()->where("user_id",auth()->id())->where("job_id",$jobId)->exists()) {
        //    throw ValidationException::withMessages([
        //     'field_name_1' => ['You have been already applied for this job.']            
        //    ]);
        return   $this->jsonResponse(false,"You have been already applied for this job.",[]);
        }else{
            $modelObj = new UserAppliedJob();
            $modelObj->user_id = auth()->id();
            $modelObj->job_id = $jobId;
            $path = $this->uploadFile("appliedJobResumes",$request->file('resume'));
            $modelObj->resume = $path;
            $modelObj->cover_letter = $request->get('cover_letter');
            $modelObj->save(); 
          return  $this->jsonResponse(true,"You have successfully applied for this job.",[]);
           // return redirect()->route('showJobSearchResults')->with("success","Job application submitted successfully.");
        }
    }


    public function storeJobToFavList(Request $request)
    {
       try {
        $jobId = $request->get("job_id");
        $userId = auth()->id();
        $favStatus = 0;
        if (UserFavoriteJob::query()->where("user_id",$userId)->where("job_id",$jobId)->exists()) {
            // remove from the fav list
            UserFavoriteJob::query()->where("user_id",$userId)->where("job_id",$jobId)->delete();
            $message = "Job removed from the favorite list.";
        }else{
            // add to fav list
            $modelObj = new UserFavoriteJob();
            $modelObj->user_id = $userId;
            $modelObj->job_id = $jobId;
            $modelObj->save();
            $message = "Job added to the favorite list.";
            $favStatus = 1;
        }
        return $this->jsonResponse(true,$message,$favStatus);
       } catch (\Throwable $th) {
        return $this->jsonResponse(false,$th->getMessage(),[]);
       }
    }

    public function showJobSearchResults(Request $request){   
        $requests = $request->all();
        $employments = MasterEmployement::query()->get();        
        $countries = MasterCountry::query()->get();        
        $categories = MasterProjectCategory::query()->get();
        $workspaces = Workspace::query()->get();
        $skills = MasterSkill::query()->get();
        $jobs = UserJob::query()
        ->with(["jobLocation:id,name","jobSkills:id,name","favorite","applied"])
        ->where(function($q) use($requests){
            if (isset($requests["countries"]) && !empty($requests["countries"])) {
                $q->whereIn("location_id",$requests["countries"]);
            }
            if (isset($requests["search"]) && !empty($requests["search"])) {
                $search = $requests["search"];
                $q->where("title",'like',"%$search%");
            }
        })        
        ->whereHas("jobEmployements",function($q)use($requests){
            if (isset($requests["employments"]) && !empty($requests["employments"])) {                
                $q->whereIn("employment_id",$requests["employments"]);
            }
        })
        ->whereHas("jobWorkSpaces",function($q)use($requests){
            if (isset($requests["workspaces"]) && !empty($requests["workspaces"])) {                
                $q->whereIn("workspace_id",$requests["workspaces"]);
            }
            
        })        
        ->whereHas("jobSkills",function($q)use($requests){
            if (isset($requests["skills"]) && !empty($requests["skills"])) {                                
                $q->whereIn("skill_id",$requests["skills"]);
            }
        })        
        ->paginate($this->records_limit);
        $notFoundMessage = "No jobs found, please modify your search.";
        return view('website.job.search_result',compact('countries','employments','skills','categories','workspaces','jobs','notFoundMessage'));
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
            return back()->with($e->getmessage());
        }
    }

    public function getJobData($job_id)
    {
        try{            
            $JobData = UserJob::query()
            ->with(['jobSkills','jobWorkSpaces','jobEmployements','jobLocation'])
            ->find($job_id);
            return $JobData;
        }catch(Exception $e){
            return back()->with($e->getmessage());
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
            return back()->with($e->getmessage());
        }
    }



}
