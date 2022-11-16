<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Illuminate\Http\Request;

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
            if(auth()->user()) {
                $user = User::query()->find(auth()->user()->id);
                if ($user->is_profile_complete == '0') {
                    return redirect()->route('profile-create');
                }else{
                    return view('website.user.profile_private_view', compact('user')); 
                }
            }else{
                return $next($request);
            }
        }
        catch(Exception $e){
            return back()->withError($e->getMessage());
        }
    }
}
       

