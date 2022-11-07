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
use App\Models\ProjectType;
use App\Models\User;
use App\Models\UserProject;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends WebController
{
    public function projectList()
    {
        try {
            $user = User::query()->find(auth()->user()->id);
        
            $UserProject = UserProject::query()->where('user_id',$user->id)->get();

            return view('website.user.project.project',compact('user','UserProject'));

        } catch (Exception $e) {
            return back()->withError('error','Something went wrong.');
        }
    }
    public function projectViewRender($nextPage = '',$id = null)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $lookingFor = MasterLookingFor::query()->get();
            $UserProject = UserProject::query()->get();
            $projectCountries = ProjectCountry::query()->get();
            $category = MasterProjectCategory::query()->get();
            $Genres = MasterProjectGenre::query()->get();
            $project_types = ProjectType::all();
            // dd($country);

           
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
                    return view('website.user.project.project_milestones', compact('user','languages','country','lookingFor'));
                    break;
                case 'Preview':
                    return view('website.user.project.project_preview', compact('user','languages','country','lookingFor','UserProject'));
                    break;            
                default:
                    return view('website.user.project.project_overview', compact(['user','languages','country','project_types']));
            }
        } catch (Exception $e) {
            return back()->withError('error','Something went wrong.');
        }
    }


    public function overviewStore(Request $request)
    {
        try {
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
                // return view('website.user.project.project_details');
                return redirect()->route('project-create',['nextPage' => 'Details'])->with("success","User overview updated successfully.");

            }
        } catch (Exception $e) {
            return back()->withError('error','Something went wrong.');
        }
    }
        
    public function detailsStore(Request $request,$id)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $details = UserProject::query()->find($id)->latest()->first();
            if (isset($details)) {
                
                $details->category_id = $request->category_id;
                $details->duration = $request->duration;
                $details->total_budget = $request->total_budget;
                $details->financing_secured = $request->financing_secured;
                if($details->update()) {

                    foreach ($request->category_id as $k => $v) {
                        ProjectGenre::query()->where('project_id', $details->id)->delete();
                        $projectGenres = new ProjectCategory();
                        $projectGenres->project_id = $details->id;
                        $projectGenres->category_id = $v;
                        $projectGenres->save();
                    }                
                    foreach ($request->gener as $k => $v) {
                        ProjectGenre::query()->where('project_id', $details->id)->delete();
                        $projectGenres = new ProjectGenre();
                        $projectGenres->project_id = $details->id;
                        $projectGenres->gener_id = $v;
                        $projectGenres->save();
                    }                
                    $projectAssociations = new ProjectAssociation();
                    $projectAssociations->project_id = $details->id;
                    $projectAssociations->project_associate_title = $request->project_associate_title;
                    $projectAssociations->project_associate_name = $request->project_associate_name;
                    $projectAssociations->save();
                    
                    return redirect()->route('project-create',['nextPage' => 'Description'])->with("success","Project details updated successfully.");
                } else {
                    return back()->with("error","Please overview phase fill.");
                }
            }
        } catch (Exception $e) {
            return back()->withError('error','Something went wrong.');
        }
    }

    public function descriptionStore(Request $request,$id)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $description = UserProject::query()->find($id)->latest()->first();
            if (isset($description)) {
                
                $description->logline = $request->logline;
                $description->synopsis = $request->synopsis;
                $description->director_statement = $request->director_statement;
                if($description->update()) {
                    
                    return redirect()->route('project-create',['nextPage' => 'Gallery'])->with("success","Project description updated successfully.");
                } else {
                    return back()->with("error","Please overview phase fill.");
                }
            }
        } catch (Exception $e) {
            return back()->withError('error','Something went wrong.');
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
                return back()->withError('error','Something went wrong.');
            }
    }

    public function milestoneStore(Request $request,$id)
    {
        try {
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
                    $projectMilestone->complete = $request->complete;
                    $projectMilestone->save();
                    return redirect()->route('project-create',['nextPage' => 'Preview'])->with("success","Project milestones updated successfully.");
                } else {
                    return back()->with("error","Please overview phase fill.");
                }
            }
        } catch (Exception $e) {
            return back()->withError('error','Something went wrong.');
        }
    }

}
