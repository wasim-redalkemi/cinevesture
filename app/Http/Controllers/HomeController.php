<?php

namespace App\Http\Controllers;

use App\Models\MasterCountry;
use App\Models\MasterLanguage;
use App\Models\MasterLookingFor;
use App\Models\MasterProjectCategory;
use App\Models\MasterProjectGenre;
use App\Models\MasterSkill;
use App\Models\ProjectList;
use App\Models\ProjectListProjects;
use App\Models\ProjectStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $countries = MasterCountry::all();
        $languages = MasterLanguage::all();
        $geners = MasterProjectGenre::all();
        $categories = MasterProjectCategory::all();
        $looking_for = MasterLookingFor::all();
        $project_stages = ProjectStage::all();
        
        $project_list_project = ProjectList::query()->where('status','published')->with(['lists'=>function($q){
            $q->where('admin_status','active')
            ->where('user_status','published');
        },'lists.genres','lists.projectCountries','lists.projectLanguages','lists.projectImage'])
        ->get();
        $project_lists_carousel = (isset($project_list_project[0]))?$project_list_project[0]:[];
        unset($project_list_project[0]);
        $project_lists_except_carousel = $project_list_project;
    
        return view('main',compact(['countries','languages','geners','categories','looking_for','project_stages','project_lists_carousel','project_lists_except_carousel']));
       
    }

}
