<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse; 

class OtpController extends WebController
{
    public function index(Request $request){
        $user = User::query()->where('email',$request->email)->first();
        return view('website.auth.otp',compact('user'));
      
    }
    
    // After Login OTP verify
    public function otpVerify(Request $request) 
    {
        try {
           
                $userObj = User::query()
                    ->where("id", auth()->user()->id)
                    ->first();
                $otpObj = Otp::query()
                    ->where("user_id", $userObj->id)
                    ->where("otp",$request->otp)
                    ->where("type", 'R')
                    ->first();

                if (!$otpObj) {
                    return back()->with('error', 'Invalid OTP.');
                }
               
                 return redirect()->route('password-change-view');
              
            
        } catch (Exception $e) {
            return back()->with( 'error','Something went wrong.');
        }
    }

}
