<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\WebController;
use App\Models\User;
use App\Models\UserSubscription;
use App\Notifications\FreeSubRenewalBeforeExpiration;
use App\Notifications\FreeTrialExpiration;
use App\Notifications\SubRenewalAfterExpiration;
use App\Notifications\SubRenewalBeforeExpiration;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CustomNotification extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function freeTrialExpired($id)
    {
        $user=User::find($id);
        $userSubScription=UserSubscription::query()->where('user_id',$id)->first();
        if($userSubScription->platform_subscription_id=="free"){
            $collect  = collect();
            $collect->put('first_name', ucwords($user->name));
            $collect->put('currency', $userSubScription->currency);
            $collect->put('plan_amount', $userSubScription->plan_amount);
            Notification::route('mail', $user->email)->notify(new FreeTrialExpiration($collect));
            
        }
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscriptionBeforeExpire($id)
    {
        $user=User::find($id);
        $userSubScription=UserSubscription::query()->where('user_id',$id)->first();
        $collect  = collect();
        $collect->put('first_name', ucwords($user->name));
        $collect->put('currency', $userSubScription->currency);
        $collect->put('plan_amount', $userSubScription->plan_amount);
        $collect->put('plan_start_date', date("d-m-Y",strtotime($userSubScription->subscription_end_date,'+1days'))) ;
        $collect->put('plan_name',$userSubScription->plan_name) ;
        Notification::route('mail',$user->email)->notify(new SubRenewalBeforeExpiration($collect));
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subscriptionAfterExpire($id)
    {
        $user=User::find($id);
        $userSubScription=UserSubscription::query()->where('user_id',$id)->first();
        $collect  = collect();
        $collect->put('first_name', ucwords($user->name));
        $collect->put('plan_name', ucwords($userSubScription->plan_name));
        Notification::route('mail', $user->email)->notify(new SubRenewalAfterExpiration($collect));
        return true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function freeSubscriptionBeforeExpire($id)
    {
        $user=User::find($id);
        $userSubScription=UserSubscription::query()->where('user_id',$id)->first();
        $collect  = collect();
        $collect->put('first_name', ucwords($user->name));
        $collect->put('currency', $userSubScription->currency);
        $collect->put('plan_amount', $userSubScription->plan_amount);
        $collect->put('plan_end_date', date("d-m-Y",strtotime($userSubScription->subscription_end_date))) ;
        Notification::route('mail',$user->email)->notify(new FreeSubRenewalBeforeExpiration($collect));
        return true;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
