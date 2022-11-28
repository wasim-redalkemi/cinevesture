<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Website\AjaxController;
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
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ProjectController extends WebController
{
    public function __construct()
    {
        $this->return_response = ['error_msg'=>'','success_msg'=>''];
    }
    public function projectList()
    {
        try {
            $UserProject = UserProject::query()->with('projectImage')->where('user_id',auth()->user()->id)->get();
            return view('website.user.project.project',compact('UserProject'));

        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function projectOverview()
    {
        try {
            $languages = MasterLanguage::query()->orderBy('name', 'ASC')->get();
            $country = MasterCountry::query()->orderBy('name', 'ASC')->get();
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

    public function validateProjectOverview()
    {
        try {
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
            $overview->user_id = auth()->user()->id;
            $overview->project_name = $request->project_name;
            $overview->project_type_id = $request->project_type_id;
            $overview->listing_project_as = $request->listing_project_as;
            $overview->location = $request->location;
            if($overview->save()) {

                foreach ($request->countries as $k => $v) {
                    $projectCountries = new ProjectCountry();   
                    $projectCountries->project_id = $overview->id;
                    $projectCountries->country_id = $v;
                    $projectCountries->save();
                }
                foreach ($request->languages as $k => $v) {
                    $projectLanguages = new ProjectLanguage();
                    $projectLanguages->project_id = $overview->id;
                    $projectLanguages->language_id = $v;
                    $projectLanguages->save();
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
            $overview->user_id = auth()->user()->id;
            $overview->project_name = $request->project_name;
            $overview->project_type_id = $request->project_type_id;
            $overview->listing_project_as = $request->listing_project_as;
            $overview->location = $request->location;
            if($overview->update()) {
                ProjectCountry::query()->where('project_id', $_REQUEST['project_id'])->delete();
                foreach ($request->countries as $k => $v) {
                    $projectCountries = new ProjectCountry();   
                    $projectCountries->project_id = $overview->id;
                    $projectCountries->country_id = $v;
                    $projectCountries->save();
                }
                ProjectLanguage::query()->where('project_id', $_REQUEST['project_id'])->delete();
                foreach ($request->languages as $k => $v) {
                    $projectLanguages = new ProjectLanguage();
                    $projectLanguages->project_id = $overview->id;
                    $projectLanguages->language_id = $v;
                    $projectLanguages->save();

                    $this->return_response['success_msg'] = 'Project overview edit successfully.';
                }
            }
        } catch (Exception $e) {
            $this->return_response['error_msg'] = $e->getMessage();
        }
        return $this->return_response;
    }
        
    
    public function projectDetails()
    {
        try {
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }
            $languages = MasterLanguage::query()->orderBy('name', 'ASC')->get();
            $country = MasterCountry::query()->orderBy('name', 'ASC')->get();
            $category = MasterProjectCategory::query()->get();
            $Genres = MasterProjectGenre::query()->get();    
          
            $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
            $projectData = UserProject::query()->with(['genres','projectCategory','projectAssociation'])->where('id',$_REQUEST['id'])->get();
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
            return back()->with('error','Something went wrong.');
        }
    }
    

    public function validateProjectDetails()
    {
        try {
            $detailsResponse = $this->detailsStore();
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

            $details = UserProject::query()->find($id)->latest()->first();
            if (isset($details)) {                
                $details->duration = $request->duration;
                $details->total_budget = $request->total_budget;
                $details->financing_secured = $request->financing_secured;
                if($details->update()) {
                    ProjectCategory::query()->where('project_id', $details->id)->delete();
                    foreach ($request->category_id as $k => $v) {
                        $projectGenres = new ProjectCategory();
                        $projectGenres->project_id = $details->id;
                        $projectGenres->category_id = $v;
                        $projectGenres->save();
                    }
                    ProjectGenre::query()->where('project_id', $details->id)->delete();
                    foreach ($request->gener as $k => $v) {
                        $projectGenres = new ProjectGenre();
                        $projectGenres->project_id = $details->id;
                        $projectGenres->gener_id = $v;
                        $projectGenres->save();
                    }
                    ProjectAssociation::query()->where('project_id', $details->id)->delete();
                    foreach($_REQUEST as $k => $v)
                    {
                        $fdata = explode('~',$k);
                        if($fdata[0] == 'project_associate_title')
                        {
                            $projectAssociations = new ProjectAssociation();
                            $projectAssociations->project_id = $details->id;
                            $projectAssociations->project_associate_title = $_REQUEST['project_associate_title~'.$fdata[1]];
                            $projectAssociations->project_associate_name = $_REQUEST['project_associate_name~'.$fdata[1]];
                            $projectAssociations->save();
                        }
                    }
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
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }                
            $projectDescription = [];
            $projectDescription = UserProject::query()->where('id',$_REQUEST['id'])->get();

            return view('website.user.project.project_description', compact('projectDescription'));
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        } 
    }

    
    public function validateProjectDescription()
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

            $description = UserProject::query()->find($id)->latest()->first();
            if (isset($description)) {
                
                $description->logline = $request->logline;
                $description->synopsis = $request->synopsis;
                $description->director_statement = $request->director_statement;
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
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }
           
            $languages = MasterLanguage::query()->orderBy('name', 'ASC')->get();
            $country = MasterCountry::query()->orderBy('name', 'ASC')->get();    
            $projectgallery = [];
            $projectgallery = UserProject::query()->where('id',$_REQUEST['id'])->get();

            return view('website.user.project.project_gallery', compact('projectgallery','languages','country'));
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        } 
    }

    public function galleryStore(Request $request,$id)
    {
        try {
                $project = UserProject::query()->find($id)->latest()->first();
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

                    ProjectMedia::query()->where('project_id',$project->id)->delete();
                    foreach($data_to_insert as $k => $v)
                    {
                        $projectMedia = new ProjectMedia();
                        $projectMedia->project_id = $project->id;
                        $projectMedia->file_type = $v['file_type'];
                        $projectMedia->file_link = $v['file_link'];
                        $projectMedia->save();
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
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }
            $languages = MasterLanguage::query()->orderBy('name', 'ASC')->get();
            $country = MasterCountry::query()->orderBy('name', 'ASC')->get();
            $projectStage = ProjectStage::query()->get();
            $lookingFor = MasterLookingFor::query()->get();
            $projectStageOfFunding = ProjectStageOfFunding::query()->get();

            $projectData = [];
            $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
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
            return back()->with('error','Something went wrong.');
        }
    }

    
    public function validateProjectMilestone()
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

            $requirements = UserProject::query()->find($id)->latest()->first();
            if (isset($requirements)) {
                
                $requirements->project_stage_id = $request->project_stage_id;
                $requirements->stage_of_funding_id = $request->stage_of_funding_id;
                $requirements->crowdfund_link = $request->crowdfund_link;
                if($requirements->update()) {
                    ProjectLookingFor::query()->where('project_id', $requirements->id)->delete();
                    foreach ($request->loking_for as $k => $v) {
                        $projectLookingFor = new ProjectLookingFor();
                        $projectLookingFor->project_id = $requirements->id;
                        $projectLookingFor->looking_for_id = $v;
                        $projectLookingFor->save();
                    }                   
                    
                    // ProjectMilestone::query()->where('project_id', $requirements->id)->delete();
                    // foreach($_REQUEST as $k => $v)
                    // {
                    //     $fdata = explode('~',$k);
                    //     if($fdata[0] == 'project_milestone_description')
                    //     {
                    //         $projectMilestone = new ProjectMilestone();
                    //         $projectMilestone->project_id = $requirements->id;
                    //         $projectMilestone->description = $_REQUEST['project_milestone_description~'.$fdata[1]];
                    //         $projectMilestone->budget = $_REQUEST['project_milestone_budget~'.$fdata[1]];
                    //         $projectMilestone->traget_date = $_REQUEST['project_milestone_traget_date~'.$fdata[1]];
                    //         if (isset($_REQUEST['project_milestone_complete~'.$fdata[1]])) {
                    //             $projectMilestone->complete = $_REQUEST['project_milestone_complete~'.$fdata[1]];
                    //         } else {
                    //             $projectMilestone->complete = 0;
                    //         }
                    //         $projectMilestone->save();
                    //     }
                    // }
                    $this->return_response['success_msg'] = 'Project milestones updated successfully.';
                } else {
                    throw new Exception('Please overview phase fill');
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
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }           
            $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
            $projectData = UserProject::query()->with(['user','genres','projectCategory','projectLookingFor','projectLanguages','projectCountries','projectMilestone','projectAssociation','projectType','projectStageOfFunding','projectStage','projectOnlyImage','projectOnlyVideo','projectOnlyDoc'])->where('id',$_REQUEST['id'])->get();
            $projectData = $projectData->toArray();

            return view('website.user.project.project_preview', compact('UserProject','projectData'));
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function publicView()
    {
        try {
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return back()->with('error','Project Id not found.');
            }
            $countries = MasterCountry::all();
            $languages = MasterLanguage::all();
            $geners = MasterProjectGenre::all();
            $categories = MasterProjectCategory::all();
            $looking_for = MasterLookingFor::all();
            $project_stages = ProjectStage::all();
             
            $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
            $projectData = UserProject::query()->with(['user','genres','projectCategory','projectLookingFor','projectLanguages','projectCountries','projectMilestone','projectAssociation','projectType','projectStageOfFunding','projectStage','projectOnlyImage','projectOnlyVideo','projectOnlyDoc'])->where('id',$_REQUEST['id'])->get();
            $projectData = $projectData->toArray();

            return view('website.user.project.project_public_view', compact(['UserProject','projectData','geners','categories','looking_for','project_stages','countries','languages']));

        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
       
    }

    public function getMediaByProject(Request $request, $project_id = null){
        try {
            $reqData = $request->all();
            //\Log::info("project_id ".$project_id.", ".$reqData['type']);
            //\DB::connection()->enableQueryLog();
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
            //$queries = \DB::getQueryLog();
            //\Log::info("project_id ".json_encode($queries));
            //return json_encode($ProjectVideos);
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
                return back()->withErrors($validator)->withInput();
            }
    
            $countries = MasterCountry::all();
            $languages = MasterLanguage::all();
            $geners = MasterProjectGenre::all();
            $categories = MasterProjectCategory::all();
            $looking_for = MasterLookingFor::all();
            $project_stages = ProjectStage::all();
            
            $projects = UserProject::query()
            ->where('status','published')
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
                    });
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
            // ->where('user_id','!=',auth()->user()->id)
            ->orderByDesc('id')
            ->paginate(5);
         
            $projects->appends(request()->input())->links();
            return view('website.user.project.search_result',compact(['countries','languages','geners','categories','looking_for','project_stages','projects']));                   
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
                             ->where('user_id',auth()->user()->id)
                             ->where('project_id',$request->id)->first();
                 if($favourite){
                    $favourite->delete();
                    return ['status'=>True,'msg'=>"You have unliked this project."];
                 }else{
                    $favourite = new UserFavouriteProject();
                    $favourite->user_id = auth()->user()->id;
                    $favourite->project_id = $request->id;
                    $favourite->save();
                    return ['status'=>True,'msg'=>"You have liked this project."];
                  }
    
            }catch(Exception $e){
                return ['status'=>False,'msg'=>$e->getMessage()];
            }
           }
    
    public function changeStatus(Request $request)
    {
        try {
            $project=UserProject::where('id',$request->id)->first();
            $project->status = $request->status;
            if($project->update())
            {
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

}
