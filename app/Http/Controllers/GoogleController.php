<?php

namespace App\Http\Controllers;

use App\Models\MasterPlanModule;
use App\Models\MasterPlanOperation;
use App\Models\Plans;
use App\Models\User;
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
            if(!$is_user){

                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'email_verified_at' => date('Y-m-d H:i:s'),
                ]);
            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                // $saveUser = User::where('email', $user->getEmail())->first();
            }
            $saveUser = User::where('email', $user->getEmail())->with('getSubcription')->first();

            Auth::loginUsingId($saveUser->id);            
            if($user->getSubcription){
                $plans = Plans::query()->where('id',$user->getSubcription->plan_id)->with('getRelationalData.getModule','getRelationalData.getOperation')
                ->first();
                $module = MasterPlanModule::all();
                $action = MasterPlanOperation::all();
                $this->session()->put('permission',$plans->getRelationalData);
                $this->session()->put('module',$module);
                $this->session()->put('action',$action);
            }  

            
            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}