<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MasterPlanModule;
use App\Models\MasterPlanOperation;
use App\Models\Plans;
use App\Models\SubscriptionOrder;
use App\Models\User;
use App\Models\UserSubscription;
use App\Notifications\FreeTrialDetail;
use App\Notifications\MembershipConfirmation;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class SubscriptionController extends Controller
{
    // Views 
    // Functionality
    public function createOrder(Request $request)
    {
        try {
            $plan = Plans::find($request->id);
            $id = auth()->user()->id;
            if ($plan->plan_name == 'Free') {
                
                $subscriptionData=[
                    'user_id'=>$id,
                    'plan_amount'=> $plan->plan_amount,
                    'plan_name' =>$plan->plan_name,
                    'currency' =>$plan->currency,
                    'plan_time' =>$plan->plan_time,
                    'plan_time_quntity' => $plan->plan_time_quntity,
                    // 'subscription_start_date' = Carbon::now(), // for free plan 
                    'total_days' => $plan->plan_time_quntity,
                    'subscription_end_date' => Carbon::now()->addDays($plan->plan_time_quntity), // for free plan 
                    'order_id' => '1',
                    'plan_id' => $plan->plan_id
            
                   ];
                   $subscriptionData = (object) $subscriptionData;
                $this->createSubscription($subscriptionData, $request);
                $this->setUserPlanInSession($id);
                return redirect()->route('home')->with('success', 'Subsription completed Successfully');
            } else {

                // }
                $is_used_for_subscription="1";
                $userSubscription=UserSubscription::query()->where('user_id',auth()->user()->id)->first();
                if(isset($userSubscription) && $userSubscription->order_id==NULL && $userSubscription->plan_time=='m' && $userSubscription->subscription_end_date > carbon::now()){
                        // dd($userSubscription->subscription_end_date);
                    if(($userSubscription->plan_name=='Basic' && $plan->plan_name=="Pro") 
                    || ($userSubscription->plan_name=='Basic' && $plan->plan_name=="Enterprise") ||
                     ($userSubscription->plan_name=='Pro' && $plan->plan_name=="Enterprise")){
                        //nothing to do
                    }
                    elseif(($userSubscription->plan_name=='Enterprise' && $plan->plan_name=="Pro") 
                    || ($userSubscription->plan_name=='Enterprise' && $plan->plan_name=="Basic") ||
                     ($userSubscription->plan_name=='Pro' && $plan->plan_name=="Basic")|| 
                     ($userSubscription->plan_name== $plan->plan_name)){
                        $is_used_for_subscription="0";
                    }
                }
                $order = new SubscriptionOrder();
                $order->plan_id = $plan->id;
                $order->user_id = auth()->user()->id;
                $order->plan_name = $plan->plan_name;
                $order->plan_amount = $plan->plan_amount;
                // if(isset($is_used_for_subscription) && !empty($is_used_for_subscription)){
                $order->is_used_for_subscription = $is_used_for_subscription;
                // }
                if ($plan->currency=='INR') {
                    $gstamt=$plan->plan_amount*18/100;
                    $withoutgst=$plan->plan_amount-$gstamt;
                    $order->taxable = $withoutgst;
                    $order->gst = $gstamt;
                }
                $order->currency = $plan->currency;
                $order->plan_time = $plan->plan_time;
                $order->plan_time_quntity = $plan->plan_time_quntity;
                $order->status = 'pending';
                $order->save();
                $stripe = new \Stripe\StripeClient(config('constants.SECRET_KEY'));
                $checkoutSesssion = $stripe->checkout->sessions->create(
                    [
                        'line_items' => [
                            [
                                'price_data' => [
                                    'currency' => strtolower($plan->currency),
                                    'product_data' => ['name' => $plan->plan_name],
                                    'unit_amount' => $plan->plan_amount * 100,
                                ], 'quantity' => 1,
                            ]
                        ],
                        'mode' => 'payment',
                        'success_url' => route('subscription-success', ['order_id' => $order->id]),
                        'cancel_url' =>  route('subscription-failed'),
                        "metadata" => [
                            "user_id" => $id,
                            "plan_id" => $plan->id,
                        ],
                    ]
                );
            }
            $order->payment_intent = $checkoutSesssion->payment_intent;
            $order->order_id = $checkoutSesssion->id;
            $order->save();



            $checkoutUrl = $checkoutSesssion->url;

            return redirect($checkoutUrl);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function paymentSuccess(Request $request)
    {
        try {
            $stripe = new \Stripe\StripeClient(config('constants.SECRET_KEY'));
            $order = SubscriptionOrder::find($request->order_id);
            $subscriptionData=[
                'user_id'=>$order->user_id,
                'plan_amount'=> $order->plan_amount,
                'plan_name' =>$order->plan_name,
                'currency' =>$order->currency,
                'plan_time' =>$order->plan_time,
                'plan_time_quntity' => $order->plan_time_quntity,
                // 'subscription_start_date' = Carbon::now(), // for free plan 
                'total_days' => $order->plan_time_quntity,
                'subscription_end_date' => date('Y-m-d 23:59:59',strtotime('+'.$order->plan_time_quntity.'days')),//Carbon::now()->addDays($order->plan_time_quntity), // for free plan 
                'order_id' => $order->order_id,
                'plan_id' => $order->plan_id
        
               ];
               $subscriptionData = (object) $subscriptionData;
            $session_id = $order->order_id;
            $checkout_status = $stripe->checkout->sessions->retrieve(
                $session_id,
                []
            );

            if ($checkout_status->payment_status == 'paid') {
                if($order->is_used_for_subscription=="1"){
                $subscription = $this->createSubscription($subscriptionData, $request);
                }else{
                $subscription = UserSubscription::query()->where('user_id',auth()->user()->id)->first();
                }
                $this->setUserPlanInSession(auth()->user()->id);
                $order->status='success';
                $order->save();
                $collect  = collect();
                $collect->put('first_name', ucwords(auth()->user()->first_name));
                $collect->put('currency', $subscription->currency);
                $collect->put('plan_amount', $subscription->plan_amount);
                $collect->put('plan_name', $subscription->plan_name);
                Notification::route('mail', auth()->user()->email)->notify(new MembershipConfirmation($collect));
            }
            return redirect()->route('profile-create')->with('success', 'Subcription completed Successfully');


        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, Please try again later. '.$e->getMessage());
        }
    }

    public function paymentFailed(Request $request)
    {
        try {
            if(isset($request->order_id)){
                $stripe = new \Stripe\StripeClient(config('constants.SECRET_KEY'));
                $order = SubscriptionOrder::find($request->order_id);
                $order->status = 'error';
                $order->save();
            }
         
            return redirect()->route('plans-view')->with('error', 'Payment Failed. Please try after sometime.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, Please try again later.');
        }
    }


    public function createSubscription($data, $request = null)
    {   
        $subscription = UserSubscription::where('user_id',$data->user_id)->first();
        if(!$subscription){
            $subscription = new UserSubscription();
        }
        $subscription->user_id = $data->user_id;
        $subscription->platform_cutomer_id = "1"; //stripe
   
        $subscription->plan_amount = $data->plan_amount;
       
        $subscription->plan_name = $data->plan_name;
        $subscription->currency = $data->currency;
        $subscription->plan_time = $data->plan_time;
        $subscription->plan_time_quntity = $data->plan_time_quntity;
        $subscription->subscription_start_date = Carbon::now(); // for free plan 
        $total_days = $data->plan_time_quntity;
        $subscription->subscription_end_date = $data->subscription_end_date; // for free plan 
        $subscription->platform_subscription_id = $data->order_id; // free plan
        $subscription->plan_id = $data->plan_id;

            // if ($data->plan_time == 'm') {
            //     $total_days = 30 * $data->plan_time_quntity;
            //     $end_date  = Carbon::now()->addDays($total_days);
            // } else {
                // if (isset($data->id)) {
        // $subscription->platform_subscription_id = $data->order_id; // stripe
        $subscription->status = "active";
        $subscription->save();
        session()->put('user_subscription_end_date',$subscription->subscription_end_date);
        // $value = $request->session()->pull('key', 'default');


        return $subscription;
    }

    private function setUserPlanInSession($userId)
    {
        $user = User::query()->with('getSubcription')->where('id', $userId)->first();

        $plans = Plans::query()->where('id', $user->getSubcription->plan_id)->with('getRelationalData.getModule', 'getRelationalData.getOperation')
            ->first();
        $action = MasterPlanOperation::all();
        $module = MasterPlanModule::all();
        session()->put('permission', $plans->getRelationalData);
        session()->put('module', $module);
        session()->put('action', $action);
    }

    public function createPlanForChildUser($user_id)
    {
       $user=User::find($user_id);
       $userId=$user->id;
       $parentUserSubscription=UserSubscription::query()->where('user_id',$user->parent_user_id)->where('status','active')->first();
       $subscriptionData=[
        'user_id'=>$userId,
        'plan_amount'=> $parentUserSubscription->plan_amount,
        'plan_name' =>$parentUserSubscription->plan_name,
        'currency' =>$parentUserSubscription->currency,
        'plan_time' =>$parentUserSubscription->plan_time,
        'plan_time_quntity' => $parentUserSubscription->plan_time_quntity,
        // 'subscription_start_date' = Carbon::now(), // for free plan 
        'total_days' => $parentUserSubscription->plan_time_quntity,
        'subscription_end_date' => $parentUserSubscription->subscription_end_date,
        'order_id' => $parentUserSubscription->platform_subscription_id,
        'plan_id' => $parentUserSubscription->plan_id

       ];
       $subscriptionData = (object) $subscriptionData;
       
       $this->createSubscription($subscriptionData,null);
       
    }
    // Billing details
    public function getBilling(Request $request)
    {
        try{
             $order=NULL;
                $subscription = UserSubscription::query()->where('user_id',auth()->user()->id)->with('user')->first();
                $order = SubscriptionOrder::query()->where('user_id',auth()->user()->id)->where('is_used_for_subscription','0')->first();
                return view('website.membership_billing.membership_billing',compact('subscription',"order"));
        }catch(Exception $e){

        }
    }

    public function createFreeOrder(Request $request)
    {
        $subscriptionOrder=SubscriptionOrder::query()->where('user_id',auth()->user()->id)->first();
       
         if (!empty($subscriptionOrder)) {
           return back()->with('error',"something went wrong");
         }
         $plan = Plans::find($request->id);
         $order = new SubscriptionOrder();
                $order->plan_id = $plan->id;
                $order->user_id = auth()->user()->id;
                $order->plan_name = $plan->plan_name;
                $order->plan_amount = $plan->plan_amount;
                $order->currency = $plan->currency;
                $order->plan_time = "m";
                $order->plan_time_quntity = 30;
                $order->status = 'pending';
                $order->save();
                // $request->session()->put('freeToastmsg',true);
                $subscriptionData=[
                    'user_id'=>$order->user_id,
                    'plan_amount'=> $order->plan_amount,
                    'plan_name' =>$order->plan_name,
                    'currency' =>$order->currency,
                    'plan_time' =>"m",
                    'plan_time_quntity' => 30,
                    // 'subscription_start_date' = Carbon::now(), // for free plan 
                    'total_days' => 30,
                    'subscription_end_date' => date('Y-m-d 23:59:59',strtotime('+30days')),//Carbon::now()->addDays(30), // for free plan 
                    'order_id' => 'free',
                    'plan_id' => $order->plan_id
            
                   ];
                   $subscriptionData = (object) $subscriptionData;
                   $subscription = $this->createSubscription($subscriptionData);
                   $collect  = collect();
                    $collect->put('first_name', ucwords(auth()->user()->first_name));
                    $collect->put('currency', $order->currency);
                    $collect->put('plan_amount', $order->plan_amount);
                    $collect->put('amount_type', $order->currency);
                    $collect->put('plan_name', $order->plan_name);
                    $collect->put('Start_date', date('Y-m-d', strtotime($order->created_at)));
                    Notification::route('mail', auth()->user()->email)->notify(new FreeTrialDetail($collect));
                    return redirect()->route('home')->with('success', '30 day Free trial completed Successfully');

    }

    public function expMail() {
        $free=$this->FreePlanExp();
        $exp=$this->beforeSubExpire();
        $after=$this->afterSubExpire();
        return true;
    }

    public function FreePlanExp() {
        $userSubs=UserSubscription::query()->where('platform_subscription_id','free')
        ->whereBetween('subscription_end_date',[date('Y-m-d 00:00:00',strtotime('-1days')),date('Y-m-d 23:59:59',strtotime('-1days'))])->pluck('user_id');
        foreach ($userSubs as $key => $id) {
            $notification= new CustomNotification();
            $notification->freeSubExpired($id);
        }
        return true;
        
    }

    static function beforeSubExpire() {
        $userSubs=UserSubscription::query()
        ->whereBetween('subscription_end_date',[date('Y-m-d 00:00:00',strtotime('+5days')),date('Y-m-d 23:59:59',strtotime('+5days'))])
        ->pluck('user_id');
        foreach ($userSubs as $key => $id) {
           $notification  = new CustomNotification(); 
           $notification->subscriptionBeforeExpire($id);      
        }
        return true;
    }

    static function afterSubExpire() {
        $userSubs=UserSubscription::query()
        ->where('platform_subscription_id','!=',"free")
        ->whereBetween('subscription_end_date',[date('Y-m-d 00:00:00',strtotime('-1days')),date('Y-m-d 23:59:59',strtotime('-1days'))])
        ->pluck('user_id');
        foreach ($userSubs as $key => $id) {
           $notification  = new CustomNotification(); 
           $notification->subscriptionAfterExpire($id);      
        }
        return true;
    }
}
