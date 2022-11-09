<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // Views 
    
    public function subscriptionView()
    {   
       return view('website.user.subscription.index');
    }



    // Functionality

    public function storeSubscription()
    {
        try{
             $subscription = new UserSubscription();
             $subscription->user_id = auth()->user()->id;
             $subscription->platform_subscription_id = "1";
             $subscription->platform_cutomer_id = "1";
             $subscription->plan_id = "1";
             $subscription->plan_amount = "1";
             $subscription->subscription_start_date = Carbon::now();
             $subscription->subscription_end_date = Carbon::now();
             $subscription->status = "active";
             $subscription->save();

             return redirect()->route('home');

        }catch(Exception $e){

        }
    }
}
