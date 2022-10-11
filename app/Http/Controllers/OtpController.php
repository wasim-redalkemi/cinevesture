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

    public function otpVerify(Request $request)
    {  
        try {
            // dd(auth()->user());
            // // validate request data.
            // $validator = Validator::make($request->all(), [
            //     'email' => 'required|email|exists:users,email',
            // ], [
            //     'email.required' => 'Something went wrong. Try again.',
            //     'email.email' => 'Something went wrong. Try again.',
            //     'email.exists' => 'Something went wrong. Try again.'
            // ]);
            // if ($validator->fails()) {
            // return back()->withErrors($validator->errors()->messages())->withInput();
            // } else {
            //     $user = User::query()->find(auth()->user()->id);
            // dd($user);

            //     dd($user);
            // session()->forget('key');
        // $email = session()->pull('email', 'default');
        // var_dump($email);
        // die;
                $userObj = User::query()
                    ->where("email", $request->email)
                    ->first();
                if (!empty($userObj)) {
                    $otpObj = Otp::query()
                        ->where("user_id", $userObj->id)
                        ->where("otp", $request->otp)
                        ->latest()
                        ->first();
        
                    if (empty($otpObj)) {
                    return back()->with('error','Invalid otp.');
                    }

                    $userObj->email_verified_at = Carbon::now();
                    $userObj->save();
                    $this->guard()->login($userObj);
            
                    return $request->wantsJson()
                                ? new JsonResponse([], 201)
                                : redirect($this->redirectPath());                    
                    
                // }else{
                //     // return $this->returnResponse(false, "ERR032", config('error_codes.verify_otp.ERR032'), null, null);
                // }
            }
        } catch (Exception $e) {
        return back()->withError('Somethig went wrong.');
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
