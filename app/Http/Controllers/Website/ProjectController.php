<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
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
use App\Models\UserProject;
use Exception;
use Illuminate\Http\Request;
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
            $user = User::query()->find(auth()->user()->id);
        
            $UserProject = UserProject::query()->where('user_id',$user->id)->get();

            return view('website.user.project.project',compact('user','UserProject'));

        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function projectViewRender($nextPage = '',$id = null)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $projectStage = ProjectStage::query()->get();
            $lookingFor = MasterLookingFor::query()->get();
            $projectStageOfFunding = ProjectStageOfFunding::query()->get();
            $UserProject = UserProject::query()->get();
            $projectCountries = ProjectCountry::query()->get();
            $category = MasterProjectCategory::query()->get();
            $Genres = MasterProjectGenre::query()->get();
            $project_types = ProjectType::all();

           
            if (isset($_REQUEST['nextPage'])) {
                $nextPage = $_REQUEST['nextPage'];
            }
            
            switch ($nextPage) {
                case 'Details':
                    return view('website.user.project.project_details', compact('user','languages','country','category','Genres'));
                    break;
                case 'Description':
                    return view('website.user.project.project_description', compact('user','languages','country'));
                    break;
                case 'Gallery':
                    return view('website.user.project.project_gallery', compact('user','languages','country'));
                    break;
                case 'Milestone':
                    return view('website.user.project.project_milestones', compact('user','languages','country','projectStage','lookingFor','projectStageOfFunding'));
                    break;
                case 'Preview':
                    return view('website.user.project.project_preview', compact('user','languages','country','lookingFor','UserProject'));
                    break;            
                default:
                    return view('website.user.project.project_overview', compact(['user','languages','country','project_types']));
            }
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function projectOverview()
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $project_types = ProjectType::all();    
            $projectOverview = [];
            if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
            {
                return view('website.user.project.project_overview', compact(['user','languages','country','project_types']));
            }
            $projectOverview = UserProject::query()->where('id',$_REQUEST['id'])->get();

            return view('website.user.project.project_overview', compact(['projectOverview','user','languages','country','project_types']));
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
            $user = User::query()->find(auth()->user()->id);       

            $overview = new UserProject();
            $overview->user_id = $user->id;
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
            $user = User::query()->find(auth()->user()->id);       
            // UserProject::query()->where('id', $_REQUEST['project_id'])->delete();

            $overview = UserProject::query()->where('id',$_REQUEST['project_id'])->first();
            // $overview = new UserProject();
            $overview->user_id = $user->id;
            $overview->project_name = $request->project_name;
            $overview->project_type_id = $request->project_type_id;
            $overview->listing_project_as = $request->listing_project_as;
            $overview->location = $request->location;
            if($overview->update()) {
                ProjectCountry::query()->where('project_id', $_REQUEST['project_id'])->delete();
                foreach ($request->countries as $k => $v) {
                    // $overview = ProjectCountry::query()->where('id',$_REQUEST['id'])->first();
                    $projectCountries = new ProjectCountry();   
                    $projectCountries->project_id = $overview->id;
                    $projectCountries->country_id = $v;
                    $projectCountries->save();
                }
                // ProjectLanguage::query()->where('project_id', $_REQUEST['project_id'])->delete();
                ProjectCountry::query()->where('project_id', $_REQUEST['project_id'])->delete();

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
            $user = User::query()->find(auth()->user()->id);
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $category = MasterProjectCategory::query()->get();
            $Genres = MasterProjectGenre::query()->get();    
          
            $UserProject = UserProject::query()->where('id',$_REQUEST['id'])->first();
            $projectData = UserProject::query()->with(['user','genres','projectCategory','projectLookingFor','projectLanguages','projectCountries','projectMilestone','projectType','projectStageOfFunding','projectStage'])->where('id',$_REQUEST['id'])->get();
            $projectData = $projectData->toArray();
            
            return view('website.user.project.project_details', compact('UserProject','projectData','user','languages','country','category','Genres'));

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

            $user = User::query()->find(auth()->user()->id);
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

                            $this->return_response['success_msg'] = 'Project details updated successfully.';
                        }
                    }
                    
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
            $user = User::query()->find(auth()->user()->id);
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();    
            $projectDescription = [];
            $projectDescription = UserProject::query()->where('id',$_REQUEST['id'])->get();

            return view('website.user.project.project_description', compact('projectDescription','user','languages','country'));
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

            $user = User::query()->find(auth()->user()->id);
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
            $user = User::query()->find(auth()->user()->id);
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();    
            $projectgallery = [];
            $projectgallery = UserProject::query()->where('id',$_REQUEST['id'])->get();

            return view('website.user.project.project_gallery', compact('projectgallery','user','languages','country'));
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        } 
    }

    public function galleryStore(Request $request,$id)
    {
        try {
                $user = User::query()->find(auth()->user()->id);
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
            $user = User::query()->find(auth()->user()->id);
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $projectStage = ProjectStage::query()->get();
            $lookingFor = MasterLookingFor::query()->get();
            $projectStageOfFunding = ProjectStageOfFunding::query()->get();

            $projectMilestone = [];
            $projectMilestone = UserProject::query()->where('id',$_REQUEST['id'])->get();

            return view('website.user.project.project_milestones', compact('projectMilestone','user','languages','country','projectStage','lookingFor','projectStageOfFunding'));
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

            $user = User::query()->find(auth()->user()->id);
            $requirements = UserProject::query()->find($id)->latest()->first();
            if (isset($requirements)) {
                
                $requirements->project_stage_id = $request->project_stage_id;
                $requirements->stage_of_funding_id = $request->stage_of_funding_id;
                $requirements->crowdfund_link = $request->crowdfund_link;
                if($requirements->update()) {

                    foreach ($request->loking_for as $k => $v) {
                        $projectLookingFor = new ProjectLookingFor();
                        $projectLookingFor->project_id = $requirements->id;
                        $projectLookingFor->looking_for_id = $v;
                        $projectLookingFor->save();
                    }                   
                    $projectMilestone = new ProjectMilestone();
                    $projectMilestone->project_id = $requirements->id;
                    $projectMilestone->description = $request->description;
                    $projectMilestone->budget = $request->budget;
                    $projectMilestone->traget_date = $request->traget_date;
                    if (isset($request->complete)) {
                        $projectMilestone->complete = $request->complete;
                    } else {
                        $projectMilestone->complete = 0;
                    }
                    $projectMilestone->save();
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
            $user = User::query()->find(auth()->user()->id);
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $projectStage = ProjectStage::query()->get();
            $lookingFor = MasterLookingFor::query()->get();
            $UserProject = UserProject::query()->get();

            $projectPreview = [];
            $projectPreview = UserProject::query()->where('id',$_REQUEST['id'])->get();

            return view('website.user.project.project_preview', compact('projectPreview','user','languages','country','lookingFor','UserProject'));
        } catch (Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function publicView($id)
    {
        try {            
            $UserProject = UserProject::query()->where('id',$id)->first();
            $projectData = UserProject::query()->with(['user','genres','projectCategory','projectLookingFor','projectLanguages','projectCountries','projectMilestone','projectType','projectStageOfFunding','projectStage'])->where('id',$id)->get();
            $projectData = $projectData->toArray();

            return view('website.user.project.project_public_view', compact('UserProject','projectData'));

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
            return json_encode($ProjectVideos);
        } catch (Exception $e) {
            return json_encode([]);

        }
        
    }

}
