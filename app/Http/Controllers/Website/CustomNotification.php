<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSubscription;
use App\Notifications\FreeTrialExpiration;
use App\Notifications\SubRenewalAfterExpiration;
use App\Notifications\SubRenewalBeforeExpiration;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CustomNotification extends Controller
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
    public function freeSubExpired($id)
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
        $collect->put('plan_start_date', date("d-m-Y",strtotime($userSubScription->subscription_start_date))) ;
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
        $collect  = collect();
        $collect->put('first_name', ucwords($user->name));
        Notification::route('mail', $user->email)->notify(new SubRenewalAfterExpiration($collect));
        return true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
