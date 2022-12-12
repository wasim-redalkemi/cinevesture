<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\MasterPlanModule;
use App\Models\MasterPlanOperation;
use App\Models\VenuePlan;
use App\Models\Plan;
use App\Models\Plans;
use Illuminate\Http\Request;
Use App\Models\User;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Stripe;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;

class checkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             
    }
    
   public function checkout(Request $request)
    {   try{ 
        $plan = Plans::find($request->id);
        $id =auth()->user()->id;

        if($plan->name == 'Free'){
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
                        ['price' =>  $plan->plan_amount, 'quantity' => 1],            
                    ],
                    'mode' => 'subscription',
                    // 'success_url' => config("app.url").'Stripe/success/'.$location_id,
                    // 'cancel_url' =>  config("app.url").'Stripe/cancel/'.$location_id,
                     "metadata" => [
                        "user_id" =>$id,
                        "plan_id"=> $plan->id,
                        ],
                ]);

        }

          
        $checkoutUrl=$checkoutSesssion->url;
        return redirect($checkoutUrl);  
    }catch(Exception $e){

    } 
     
  }
}
