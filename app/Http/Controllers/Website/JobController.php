<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MasterCountry;
use App\Models\MasterEmployement;
use App\Models\MasterSkill;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Views
     
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
        $emplyements = MasterEmployement::all();

        return view('website.job.post_a_job',compact('countries','skills','emplyements'));
    }




    // functions



}
