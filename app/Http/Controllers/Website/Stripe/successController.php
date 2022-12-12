<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\VenuePlan;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Stripe;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class SuccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$Id)
    {
        $stripe = new \Stripe\StripeClient(config('constants.0'));
        $location= Location::query()->select('checkout_session_Id')->find($Id);
        $checkout_session_id=$location->checkout_session_Id;
        $checkout_status=$stripe->checkout->sessions->retrieve(
            $checkout_session_id,
            []
        );
        
        $plan_id=$checkout_status->metadata->plan_id;
        $user_id=$checkout_status->metadata->user_id;               
        $stripe_customer_id=$checkout_status->customer;
        $expires_at=$checkout_status->expires_at;          
        if(!empty($checkout_session_id)){
            $stripeId= User::find($user_id);
            $stripeId->stripe_id=$stripe_customer_id;
            $stripeId->save();
            $end_date=date('Y-m-d h:i:s', $expires_at);
            try{            
                  
                    $plan = Plan::query()->where('id',$plan_id)->first();
                    $validity_days =  $plan->validity_in_days; 
                    $end_date  =  Carbon::now()->addDays($validity_days);
                    $old_plan= VenuePlan::query()->where('venue_id',$user_id)->first();
                    if(isset($old_plan)){
                        $old_plan->is_expired = 1;
                        $old_plan->save();
                    }
                    $venuePlan = new VenuePlan();
                    $venuePlan->plan_id= $plan_id;
                    $venuePlan->venue_id = $user_id;
                    $venuePlan->start_date =  Carbon::now();
                    $venuePlan->end_date = $end_date;
                    $venuePlan->is_expired = 0;//active
                    $venuePlan->save();
                    
                    Session::flash('response', ['text'=>'Subsription completed Successfully','type'=>'success']);
                    return redirect('home');
                } 
                catch(\Exception $e)
                {
                    Session::flash('response', ['text'=>$this->getError($e->getMessage()),'type'=>'danger']);
                    return back(); 
                }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
