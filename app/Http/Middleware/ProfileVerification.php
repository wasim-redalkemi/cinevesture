<?php

namespace App\Http\Middleware;

use App\Models\Otp;
use App\Models\User;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {  
        try{
        if(auth()->user())
        {
            // $data = session()->all();
            // dd($data);
            $user = User::query()->find(auth()->user()->id);
            // dd($user->email_verified_at);              
        
            if (empty($user->email_verified_at) || ($user->email_verified_at == NULL)) {
                
                return redirect()->route('otp-view', ['email' =>$user->email]);
            }
            $request->session()->put('access', 'otpNotVerify');
                
            return redirect()->route('otp-view');                

        }
        }
        catch(Exception $e){
            dd($e->getMessage());
        }
        }
}
       

