<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse; 

class OtpController extends Controller
{
    public function index(Request $request){
        $user = User::query()->where('email',$request->email)->first();
        return view('auth.otp',compact('user'));
      
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
            return back()->with('error', 'Somethig went wrong.');
        }
    }

    public static function createOtp($user,$type)
    {   $otp = Otp::query()->where('user_id',$user->id)->where('type',$type)->latest()->first();
        if(!$otp){
           $otp = new Otp();
        }
        $otp->user_id = $user->id;
        $otp->otp = rand(100000,999999);
        $otp->type = $type;
        $otp->expiry_date = Carbon::now()->addMinutes(5)->timestamp;
        $otp->save();
        return $otp->otp;
    }
}
