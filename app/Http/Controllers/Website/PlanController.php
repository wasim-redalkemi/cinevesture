<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MasterPlanModule;
use App\Models\Plans;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //view 
    
    public function showPlans(Request $request)
    {   
        $plans = Plans::query()->with('getRelationalData.getModule','getRelationalData.getOperation')
                 ->where('currency','INR')->get();
        $modules = MasterPlanModule::all();
        return view('website.user.subscription.index',compact('plans','modules'));
    }




    // Functions


}
