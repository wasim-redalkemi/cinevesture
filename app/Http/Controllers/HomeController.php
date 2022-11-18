<?php

namespace App\Http\Controllers;

use App\Models\MasterCountry;
use App\Models\MasterLanguage;
use App\Models\MasterLookingFor;
use App\Models\MasterProjectCategory;
use App\Models\MasterProjectGenre;
use App\Models\MasterSkill;
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
    
        return view('main',compact(['countries','languages','geners','categories','looking_for','project_stages']));
       
    }

}
