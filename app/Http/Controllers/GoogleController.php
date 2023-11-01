<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Helper\SubscriptionUtilityController;
use App\Models\MasterPlanModule;
use App\Models\MasterPlanOperation;
use App\Models\Plans;
use App\Models\User;
use App\Notifications\SignUpConfirmation;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{   
    use RegistersUsers;
    
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            
            $user = Socialite::driver('google')->user();

            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            $isSignUp = false;
            if(!$is_user){


                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'first_name' => $user['given_name'],
                    'last_name' => @$user['family_name'],
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'email_verified_at' => date('Y-m-d H:i:s'),
                ]);
                $isSignUp = true;
            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                // $saveUser = User::where('email', $user->getEmail())->first();
            }
            $saveUser = User::where('email', $user->getEmail())->with('getSubscription')->first();
            if ($isSignUp) {
                $collect  = collect();
                $collect->put('first_name', $saveUser->first_name);
                $saveUser->notify(new SignUpConfirmation($collect));
            }
            Auth::loginUsingId($saveUser->id);  
            $is_subscribed = SubscriptionUtilityController::isSubscribed();
                    if($is_subscribed){
                        $checkPlan= new LoginController();
                        $checkPlan->expirePlanForGoogle();
                        return redirect('home');
                        if($user->getSubscription){
                            $plans = Plans::query()->where('id',$user->getSubscription->plan_id)->with('getRelationalData.getModule','getRelationalData.getOperation')
                            ->first();
                            $module = MasterPlanModule::all();
                            $action = MasterPlanOperation::all();
                            $this->session()->put('permission',$plans->getRelationalData);
                            $this->session()->put('module',$module);
                            $this->session()->put('action',$action);
                        }  
                    }else{
                        return redirect()->route('plans-view')->with('success','Email Verified successfully.');
                    }              
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('error', 'Something went wrong!');
        }
    }
}