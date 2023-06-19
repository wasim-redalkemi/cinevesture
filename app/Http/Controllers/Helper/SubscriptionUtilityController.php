<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Website\SubscriptionController;
use App\Models\SubscriptionOrder;
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
        if(!empty($subscription)){
            return true;
        }else{
            return false;
        }
    }
    public static function isUserSubscribe()
    {
        $resp = true;
        if(!session()->has('user_subscription_end_date')) {
            $userSubScription=UserSubscription::query()->where('user_id',auth()->user()->id)->where('status','active')->first();
            if(!empty($userSubScription)){
                Session::put('user_subscription_end_date',$userSubScription->subscription_end_date);
            }
            else
            {
                $resp = false;
            }
        }
        
        if(!empty(session()->get('user_subscription_end_date')) && session()->get('user_subscription_end_date')< Carbon::now())
        {
            $userSubScription=UserSubscription::query()->where('user_id',auth()->user()->id)->first();
            $userSubScription->status="inactive";
            $userSubScription->save();
            $resp = false;
        }
        return $resp;
    }
}
