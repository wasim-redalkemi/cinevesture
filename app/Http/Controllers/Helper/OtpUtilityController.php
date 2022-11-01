<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OtpUtilityController extends Controller
{
    public static function createOtp($user,$type,$token=null)
    {   $otp = Otp::query()->where('user_id',$user->id)->where('type',$type)->latest()->first();
        if(!$otp){
           $otp = new Otp();
        }
        $otp->user_id = $user->id;
        $otp->otp = rand(100000,999999);
        if (!is_null($token)) {
            $otp->token = $token;
        }
        $otp->type = $type;
        $otp->expiry_date = Carbon::now()->addMinutes(5)->timestamp;
        $otp->save();
        return $otp->otp;
    }
}
