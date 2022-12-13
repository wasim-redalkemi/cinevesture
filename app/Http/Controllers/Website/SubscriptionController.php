<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MasterPlanModule;
use App\Models\MasterPlanOperation;
use App\Models\Plans;
use App\Models\SubscriptionOrder;
use App\Models\User;
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
        try{ 
        $plan = Plans::find($request->id);
        $id =auth()->user()->id;

        if($plan->plan_name == 'Free'){
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
             $user = User::query()->with('getSubcription')->where('id',auth()->user()->id)->first();

             $plans = Plans::query()->where('id',$user->getSubcription->plan_id)->with('getRelationalData.getModule','getRelationalData.getOperation')
             ->first();
             $action = MasterPlanOperation::all();
             $module = MasterPlanModule::all();
             $request->session()->put('permission',$plans->getRelationalData);
             $request->session()->put('module',$module);
             $request->session()->put('action',$action);
             return redirect()->route('home')->with('success','Subsription completed Successfully');
        }else{
              
            $stripe = new \Stripe\StripeClient(config('constants.SECRET_KEY'));
            $checkoutSesssion=$stripe->checkout->sessions->create(
                [
                    'line_items' => [
                        ['price_data'=>[
                            'currency'=>strtolower($plan->currency),
                            'product_data'=>['name'=>$plan->plan_name],
                            'unit_amount'=>$plan->plan_amount*100,
                        ], 'quantity' => 1,            
                    ]],
                    'mode' => 'payment',
                    'success_url' => route('home'),
                    'cancel_url' =>  route('home'),
                     "metadata" => [
                        "user_id" =>$id,
                        "plan_id"=> $plan->id,
                        ],
                ]);

        }
        $order = new SubscriptionOrder();
        dd($checkoutSesssion);
        $order->order_id = time();
        $order->payment_intent = $checkoutSesssion->payment_intent;
        $order->plan_id = $plan->id;
        $order->payment_intent = $checkoutSesssion->payment_intent;
        $order->payment_intent = $checkoutSesssion->payment_intent;
        $order->payment_intent = $checkoutSesssion->payment_intent;
        $order->payment_intent = $checkoutSesssion->payment_intent;


        $checkoutUrl=$checkoutSesssion->url;

        return redirect($checkoutUrl);  
    }catch(Exception $e){
        return back()->with('error', $e->getMessage());
    } 
    }
}
