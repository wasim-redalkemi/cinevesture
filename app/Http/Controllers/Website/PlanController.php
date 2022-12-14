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
                 ->where(function($q) use($request){
                    if(isset($request->plan_time)){
                     $q->where('plan_time',$request->plan_time);
                    }else{
                        $q->where('plan_time','m');  
                    }

                    if(isset($request->currency)){
                        $q->where('currency',$request->currency);
                       }else{
                         $q->where('currency','INR');
                       }
                 })
              
                 ->get();
        $modules = MasterPlanModule::all();
        
        return view('website.user.subscription.index',compact('plans','modules'));
    }




    // Functions


}
