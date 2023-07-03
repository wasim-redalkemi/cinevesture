<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\WebController;
use App\Models\MasterPlanModule;
use App\Models\Plans;
use App\Models\SubscriptionOrder;
use Illuminate\Http\Request;

class PlanController extends WebController
{
    //view 
    
    public function showPlans(Request $request)
    {    
        $freeTrial=false;                
        $plans = Plans::query()->with('getRelationalData.getModule','getRelationalData.getOperation')
                 ->where(function($q) use($request){
                    // if(isset($request->plan_time)){
                    //  $q->where('plan_time',$request->plan_time);
                    // }else{
                    //     $q->where('plan_time','m');  
                    // }
                    $q->where('plan_time','y');  

                    if(isset($request->currency)){
                        $q->where('currency',$request->currency);
                       }else{
                         $q->where('currency','INR');
                       }
                 })
              
                 ->get();
         $subscriptionOrder=SubscriptionOrder::query()->where('user_id',auth()->user()->id)->first();
         if (empty($subscriptionOrder)) {
            $freeTrial=true; 
         }
          
        $modules = MasterPlanModule::all();
        return view('website.user.subscription.index',compact('plans','modules','freeTrial'));
    }




    // Functions


}
