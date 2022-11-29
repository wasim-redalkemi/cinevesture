<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Plans;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // Views 
    



    // Functionality

    public function storeSubscription( Request $request)
    {
        try{ $plan = Plans::find($request->id);
             $subscription = new UserSubscription();
             $subscription->user_id = auth()->user()->id;
             $subscription->platform_subscription_id = "1";
             $subscription->platform_cutomer_id = "1";
             $subscription->plan_id = $plan->id;
             $subscription->plan_amount = $plan->plan_amount;
             $subscription->subscription_start_date = Carbon::now();
             $subscription->subscription_end_date = Carbon::now();
             $subscription->status = "active";
             $subscription->save();

             return redirect()->route('home');

        }catch(Exception $e){

        }
    }
}
