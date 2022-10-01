<?php

namespace App\Http\Controllers;

use App\Models\MasterCountry;
use App\Models\MasterLanguage;
use App\Models\MasterLookingFor;
use App\Models\ProjectAssociation;
use App\Models\ProjectCountry;
use App\Models\ProjectGenre;
use App\Models\ProjectLanguage;
use App\Models\ProjectLookingFor;
use App\Models\ProjectMilestone;
use App\Models\User;
use App\Models\UserProject;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projectViewRender($nextPage = '')
    {
        
        try {
            $user = User::query()->find(auth()->user()->id);
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $lookingFor = MasterLookingFor::query()->get();
            if (isset($_REQUEST['nextPage'])) {
                $nextPage = $_REQUEST['nextPage'];
            }
            
            switch ($nextPage) {
                case 'Details':
                    return view('user.project.project_details', compact('user','languages','country'));
                    break;
                case 'Description':
                    return view('user.project.project_description', compact('user','languages','country'));
                    break;
                case 'Gallery':
                    return view('user.project.project_gallery', compact('user','languages','country'));
                    break;
                case 'Req&milestone':
                    return view('user.project.project_milestones', compact('user','languages','country','lookingFor'));
                    break;
                case 'Preview':
                    return view('user.project.project_preview', compact('user','languages','country'));
                    break;            
                default:
                    return view('user.project.project_overview', compact('user','languages','country'));
            }
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
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
                // return view('user.project.project_details');
                return redirect()->route('project-create',['nextPage' => 'Details'])->with("success","User overview updated successfully.");

            }
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
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

                    foreach ($request->gener as $k => $v) {
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
            return back()->withError('Somethig went wrong.');
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
                    
                    return redirect()->route('project-create',['nextPage' => 'Req&milestone'])->with("success","Project description updated successfully.");
                } else {
                    return back()->with("error","Please overview phase fill.");
                }
            }
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
        }
    }

    // public function galleryStore(Request $request,$id)
    // {
    //     try {
    //         $user = User::query()->find(auth()->user()->id);
    //         $gallery = UserProject::query()->find($id)->latest()->first();
    //         if (isset($gallery)) {
                
    //             $gallery->logline = $request->logline;
    //             $gallery->synopsis = $request->synopsis;
    //             $gallery->director_statement = $request->director_statement;
    //             if($gallery->update()) {
                    
    //                 return redirect()->route('project-create',['nextPage' => 'Req & milestone'])->with("success","Project description updated successfully.");
    //                 // return redirect()->route('project-create',['nextPage' => 'Gallery'])->with("success","Project description updated successfully.");
    //             } else {
    //                 return back()->with("error","Please overview phase fill.");
    //             }
    //         }
    //     } catch (Exception $e) {
    //         return back()->withError('Somethig went wrong.');
    //     }
    // }    
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
            return back()->withError('Somethig went wrong.');
        }
    }    
}
