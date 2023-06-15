<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Stripe\Subscription;

class SubscriptionUtilityController extends Controller
{
    public static function isSubscribed()
    {
        $subscription = UserSubscription::query()->where('user_id',auth()->user()->id)->where('status','active')->first();
        if($subscription){
            return true;
        }else{
            return false;
        }
    }
    public static function isUserSubscribe()
    {
        if (!session()->has('user_subscription_end_date')) {
            $userSubScription=UserSubscription::query()->where('user_id',auth()->user()->id)->first();
            Session::put('user_subscription_end_date',$userSubScription->subscription_end_date??"");
            if(!session()->has('user_subscription_end_date')){

                return false;
            }
        }
       
        if(session()->get('user_subscription_end_date')< Carbon::now() ){
            // $userSubScription=UserSubscription::query()->where('user_id',auth()->user()->id);
            if(isset($userSubScription)){
                if ($userSubScription->subscription_end_date<Carbon::now()) {
                    $userSubScription->status="inactive";
                    $userSubScription->save();
                    return false;
                }

            }else{
                return false;
            }
        }else{
            return true;
        }
        // session()->get('subscription_end_date');
    }
}
