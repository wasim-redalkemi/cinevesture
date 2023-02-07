<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MasterPlanModule;
use App\Models\MasterPlanOperation;
use App\Models\Plans;
use App\Models\SubscriptionOrder;
use App\Models\User;
use App\Models\UserSubscription;
use App\Notifications\MembershipConfarmation;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
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
                $this->createSubscription($plan, $request);
                return redirect()->route('home')->with('success', 'Subsription completed Successfully');
            } else {

                $order = new SubscriptionOrder();
                $order->plan_id = $plan->id;
                $order->user_id = auth()->user()->id;
                $order->plan_name = $plan->plan_name;
                $order->plan_amount = $plan->plan_amount;
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
            $session_id = $order->order_id;
            $checkout_status = $stripe->checkout->sessions->retrieve(
                $session_id,
                []
            );

            if ($checkout_status->payment_status == 'paid') {
                $subscription = $this->createSubscription($order, $request);
                
                $collect  = collect();
                $collect->put('first_name', ucwords(auth()->user()->first_name));
                $collect->put('currency', $subscription->currency);
                $collect->put('plan_amount', $subscription->plan_amount);
                $collect->put('plan_name', $subscription->plan_name);
                Notification::route('mail', auth()->user()->email)->notify(new MembershipConfarmation($collect));
            }
        

            return redirect()->route('profile-create')->with('success', 'Subcription completed Successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, Please try again later.');
        }
    }

    public function paymentFailed(Request $request)
    {
        try {
            $stripe = new \Stripe\StripeClient(config('constants.SECRET_KEY'));
            $order = SubscriptionOrder::find($request->order_id);
            $order->status = 'error';
            $order->save();
          

            return redirect()->route('plans-view')->with('error', 'Payment Failed. Please try after sometime.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, Please try again later.');
        }
    }


    public function createSubscription($data, $request = null)
    {   $subscription = UserSubscription::where('user_id',auth()->user()->id)->first();
        if(!$subscription){
            $subscription = new UserSubscription();
        }
        $subscription->user_id = auth()->user()->id;
        $subscription->platform_cutomer_id = "1"; //stripe
        $subscription->plan_amount = $data->plan_amount;
        $subscription->plan_name = $data->plan_name;
        $subscription->currency = $data->currency;
        $subscription->plan_time = $data->plan_time;
        $subscription->plan_time_quntity = $data->plan_time_quntity;
        $subscription->subscription_start_date = Carbon::now(); // for free plan 

        if ($data->plan_amount == 0.00) {
            $subscription->subscription_end_date = Carbon::now(); // for free plan 
            $subscription->platform_subscription_id = '1'; // free plan
            $subscription->plan_id = $data->id;
        } else {
            if ($data->plan_time == 'm') {
                $total_days = 30 * $data->plan_time_quntity;
                $end_date  = Carbon::now()->addDays($total_days);
            } else {
                $total_days = 365 * $data->plan_time_quntity;
                $end_date  = Carbon::now()->addDays($total_days);
            }
            $subscription->subscription_end_date = $end_date;
            $subscription->platform_subscription_id = $data->order_id; // stripe
            $subscription->plan_id = $data->plan_id;

        }
        $subscription->status = "active";
        $subscription->save();

        $user = User::query()->with('getSubcription')->where('id', auth()->user()->id)->first();

        $plans = Plans::query()->where('id', $user->getSubcription->plan_id)->with('getRelationalData.getModule', 'getRelationalData.getOperation')
            ->first();
        $action = MasterPlanOperation::all();
        $module = MasterPlanModule::all();
        $request->session()->put('permission', $plans->getRelationalData);
        $request->session()->put('module', $module);
        $request->session()->put('action', $action);
        return $subscription;
    }


    // Billing details
    public function getBilling(Request $request)
    {
        try{
                $subscription = UserSubscription::query()->where('user_id',auth()->user()->id)->first();
                return view('website.membership_billing.membership&billing',compact('subscription'));
        }catch(Exception $e){

        }
    }
}
