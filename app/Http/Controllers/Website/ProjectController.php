<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\AppUtilityController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Website\AjaxController;
use App\Http\Requests\PostUserPortfolioRequest;
use App\Http\Requests\ProjectDescriptionRequest;
use App\Http\Requests\ProjectDetailRequest;
use App\Http\Requests\ProjectMilestoneRequest;
use App\Http\Requests\ProjectOverview;
use App\Http\Requests\ProjectOverviewRequest;
use App\Models\MasterCountry;
use App\Models\MasterLanguage;
use App\Models\MasterLookingFor;
use App\Models\MasterProjectCategory;
use App\Models\MasterProjectGenre;
use App\Models\ProjectAssociation;
use App\Models\ProjectCategory;
use App\Models\ProjectCountry;
use App\Models\ProjectGenre;
use App\Models\ProjectLanguage;
use App\Models\ProjectListProjects;
use App\Models\ProjectLookingFor;
use App\Models\ProjectMedia;
use App\Models\ProjectMilestone;
use App\Models\ProjectStage;
use App\Models\ProjectStageOfFunding;
use App\Models\ProjectType;
use App\Models\User;
use App\Models\UserFavouriteProject;
use App\Models\UserProject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ProjectController extends WebController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkValidRequest()
    {
       try 
       {
            if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])) 
            {
                if(!empty($this->isAdminRequest()['error_msg']))
                {
                    $this->resetResponse();
                    $projectData = UserProject::query()->where('user_id',$this->getCreatedById())->where('id',$_REQUEST['id'])->get()->toArray();
                    if(empty($projectData))
                    {
                        throw new Exception('Malicious request.');
                    }
                }
            }
        } 
        catch (Exception $e) 
        {
            $this->return_response['error_msg'] = $e->getMessage();
        }
        return $this->return_response;
    }

    public function projectList()
    {
        $validRequest = $this->checkValidRequest();
            if(!empty($validRequest['error_msg']))
            {
                throw new Exception($validRequest['error_msg']);
            }

        try {   
            $UserProject = UserProject::query()->with('projectImage')->where('user_id',$this->getCreatedById())->get();
            return view('website.user.project.project',compact('UserProject'));

        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function projectOverview()
    {
        $validRequest = $this->checkValidRequest();
            if(!empty($validRequest['error_msg']))
            {
                throw new Exception($validRequest['error_msg']);
            }

        try {
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $project_types = ProjectType::all();    
            $projectOverview = [];
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return view('website.user.project.project_overview', compact(['languages','country','project_types']));
            }
            $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
           
            $projectData = UserProject::query()->with(['projectLanguages','projectCountries','projectType'])->where('id',$_REQUEST['id'])->get();
            $projectData = $projectData->toArray();

            $temp_languages = [];
            if (!empty($projectData[0]['project_languages'])) {
                foreach ($projectData[0]['project_languages'] as $k => $v){
                    array_push($temp_languages, $v['id']);
                }
                $projectData[0]['project_languages'] = $temp_languages;
            }

            $temp_countries = [];
            if (!empty($projectData[0]['project_countries'])) {
                foreach ($projectData[0]['project_countries'] as $k => $v){
                    array_push($temp_countries, $v['id']);
                }
                $projectData[0]['project_countries'] = $temp_countries;
            }

            return view('website.user.project.project_overview', compact(['UserProject','projectData','languages','country','project_types']));
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function validateProjectOverview(ProjectOverviewRequest $request)
    {
        try
        {   
            if(!empty($_REQUEST['project_id']))
            {  
                $overviewEditResponse = $this->overviewEdit();
                
                if(!empty($overviewEditResponse['error_msg']))
                {
                    return back()->with('error',$overviewEditResponse['error_msg']);
                }
                else
                {
                    return redirect()->route('project-details',['id' => $_REQUEST['project_id']])->with("success",$overviewEditResponse['success_msg']);
                }
            }
            else 
            {
                $store = $this->overviewStore();
                return redirect()->route('project-details',['id' => $store])->with("success","User overview updated successfully.");
            }
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function overviewStore()
    {
        try {
            
            $request = (object) $_REQUEST;


            $overview = new UserProject();
            $overview->user_id = $this->getCreatedById();
            $overview->project_name = $request->project_name;
            $overview->project_type_id = $request->project_type_id;
            $overview->listing_project_as = $request->listing_project_as;
            $overview->location = $request->location;
            if ($overview->project_step<1) {
                $overview->project_step = '1';
            }
            if($overview->save()) {
                if (!empty($request->countries)) {
                    foreach ($request->countries as $k => $v) {
                        $projectCountries = new ProjectCountry();   
                        $projectCountries->project_id = $overview->id;
                        $projectCountries->country_id = $v;
                        $projectCountries->save();
                    }
                }
                if (!empty($request->languages)) {
                    foreach ($request->languages as $k => $v) {
                        $projectLanguages = new ProjectLanguage();
                        $projectLanguages->project_id = $overview->id;
                        $projectLanguages->language_id = $v;
                        $projectLanguages->save();
                    }
                }
                return $overview->id;
            }
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function overviewEdit()
    {
        try {
            $request = (object) $_REQUEST;

            $overview = UserProject::query()->where('id',$_REQUEST['project_id'])->first();
            $overview->user_id = $this->getCreatedById();
            $overview->project_name = $request->project_name;
            $overview->project_type_id = $request->project_type_id;
            $overview->listing_project_as = $request->listing_project_as;
            $overview->location = $request->location;
            if ($overview->project_step<1) {
                $overview->project_step = '1';
            }
            if($overview->update()) {
                if (!empty($request->countries)) {
                    ProjectCountry::query()->where('project_id', $_REQUEST['project_id'])->delete();
                    foreach ($request->countries as $k => $v) {
                        $projectCountries = new ProjectCountry();   
                        $projectCountries->project_id = $overview->id;
                        $projectCountries->country_id = $v;
                        $projectCountries->save();
                    }
                }
                if (!empty($request->languages)) {
                    ProjectLanguage::query()->where('project_id', $_REQUEST['project_id'])->delete();
                    foreach ($request->languages as $k => $v) {
                        $projectLanguages = new ProjectLanguage();
                        $projectLanguages->project_id = $overview->id;
                        $projectLanguages->language_id = $v;
                        $projectLanguages->save();    
                    }
                    // AppUtilityController::listAutomation();
                    $aa=new AppUtilityController();
                    $aa->listAutomation();
                    $this->return_response['success_msg'] = 'Project overview updated successfully.';
                }
            }
        } catch (Exception $e) {
            $this->return_response['error_msg'] = $e->getMessage();
        }
        return $this->return_response;
    }

    // public function validateProjectRoute($project_id,$user_status='overview')
    // {
    //     try
    //     {   
    //         $UserProject = UserProject::query()->where('id',$project_id)->first();  
    //     } catch (Exception $e) {
    //         return back()->with('error','Something went wrong.');
    //     }
    // }
        
    
    public function projectDetails()
    {
        try {
            $project_step=1;
            $validRequest = $this->checkValidRequest();
            if(!empty($validRequest['error_msg']))
            {
                throw new Exception($validRequest['error_msg']);
            }

            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                throw new Exception('Project Id not found');
            }
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $category = MasterProjectCategory::query()->orderBy('name', 'ASC')->get();
            $Genres = MasterProjectGenre::query()->get();    
          
            $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
            if ($project_step > $UserProject->project_step) {
                throw new Exception('Please fill previous data.');
            }
            $projectData = UserProject::query()->with(['genres','projectCategory','projectAssociation',"primaryGenres"])->where('id',$_REQUEST['id'])->get();
            $projectData = $projectData->toArray();
            $temp_genres = [];
            if (!empty($projectData[0]['genres'])) {
                foreach ($projectData[0]['genres'] as $k => $v){
                    array_push($temp_genres, $v['id']);
                }
                $projectData[0]['genres'] = $temp_genres;
            }
            $temp_categories = [];
            if (!empty($projectData[0]['project_category'])) {
                foreach ($projectData[0]['project_category'] as $k => $v){
                    array_push($temp_categories, $v['id']);
                }
                $projectData[0]['project_category'] = $temp_categories;
            }
            
            return view('website.user.project.project_details', compact('UserProject','projectData','languages','country','category','Genres'));

        } catch (Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }
    

    public function validateProjectDetails(ProjectDetailRequest $request)
    {
        try {
            $detailsResponse = $this->detailsStore();
            $tot="$request->total_budget"+1;

            if($tot<intval($request->financing_secured)){    
                return back()->with('error','Financing Secured should small then total budget.');
            }

            if(!empty($detailsResponse['error_msg']))
            {
                return back()->with('error',$detailsResponse['error_msg']);
            }
            else
            {
                return redirect()->route('project-description',['id' => $_REQUEST['project_id']])->with("success",$detailsResponse['success_msg']);
            }
            
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }    
    }

    public function detailsStore()
    {
        try {
            
            $request = (object) $_REQUEST;
            $id = $request->project_id;
            $details = UserProject::query()->find($id);
            if (isset($details)) {                
                $details->duration = $request->duration;
                $details->total_budget = $request->total_budget;
                $details->financing_secured = $request->financing_secured;
                $details->primary_genre_id = $request->primary_gener_id;
                if ($details->project_step<2) {
                    $details->project_step = '2';
                }
                if($details->update()) {
                    if (!empty($request->category_id)) {
                       $projectCategory= ProjectCategory::query()->where('project_id', $details->id)->delete();
                        // foreach ($request->category_id as $k => $v) {
                            $projectCategory = new ProjectCategory();
                            $projectCategory->project_id = $details->id;
                            $projectCategory->category_id = $request->category_id;
                            $projectCategory->save();
                        
                        // }
                    }
                   
                    ProjectGenre::query()->where('project_id', $details->id)->delete();
                    if (!empty($request->gener)) {
                        foreach ($request->gener as $k => $v) {
                            $projectGenres = new ProjectGenre();
                            $projectGenres->project_id = $details->id;
                            $projectGenres->gener_id = $v;
                            $projectGenres->save();
                            }
                        }
                    // AppUtilityController::listAutomation();
                    $aa=new AppUtilityController();
                    $aa->listAutomation();
                    $this->return_response['success_msg'] = 'Project details updated successfully.';                    
                } else {
                    return back()->with("error","Please overview phase fill.");
                }
            }
        } catch (Exception $e) {
            $this->return_response['error_msg'] = $e->getMessage();
        }
        return $this->return_response;
    }

    public function projectDescription()
    {
        try {
            $project_step='2';
            $validRequest = $this->checkValidRequest();
           
            if(!empty($validRequest['error_msg']))
            {
                throw new Exception($validRequest['error_msg']);
            }
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }   
            $projectDescription = [];
            $projectDescription = UserProject::query()->where('id',$_REQUEST['id'])->get();
            if ($project_step > $projectDescription[0]->project_step) {
                throw new Exception('Please fill previous data.');
            }
            return view('website.user.project.project_description', compact('projectDescription'));
        } catch (Exception $e) {
            return back()->with('error',$e->getMessage());
        } 
    }

    
    public function validateProjectDescription(ProjectDescriptionRequest $request)
    {
        try {    
            $descriptionResponse = $this->descriptionStore();
            if(!empty($descriptionResponse['error_msg']))
            {
                return back()->with('error',$descriptionResponse['error_msg']);
            }
            else
            {
                return redirect()->route('project-gallery',['id' => $_REQUEST['project_id']])->with("success",$descriptionResponse['success_msg']);
            }

        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }
    
    public function descriptionStore()
    {
        try {
            
            $request = (object) $_REQUEST;
            $id = $request->project_id;

            $description = UserProject::query()->find($id);
            if (isset($description)) {
                
                $description->logline = $request->logline;
                $description->synopsis = $request->synopsis;
                $description->director_statement = $request->director_statement;
                if ($description->project_step<3) {
                    $description->project_step = '3';
                }
                if($description->update()) {
                    $this->return_response['success_msg'] = 'Project description updated successfully.';
                } else {
                    throw new Exception('Please overview phase fill');
                }
            }
        } catch (Exception $e) {
            $this->return_response['error_msg'] = $e->getMessage();
        }
        return $this->return_response;
    }

    public function projectGallery()
    {
        try {
            $project_step=3;
            $validRequest = $this->checkValidRequest();
            if(!empty($validRequest['error_msg']))
            {
                throw new Exception($validRequest['error_msg']);
            }
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }
            $projectId = $_REQUEST['id'];
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();    
            $projectgallery = [];
            $projectgallery = UserProject::query()->where('id',$projectId)->get();
            if ($project_step > $projectgallery[0]->project_step) {
                throw new Exception('Please fill previous data.');
            }
            if(!empty($projectgallery[0]->banner_image)){
                $projectgallery[0]->banner_image = asset("storage/".$projectgallery[0]->banner_image);
            }
            return view('website.user.project.project_gallery', compact('projectgallery','languages','country'));
        } catch (Exception $e) {
            return back()->with('error',$e->getMessage());
        } 
    }

    public function galleryStore(Request $request,$id)
    {
        try {
                $project = UserProject::query()->find($id);
                 if(!empty($project)) 
                {
                    $data_to_insert = [];
                    $i=0;
                    foreach($request->toArray() as $k => $v) 
                    {
                        $i++;
                        $video_file_name = 'img_1'.$i;
                        if(!empty($request->$video_file_name)) 
                        {
                            $data_to_insert[] = [
                                'file_type' => 'image',
                                'file_link' => $request->$video_file_name
                            ];
                        }

                        $image_file_name = 'project_image_'.$i;
                        if($request->hasFile($image_file_name)) 
                        {
                            $file = $request->file($image_file_name);
                            $originalFile = $file->getClientOriginalName();
                            $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
                            $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                            $nameStr = date('_YmdHis');
                            $newName = $fileName.$nameStr.'.'.$fileExt;
                            $locationPath  = "project/image";
                            $uploadFile = $this->uploadFile($locationPath , $file,$newName);
                            $data_to_insert[] = [
                                'file_type' => 'image',
                                'file_link' => $newName
                            ];
                        }                        
                    }
                    return redirect()->route('project-create',['nextPage' => 'Milestone'])->with("success","Project media updated successfully.");
                }
            } 
            catch (Exception $e) 
            {
                return back()->with('error','Something went wrong.');
            }
    }

    public function projectMilestone()
    {      
            try {
            $project_step='4';
            $validRequest = $this->checkValidRequest();
            if(!empty($validRequest['error_msg']))
            {
                throw new Exception($validRequest['error_msg']);
            }
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }
           
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $projectStage = ProjectStage::query()->orderBy('name', 'ASC')->get();
            $lookingFor = MasterLookingFor::query()->orderBy('name', 'ASC')->get();
            $projectStageOfFunding = ProjectStageOfFunding::query()->get();

            $projectData = [];
            $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
            if (($project_step > $UserProject->project_step) &&($UserProject->project_step!=3)) {
                throw new Exception('Please fill previous data.');
            }
            $projectData = UserProject::query()->with(['user','genres','projectCategory','projectLookingFor','projectLanguages','projectCountries','projectMilestone','projectAssociation','projectType','projectStageOfFunding','projectStage'])->where('id',$_REQUEST['id'])->get();
            $projectData = $projectData->toArray();
            $temp_looking_for = [];
            if (!empty($projectData[0]['project_looking_for'])) {
                foreach ($projectData[0]['project_looking_for'] as $k => $v){
                    array_push($temp_looking_for, $v['id']);
                }
                $projectData[0]['project_looking_for'] = $temp_looking_for;
            }

            return view('website.user.project.project_milestones', compact('UserProject','projectData','languages','country','projectStage','lookingFor','projectStageOfFunding'));
        } 
        catch (Exception $e) 
        {
            return back()->with('error',$e->getMessage());
        }
    }

    
    public function validateProjectMilestone(ProjectMilestoneRequest $request)
    {
        try {
            $milestoneResponse = $this->milestoneStore();
            if(!empty($milestoneResponse['error_msg']))
            {
                return back()->with('error',$milestoneResponse['error_msg']);
            }
            else
            {
                return redirect()->route('project-preview',['id' => $_REQUEST['project_id']])->with("success",$milestoneResponse['success_msg']);
            }
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }    
        
    }

    public function milestoneStore()
    {
        try {
            
            $request = (object) $_REQUEST;
            $id = $request->project_id;

            $requirements = UserProject::query()->find($id);
            if (isset($requirements)) {
                
                $requirements->project_stage_id = $request->project_stage_id;
                $requirements->stage_of_funding_id = $request->stage_of_funding_id;
                $requirements->crowdfund_link = $request->crowdfund_link;
                if ($requirements->project_step<5) {
                    $requirements->project_step = '5';
                }
                if($requirements->update()) {
                    if (!empty($request->loking_for)) {
                        ProjectLookingFor::query()->where('project_id', $requirements->id)->delete();
                        foreach ($request->loking_for as $k => $v) {
                            $projectLookingFor = new ProjectLookingFor();
                            $projectLookingFor->project_id = $requirements->id;
                            $projectLookingFor->looking_for_id = $v;
                            $projectLookingFor->save();
                        }                   
                    }                    
                $this->return_response['success_msg'] = 'Project milestones updated successfully.';
                } else {
                    throw new Exception('Please overview fill agian.');
                }
            }
        } catch (Exception $e) {
            $this->return_response['error_msg'] = $e->getMessage();
        }
        return $this->return_response;
    }

    public function projectPreview()
    {        
        try {
            $validRequest = $this->checkValidRequest();
            if(!empty($validRequest['error_msg']))
            {
                throw new Exception($validRequest['error_msg']);
            }
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }           
            $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
            if ($UserProject->project_step<5) {
                throw new Exception('Please fill previous data.');
            }
            $projectData = UserProject::query()->with(['user','genres','projectCategory','projectLookingFor','projectLanguages','projectCountries','projectMilestone','projectAssociation','projectType','projectStageOfFunding','projectStage','projectOnlyImage','projectOnlyVideo','projectOnlyDoc','primaryGenres'])->where('id',$_REQUEST['id'])->get();
            $projectData = $projectData->toArray();

            return view('website.user.project.project_preview', compact('UserProject','projectData'));
        } catch (Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }

    public function publicView()
    {
        try {
            // $validRequest = $this->checkValidRequest();
            // if(!empty($validRequest['error_msg']))
            // {
            //     throw new Exception($validRequest['error_msg']);
            // }

            
            $show=false;
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }
            $recomProject[] = '';
            $countries = MasterCountry::all();
            $languages = MasterLanguage::all();
            $geners = MasterProjectGenre::all();
            $categories = MasterProjectCategory::all();
            $looking_for = MasterLookingFor::all();
            $project_stages = ProjectStage::all();

             if(!empty($_REQUEST['data']) && ($_REQUEST['data']==1)){
                $show=true;
                $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
                $projectData = UserProject::query()->with(['user','genres','primaryGenres','projectCategory','projectLookingFor','projectLanguages','projectCountries','projectMilestone','projectAssociation','projectType','projectStageOfFunding','projectStage','projectImage','projectOnlyImage','projectOnlyVideo','projectMarkVideo','projectOnlyDoc'])->where('id',$_REQUEST['id'])
                ->get();
                if (empty($projectData)) {
                    return back()->with('error','This Project is Unpublished/Inactive.');
                }
            }else{
            
                $UserProject = UserProject::query()->where('id',$_REQUEST['id'])
                ->with(['isfavouriteProject','isfavouriteProjectOne'])->first();
                
                
                $projectData = UserProject::query()->with(['user','genres','primaryGenres','projectCategory','projectLookingFor','projectLanguages','projectCountries','projectMilestone','projectAssociation','projectType','projectStageOfFunding','projectStage','projectImage','projectOnlyImage','projectOnlyVideo','projectMarkVideo','projectOnlyDoc'])->where('id',$_REQUEST['id'])->where(function($q){
                    if(auth()->user()->user_type == 'A'){
                        $q->where('user_status','!=', 'draft');
                    }
                    else {
                        $q->where('user_status', 'published')
                        ->Where('admin_status', 'active');
                    }
                })->get();
                if($projectData[0]->user->status=='0'){
                    return back()->with('error',"This project's uses is inactive.");
                }
                if (empty($projectData) || (empty($projectData[0]->user))|| is_null($projectData[0]->user || $projectData[0]->user->status=='0')){
                        if(empty($projectData[0]) ){
                            return back()->with('error','This Project is unpublished/inactive.');
                        }if (is_null($projectData[0]->user)){
                            return back()->with('error',"This project's uses is inactive.");
                        }if ($projectData[0]->user->status=='0'){
                            return back()->with('error',"This project's uses is inactive.");
                        }
                }
            }
            $gener=ProjectGenre::query()->where('project_id',$_REQUEST['id'])->get();
            if (!blank($gener)) {
                foreach($gener as $generIds){
                    $generid[]=$generIds->gener_id;
                }
            } 
            else {
                    $generid[]=$UserProject->primary_genre_id;
            }
            if ($generid[0]!=null) {
                $projects=ProjectGenre::query()->whereIn('gener_id',$generid)->get();
                foreach($projects as $projectId){
                    $projectIdArray[]=$projectId->project_id;
                }
                    $projectIdUnique=array_unique($projectIdArray);
                if(!empty($_REQUEST['data']) && $_REQUEST['data']== true){
                    $recomProject=UserProject::query()->whereIn('id',$projectIdUnique)
                    ->with(['projectOnlyImage'])
                                ->where('id','!=',$_REQUEST['id'])
                                ->where('user_status','published')
                                ->where('admin_status','active')

                                ->orderBy('id','desc')
                                ->paginate(10);
                }else{
                    $recomProject=UserProject::query()->whereIn('id',$projectIdUnique)
                    ->with(['projectOnlyImage','isfavouriteProjectOne','isfavouriteProject'])
                                ->where('id','!=',$_REQUEST['id'])
                                ->where('user_status','published')
                                ->where('admin_status','active')

                                ->orderBy('id','desc')
                                ->paginate(10);
                }
            }
        
            $projectData = $projectData->toArray();
            if (empty($projectData)) {
                return back()->with('error','This Project is Unpublished/Inactive.');
            }
            return view('website.user.project.project_public_view', compact(['UserProject','projectData','geners','categories','looking_for','project_stages','countries','languages','recomProject','show']));
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
       
    }

    public function getMediaByProject(Request $request, $project_id = null){
        try {
            $reqData = $request->all();
            $where = ['project_id'=>$project_id];
            if(isset($reqData['type'])){
                $where['file_type'] = $reqData['type'];
            }
            $ProjectVideos = ProjectMedia::where($where)->get();
            foreach($ProjectVideos as $i => $rec) {
                $ProjectVideos[$i]->media_info = json_decode($rec->media_info,true);
                if($rec->file_type == 'image'){
                    $ProjectVideos[$i]->file_link = asset("storage/".$rec->file_link);
                }
            } 
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$ProjectVideos,"Success","ER000","");
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,$ProjectVideos,"","ER500",$e->getMessage());
        }
        
    }

    // Get filtered Project

    public function getFilteredProject(Request $request)
    {
        try{ 
          
            $validator = Validator::make($request->all(), [
                'search' => 'nullable',
                'countries.*' => 'nullable|exists:master_countries,id',
                'languages.*' => 'nullable|exists:master_languages,id',
                'geners.*' => 'nullable|exists:master_project_genres,id',
                'categories.*' => 'nullable|exists:master_project_categories,id',
                'looking_for.*' => 'nullable|exists:master_looking_fors,id',
                'project_stages.*' => 'nullable|exists:project_stages,id',
            ]);
        
            if ($validator->fails()) {
                return back()->with($validator)->withInput();
            }
            if(!empty($request)){
                $prevDataReturn=['geners'=>$request->geners,'categories'=>$request->categories,'looking_for'=>$request->looking_for,
                'project_stages'=>$request->project_stages,'countries'=>$request->countries,'languages'=>$request->languages];
            }
            $countries = MasterCountry::query()->get();
            $languages = MasterLanguage::query()->get();
            $geners = MasterProjectGenre::query()->orderBy('name', 'ASC')->get();
            $categories = MasterProjectCategory::query()->orderBy('name', 'ASC')->get();
            $looking_for = MasterLookingFor::query()->orderBy('name', 'ASC')->get();
            $project_stages = ProjectStage::query()->orderBy('name', 'ASC')->get();
            $projects = UserProject::query()
            ->where('user_status','published')
            ->where('admin_status','active')
            ->where(function($query) use($request){
                if (isset($request->search)) { // search name of user
                    $query->where("project_name", "like", "%$request->search%");
                }
                if(isset($request->project_verified)){ // filter project verified
                  $query->where("project_verified","1");
                }
                if (isset($request->project_stages)) { // search name of user
                    $query->where("project_stage_id",$request->project_stages);
                }
            })
            ->where(function($subQuery) use($request)
            {   
                if (isset($request->countries)) { // search name of user
                $subQuery->whereHas('projectCountries',function ($q) use($request){
                        $q->whereIn('country_id',$request->countries);
                        
                    });
                } 
                if (isset($request->languages)) { // search name of user
                    $subQuery->whereHas('projectLanguages', function ($q) use($request){
                        $q->whereIn('language_id',$request->languages);
                    });
                }
                if (isset($request->geners)) { // search name of user
                    $subQuery->whereHas('genres', function ($q) use($request){
                        $q->whereIn('gener_id',$request->geners);
                    })
                    ->orWhereIn("primary_genre_id",$request->geners);
                } 
                if (isset($request->categories)) { // search name of user
                    $subQuery->whereHas('projectCategory', function ($q) use($request){
                        $q->whereIn('category_id',$request->categories);
                    });
                } 
                if (isset($request->looking_for)) { // search name of user
                    $subQuery->whereHas('projectLookingFor', function ($q) use($request){
                        $q->whereIn('looking_for_id',$request->looking_for);
                    });
                }
            
            
            })
            ->with(['projectCountries','projectLanguages','genres','projectCategory','projectLookingFor','projectStage','projectType','user','projectImage'])
            ->whereHas("user",function($q){
                $q->where("status","1");
                // $q->where("deleted_at","NULL");
                // ->whereNull('deleted_at');

            })
            // ->where('user_id','!=',auth()->user()->id)
            ->orderByDesc('id')
            ->paginate(config('constants.JOB_PAGINATION_LIMIT'));
            $projects->appends(request()->input())  ;
            return view('website.user.project.search_result',compact(['countries','languages','geners','categories','looking_for','project_stages','projects','prevDataReturn']));                   
           }catch(Exception $e){
            return back()->with('error',$e->getMessage());
           }
        }

           public function projectLike(Request $request)
           {
            try{ $validator = Validator::make($request->all(), [

                'id' => 'required|exists:user_projects,id',
                
            ]);
    
            if ($validator->fails()) {
                return ['status'=>False,'msg'=>"Something went wrong, Please try again later."];
            }
                 $favourite = UserFavouriteProject::query()
                             ->where('user_id',$this->getCreatedById())
                             ->where('project_id',$request->id)->first();
                 if($favourite){
                    $favourite->delete();
                    return ['status'=>'success','msg'=>"You have unliked this project."];
                 }else{
                    $favourite = new UserFavouriteProject();
                    $favourite->user_id = $this->getCreatedById();
                    $favourite->project_id = $request->id;
                    $favourite->save();
                    return ['status'=>'success','msg'=>"You have liked this project."];
                  }
    
            }catch(Exception $e){
                return ['status'=>False,'msg'=>$e->getMessage()];
            }
           }
    
    public function changeStatus(Request $request)
    {
        try {
            $validRequest = $this->checkValidRequest();
            if(!empty($validRequest['error_msg']))
            {
                throw new Exception($validRequest['error_msg']);
            }
            $project=UserProject::where('id',$request->id)->first();
            $project->user_status = $request->user_status;
            if($project->update())
            {
                // AppUtilityController::listAutomation();
                $aa=new AppUtilityController();
                $aa->listAutomation();
                return redirect()->route('project-list')->with("success", "Project status updated successfully.");
            }
            else
            {
                return back()->with("error", "Something went wrong");
            }
        } catch (Exception $e) {
            return back()->with("error", $e->getMessage());
        }
    }

    public function projectDelete()
    {
        try 
        {
            $validRequest = $this->checkValidRequest();
            if(!empty($validRequest['error_msg']))
            {
                throw new Exception($validRequest['error_msg']);
            }

            $id = $_REQUEST['id'];
            $isDeleteValid = $this->validateProjectDeleteRequest($id);
            if(!empty($isDeleteValid['error_msg']))
            {
                throw new Exception($isDeleteValid['error_msg']);
            }

            UserProject::query()->where('id', $id)->delete();
            UserFavouriteProject::query()->where('project_id', $id)->delete();
            ProjectAssociation::query()->where('project_id', $id)->delete();
            ProjectMilestone::query()->where('project_id', $id)->delete();
            ProjectLanguage::query()->where('project_id', $id)->delete();
            ProjectCountry::query()->where('project_id', $id)->delete();
            ProjectCategory::query()->where('project_id', $id)->delete();
            ProjectGenre::query()->where('project_id', $id)->delete();
            ProjectMedia::query()->where('project_id', $id)->delete();
            ProjectLookingFor::query()->where('project_id', $id)->delete();
            ProjectListProjects::query()->where('project_id', $id)->delete();
            return back()->with("success", "Project deleted successfully");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage().'Something went wrong.');
        }
    }

    private function validateProjectDeleteRequest($id)
    {
        try 
        {
            if(!empty($this->isAdminRequest()['error_msg']))
            {
                $this->resetResponse();
                $projectData =  UserProject::query()->where('id', $id)->first();
                if($projectData->user_id != $this->getCreatedById()) 
                {
                    throw new Exception('Unauthorized request!');
                }
            }
        } 
        catch (Exception $e) 
        {
            $this->return_response['error_msg'] = $e->getMessage();
        }
        return $this->return_response;
    }


}
