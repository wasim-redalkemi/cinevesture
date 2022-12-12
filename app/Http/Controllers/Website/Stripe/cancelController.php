<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
class cancelController extends Controller
{
    public function cancelCheckout(Request $request,$Id)
    {
       try{
            $stripe = new \Stripe\StripeClient(config('constants.SECRET_KEY'));
            $location = Location::find($Id);
                if($location){
                    $location->checkout_session_Id = '';
                    $location->save();
                }
           throw new Exception("Something went wrong. Please try again.");
         }
       catch(\Exception $e)
        {
            Session::flash('response', ['text'=>$e->getMessage(),'type'=>'danger']);
            return back(); 
        }
    }   
}
