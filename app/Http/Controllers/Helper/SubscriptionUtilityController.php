<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\UserSubscription;
use Illuminate\Http\Request;

class SubscriptionUtilityController extends Controller
{
    public static function isSubscribed()
    {
        $subscription = UserSubscription::query()->where('user_id',auth()->user()->is)->where('status','active')->first();
        if($subscription){
            return true;
        }else{
            return false;
        }
    }
}
