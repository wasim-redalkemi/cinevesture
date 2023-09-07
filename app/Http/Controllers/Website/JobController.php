<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Traits\Utils;
use App\Http\Controllers\WebController;
use App\Http\Requests\ApplyNowRequest;
use App\Http\Requests\CreateJobRequest;
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
use App\Notifications\AdminPromotionJob;
use App\Notifications\PromotionJob;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class JobController extends WebController
{
    use Utils;
    // Views
    public function __construct()
    {
        $this->return_response = ['error_msg' => '', 'success_msg' => ''];
    }

    public function index()
    {
        $countries = MasterCountry::query()->get();
        $skills = MasterSkill::query()->orderBy('name','ASC')->get();
        $employments = MasterEmployement::query()->orderBy('name','ASC')->get();

        return view('website.job.index', compact('countries', 'skills', 'employments'));
    }

    public function create()
    {
        $countries = MasterCountry::query()->get();
        $skills = MasterSkill::query()->orderBy('name', 'ASC')->get();
        $workspaces = Workspace::query()->orderBy('name', 'ASC')->get();
        $employments = MasterEmployement::query()->orderBy('name', 'ASC')->get();
        if (!isset($_REQUEST['job_id'])) {
            return view('website.job.post_a_job', compact(['countries', 'skills', 'employments', 'workspaces']));
        }
      
        $userJobData = $this->getJobData($_REQUEST['job_id']);
        $userJobData = $userJobData->toArray();

        $temp_employements = [];
        if (!empty($userJobData['job_employements'])) {
            foreach ($userJobData['job_employements'] as $k => $v) {
                array_push($temp_employements, $v['id']);
            }
            $userJobData['job_employements'] = $temp_employements;
        }

        $temp_workspaces = [];
        if (!empty($userJobData['job_work_spaces'])) {
            foreach ($userJobData['job_work_spaces'] as $k => $v) {
                array_push($temp_workspaces, $v['id']);
            }
            $userJobData['job_work_spaces'] = $temp_workspaces;
        }

        $temp_skills = [];
        if (!empty($userJobData['job_skills'])) {
            foreach ($userJobData['job_skills'] as $k => $v) {
                array_push($temp_skills, $v['id']);
            }
            $userJobData['job_skills'] = $temp_skills;
        }

        return view('website.job.post_a_job', compact(['countries', 'skills', 'employments', 'workspaces', 'userJobData']));
    }

    public function validatejob(CreateJobRequest $request)
    {     
                $id  = request('job_id');
        try {
            if (!is_null($id)) {
                $response = $this->jobStoreEdit( $request);
            } else {
                $response = $this->store( $request);
            }
            if ($response['status'] == 0) {
                return $this->jsonResponse(false, $response['msg'], []);
            } else {
                return $this->jsonResponse(true, $response['msg'], ['id'=>$response['id']]);
            }
        } catch (Exception $e) {
            return $this->jsonResponse(false, $e->getMessage(), []);
        }
    }

    public function storeJobMetas($request,$jobId,$isEdit=false)
    {
        if ($isEdit) {             
            JobWorkSpace::query()->where('job_id', $jobId)->delete();                    
            JobEmployement::query()->where('job_id', $jobId)->delete();                    
            JobSkill::query()->where('job_id', $jobId)->delete();
        }      

        // workspace            
        foreach ($request->workspaces as $work) {                
            $link_workspace = new JobWorkSpace();
            $link_workspace->job_id = $jobId;
            $link_workspace->workspace_id = $work;
            $link_workspace->save();            
        }
        // employments            
        foreach ($request->employments as $emp) {            
            $link_emplyement = new JobEmployement();
            $link_emplyement->job_id = $jobId;
            $link_emplyement->employment_id = $emp;
            $link_emplyement->save();                
        }
        // skills            
        foreach ($request->skills as $skill) {                
            $link_skill = new JobSkill();
            $link_skill->job_id = $jobId;
            $link_skill->skill_id = $skill;
            $link_skill->save();                
        }
    }

    public function setJobData(UserJob $jobObj, $request)
    {

        $jobObj->user_id = $this->getCreatedById();
        $jobObj->title = $request->job_title;
        $jobObj->company_name = $request->company_name;
        $jobObj->description = $request->description;
        $jobObj->save_type = (($request->save_type == 'publish' || $request->save_type == 'unpublished') ? 'published' : 'draft');
        $jobObj->location_id = $request->countries;
        $jobObj->save();
        return $jobObj;
    }

    public function store(CreateJobRequest $request)
    {
        try {
            $job = new UserJob();
            $job->user_id = $this->getCreatedById();
            $job = $this->setJobData($job, $request);
            $this->storeJobMetas($request,$job->id,false);
            $message = ($job->save_type == 'published' ? 'Job published successfully.' : 'A draft of your job was successfully saved.');
            return ['status' => 1, 'msg' => $message,'id'=>$job->id];
        } catch (Exception $e) {
            return ['status' => 0, 'msg' => $e->getMessage()];
        }
    }

    public function jobStoreEdit(Request $request)
    {
        try {
            $id = $request->job_id;            
            $job = UserJob::query()->find($id);
            // if( $job->save_type=='unpublished')
            // {
            //     $message = ($job->save_type == 'unpublished' ? 'Unpublished Job can not be draft.' : 'A draft of your job was successfully saved.');
            //     return ['status' => 0, 'msg' => $message];
            // } 
            $job = $this->setJobData($job, $request);
            $this->storeJobMetas($request,$job->id,true);
            // $message = (($job->save_type == 'publish') || ($job->save_type == 'published') ? 'Job published successfully.' : 'A draft of your job was successfully saved.');
            $message = (($job->save_type == 'publish') || ($job->save_type == 'published') ? 'Job published successfully.' : 'Job status updated successfully.');
            return ['status' => 1, 'msg' => $message, 'id'=>$id];
        } catch (Exception $e) {
            return ['status' => 0, 'msg' => $e->getMessage()];
        }
    }

    public function applyPromotion(Request $request)
    {
    }
    public function UnpublishJob(Request $request)
    {
        try {
            if($request->job_id && $request->status)
            {
            $id = $request->job_id;            
            $userJob = UserJob::query()->find($id);
            $userJob->save_type = $request->status;
            $userJob->save();
            $message = ( 'Job status is updated successfully.');
            return redirect()->back()->with("success", $message);
        } else {
            return back()->with('error', 'Something went wrong ,please try again.');
        }
        } catch (Exception $e) {
            return ['status' => 0, 'msg' => $e->getMessage()];
        }

    }

    public function deleteJob(Request $request)
    {
      
        try {
            
            $id = $request->job_id;
            $userJob = UserJob::find( $id );
            $userJob->delete();
            $message = "Job deleted Successfully.";
           return redirect()->back()->with("success", $message);
         
        } 
        catch (Exception $e) {
            return back()->with('error', 'Something went wrong. '.$e->getMessage());
        }
    }

    public function postedJob(Request $request)
    {
        try {
            $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 'published';
            $userJob = $this->getUserJobData($this->getCreatedById(), $status);
            return view('website.job.posted_job', compact(['userJob', 'status']));
          
        } catch (Exception $e) {
            return ['status' => 0, 'msg' => $e->getMessage()];
        }
    }


    public function savedJob(Request $request)
    {
        // $jobs = UserJob::query()
        //     ->has("favorite")
        //     ->with(["jobLocation:id,name", "jobSkills:id,name", "favorite", "applied"])
        //     ->paginate($this->records_limit);

        $jobs = UserFavoriteJob::query()
        ->with(['jobDetails',"jobDetails.jobLocation:id,name", "jobDetails.jobSkills:id,name", "jobDetails.favorite","jobDetails.user","jobDetails.applied"=>function($q){
            $q->where('user_id',auth()->user()->id);
        }])
        ->where('user_id',$this->getCreatedById())
        ->paginate($this->records_limit);
               $notFoundMessage = "You haven't saved any job.";
        return view('website.job.saved_job', compact('jobs', 'notFoundMessage'));
    }

    public function showJobApplicants($jobId)
    {
        $applicants = User::query()
            ->with(["skill", "organization.country", "isfavouriteProfile"=>function($q){
                $q->where('user_id',$this->getCreatedById());
            }])
            ->whereHas('appliedJobs', function ($query) use ($jobId) {
                $query->where('job_id', $jobId);
            })
            ->paginate($this->records_limit);


        $jobTitle = UserJob::query()->where("id", $jobId)->value('title');
        return view('website.job.applicants', compact('applicants', 'jobTitle', 'jobId'));
    }

    public function showAppliedJobCoverLetter($jobId, $userId)
    {
        $applicant = User::query()->find($userId);
        $coverLetter = UserAppliedJob::query()->where("user_id", $userId)->where("job_id", $jobId)->first();
        $portfolio = UserPortfolio::query()
            ->with('getPortfolio')
            ->where('user_id', $userId)
            ->get();

        $jobTitle = UserJob::query()->where("id", $jobId)->value('title');

        $isLiked = UserFavouriteProfile::query()->where("user_id", $this->getCreatedById())->where("profile_id", $userId)->exists();

        return view('website.job.cover_letter', compact('jobTitle', 'applicant', 'coverLetter', 'portfolio', 'isLiked'));
    }

    public function appliedJob(Request $request)
    {

        $jobs = UserAppliedJob::query()
        ->with(['jobDetails',"jobDetails.jobLocation:id,name", "jobDetails.jobSkills:id,name", "jobDetails.favorite"])
        ->where('user_id',$this->getCreatedById())
        ->paginate($this->records_limit);
        
        $showApplied = false;
        $notFoundMessage = "You haven't applied to any job, please add.";
        return view('website.job.applied_job', compact('jobs', 'showApplied', 'notFoundMessage'));
    }

    public function showApplyJob($jobId)
    {
        $jobTitle = UserJob::query()->with('user')->where('save_type','published')->where("id", $jobId)
        ->first();
        if(is_null($jobTitle)){
            return back()->with('error',"This job is unpublish/deleted.");
        }
        if($jobTitle->user==null || $jobTitle->user->status=='0'){
            return back()->with('error',"This job's user is inactive/deleted.");
        }
        return view('website.job.apply_now', compact('jobTitle'));
    }
    public function storeApplyJob(ApplyNowRequest $request, $jobId)
    {
        try {
            // $request->validate(["resume" => "required|file|mimes:pdf,doc,docx", "cover_letter" => "required"]);
            if (UserAppliedJob::query()->where("user_id", auth()->id())->where("job_id", $jobId)->exists()) {
                //    throw ValidationException::withMessages([
                //     'field_name_1' => ['You have been already applied for this job.']            
                //    ]);
                return   $this->jsonResponse(false, "You have been already applied for this job.", []);
            } else {
                $modelObj = new UserAppliedJob();
                $modelObj->user_id = auth()->id();
                $modelObj->job_id = $jobId;
                $file = $request->file('resume');
                $fileName = $file->getClientOriginalName();
                $fileSize = ceil($file->getSize() / 1024);

                if( $fileSize> 10000)
                {
                    return   $this->jsonResponse(false, "uploaded file cannot be more than 10 MB.", []);
                }

                if ($fileSize > 1024) {
                    $fileSize = ceil($fileSize / 1024) . ' MB';
                }
                else
                {
                    $fileSize=$fileSize. ' KB';
                }

                $path = $this->uploadFile("appliedJobResumes", $file);
                $modelObj->resume = $path;
                $modelObj->resume_original_name = $fileName;
                $modelObj->resume_size = $fileSize;
                $modelObj->cover_letter = $request->get('cover_letter');
                $modelObj->save();
                return  $this->jsonResponse(true, "You have successfully applied for this job.", []);
                // return redirect()->route('showJobSearchResults')->with("success","Job application submitted successfully.");
            }
        } catch (\Throwable $th) {
            return  $this->jsonResponse(true, $th->getMessage(), []);
        }
    }


    public function storeJobToFavList(Request $request)
    {
        try {
            $jobId = $request->get("job_id");
            $userId = $this->getCreatedById();
            $favStatus = 0;
            if (UserFavoriteJob::query()->where("user_id", $userId)->where("job_id", $jobId)->exists()) {
                // remove from the fav list
                UserFavoriteJob::query()->where("user_id", $userId)->where("job_id", $jobId)->delete();
                $message = "Job removed from the favorite list.";
            } else {
                // add to fav list
                $modelObj = new UserFavoriteJob();
                $modelObj->user_id = $userId;
                $modelObj->job_id = $jobId;
                $modelObj->save();
                $message = "Job added to the favorite list.";
                $favStatus = 1;
            }
            return $this->jsonResponse(true, $message, $favStatus);
        } catch (\Throwable $th) {
            return $this->jsonResponse(false, $th->getMessage(), []);
        }
    }

    public function  showJobSearchResults(Request $request)
    {
        $promoteCheck=false;
        if($request->promoted_jobs=='1'){
            $promoteCheck=true;
        }
        if(!empty($request)){
            $prevDataReturn=['categories'=>$request->categories,'employments'=>$request->employments,'countries'=>$request->countries,'workspaces'=>$request->workspaces,"skills"=>$request->skills];
        }
        
        $requests = $request->all();
        $employments = MasterEmployement::query()->orderBy('name', 'ASC')->get();
        $countries = MasterCountry::query()->get();
        $categories = MasterProjectCategory::query()->orderBy('name', 'ASC')->get();
        $workspaces = Workspace::query()->orderBy('name', 'ASC')->get();
        $skills = MasterSkill::query()->orderBy('name', 'ASC')->get();
        $jobs = UserJob::query()
            ->with(["jobLocation:id,name", "user","jobSkills:id,name", "favorite"=>function($q){
                $q->where('user_id',$this->getCreatedById());
            } ,
             "applied"=>function($q){
                $q->where('user_id',$this->getCreatedById());
            } ])
            ->where('save_type','published')
            ->where(function ($q) use ($requests) {
                if (isset($requests["countries"]) && !empty($requests["countries"])) {
                    $q->whereIn("location_id", $requests["countries"]);
                }
                if (isset($requests["search"]) && !empty($requests["search"])) {
                    $search = $requests["search"];
                    $q->where("title", 'like', "%$search%");
                }
                if (isset($requests["promoted_jobs"]) && !empty($requests["promoted_jobs"])) {
                    $q->where("Promote", $requests["promoted_jobs"]);
                }
            })
            ->whereHas("jobEmployements", function ($q) use ($requests) {
                if (isset($requests["employments"]) && !empty($requests["employments"])) {
                    $q->whereIn("employment_id", $requests["employments"]);
                }
            })
            ->whereHas("jobWorkSpaces", function ($q) use ($requests) {
                if (isset($requests["workspaces"]) && !empty($requests["workspaces"])) {
                    $q->whereIn("workspace_id", $requests["workspaces"]);
                }
            })
            ->whereHas("jobSkills", function ($q) use ($requests) {
                if (isset($requests["skills"]) && !empty($requests["skills"])) {
                    $q->whereIn("skill_id", $requests["skills"]);
                }
            })
            ->whereHas("user",function($q){
                $q->where("status","1");
                
            })
            ->where("save_type","published")      
           ->paginate(config('constants.JOB_PAGINATION_LIMIT'));
           $jobs->appends(request()->input())->links();
           $notFoundMessage = "No jobs found, please modify your search.";
        
        return view('website.job.search_result', compact('countries', 'employments', 'skills', 'categories', 'workspaces', 'jobs', 'notFoundMessage','promoteCheck','prevDataReturn'));
    }

    public function getUserJobData($user_id, $status = '')
    {
        try {
            $userJob = '';
            $userJob = UserJob::query()
                ->with(['jobSkills', 'jobWorkSpaces', 'jobEmployements', 'jobLocation'])
                ->where('user_id', $user_id)
                ->where(function ($q) use ($status) {
                    if (!empty($status)) {
                        $q->where('save_type', $status);
                    }
                })
                ->paginate(5);
            return $userJob;
        } catch (Exception $e) {
            return back()->with($e->getmessage());
        }
    }

    public function getJobData($job_id)
    {
        try {
            $JobData = UserJob::query()
                ->with(['jobSkills', 'jobWorkSpaces', 'jobEmployements', 'jobLocation','user'])
                ->find($job_id);
            return $JobData;
        } catch (Exception $e) {
            return back()->with($e->getmessage());
        }
    }

    public function searchJobSingleView($job_id)
    {
        try {
            if (!empty($job_id)) {
                $Job_data = UserJob::query()
                ->with(['jobSkills', 'jobWorkSpaces', 'jobEmployements', 'jobLocation','user','favorite', 'singleJobApplied'=>function($q){
                    $q->where('user_id',auth()->user()->id);
                }])
                ->find($job_id);
                if (is_null($Job_data)||$Job_data->save_type=='unpublished' || empty($Job_data->user) || $Job_data->user->status==0 ) {
                    if( is_null($Job_data) || $Job_data->save_type=='unpublished'){
                        return back()->with('error','This job is unpublish/deleted.');

                    }elseif (empty($Job_data->user) || $Job_data->user->status==0) {
                        return back()->with('error',"This job's user is inactive/deleted.");
                    }
                }
                return view('website.job.job_search_post_single', compact(['Job_data']));
            } else {
                return back()->with('Something went wrong');
            }
            

        } catch (Exception $e) {
            return back()->with($e->getmessage());
        }
    }

    public function postedJobView(Request $request)
    {
        try {
            if (!empty($request->job_id)) {
                $Job_data = $this->getJobData($request->job_id);
            } else {
                return back()->with('Something went wrong');
            }
            return view('website.job.job_post_single', compact(['Job_data']));
        } catch (Exception $e) {
            return back()->with($e->getmessage());
        }
    }


    public function promotionJob(Request $request)
    {
        try {
            $user_job = UserJob::query()->where('id',$request->id)->first();
            if(isset($user_job) && $user_job->user_id == $this->getCreatedById()){
                $admin_email_id = config('app.ADMIN_EMAIL_ID');
                $user = User::query()->where('id',$this->getCreatedById())->first();
                $collect_user  = collect();
                $collect_user->put('first_name', UcFirst($user->first_name));
                $collect_user->put('job_title', UcFirst($user_job->title));
                $user->notify(new PromotionJob($collect_user));
    
                $user_admin = User::query()->where('email',$admin_email_id)->first();
                $collect_admin = collect();
                $collect_admin->put('first_name', UcFirst($user_admin->first_name));
                $collect_admin->put('job_title', UcFirst($user_job->title));
                $collect_admin->put('user_name',  UcFirst($user->first_name));
                $user_admin->notify(new AdminPromotionJob($collect_admin));
                if($request->ajax()){
                    return ['status'=>'success','msg'=>"Email has been dispatched."];
                }
                
                // return back()->with(['status'=>'success','msg'=>'Email has been dispatched.']);
                $message='Email has been dispatched.';
                return redirect()->back()->with("success", $message);
                
            }else{
                return ['status'=>'error','msg'=>"Something went wrong, please try again later."];

            }
            
        } catch (Exception $e) {
            // return back()->with($e->getmessage());
            return ['status'=>0,'msg'=>$e->getMessage()];
            
        }
    }
}
