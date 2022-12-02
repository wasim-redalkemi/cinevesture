<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Helper\SubscriptionUtilityController;
use Closure;
use Illuminate\Http\Request;

class PlanPermission
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
        if($request->session()->get('permission')){
           
           $getModule_id = null;
           $check_module = explode('/',$request->url());
           // Get Module Id
             if(in_array('user',$check_module)){  
                $mod = $request->session()->get('module')->sole('name','Industry Guide');
                $getModule_id = $mod->id; 
             }elseif(in_array('industry-guide',$check_module)){
                $mod = $request->session()->get('module')->sole('name','Industry Guide');
                $getModule_id = $mod->id; 
             }elseif(in_array('project',$check_module)){
                $mod = $request->session()->get('module')->sole('name','Projects');
                $getModule_id = $mod->id; 
             }elseif(in_array('job',$check_module)){
                $mod = $request->session()->get('module')->sole('name','Jobs');
                $getModule_id = $mod->id; 
             }
            
          
          if($getModule_id){
              $permissions = $request->session()->get('permission')->where('module_id',$getModule_id);
              $key =  $check_module[count($check_module)];
              $selected_action = $request->session()->get('action')->sole('url_key',$key);
              if($selected_action){ // check current url action in list
               if(!$permissions->sole('action_id',$selected_action->id)){ // view profile
                   return back()->with('error','Sorry, You Are Not Allowed to Access This Page');
               }
              }
           }
        }
        
        
        if(isset(auth()->user()->id)){ // check login
           
            $is_subscribed = SubscriptionUtilityController::isSubscribed();
            if(!$is_subscribed){
               return redirect()->route('plans-view');
            }
        }




       
        return $next($request);
    }
}
