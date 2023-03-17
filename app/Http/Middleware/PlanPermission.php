<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\MiddlewareUltilityController;
use App\Http\Controllers\Helper\SubscriptionUtilityController;
use App\Models\User;
use App\Models\UserInvite;
use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class PlanPermission extends Controller
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
      if(isset(auth()->user()->id)){ // check login
         $is_subscribed = SubscriptionUtilityController::isSubscribed();
         if(!$is_subscribed) 
         {
            // $user = User::find( auth()->user()->id);
            // $invites= UserInvite::query()->where('user_id',$user->parent_user_id)->get();
            // if($user->parent_user_id>0 && !empty($invites))
            // {
            //    foreach ($invites as $key => $invite) {
            //       if($invite->email==$user->email){
            //          return redirect()->route('master-plan-create');
            //       }
            //    }
            // }
            return redirect()->route('plans-view');
         }
         // if (!$is_subscribed) {
         //    return redirect()->route('plans-view');
         // }
      }
      if ($request->session()->get('permission')) {
         $key = null;
         $getModule_id = null;
         $check_module = explode('/', $request->url());
         // Get Module Id
         if (in_array('user', $check_module)) {
            $mod = $request->session()->get('module')->sole('name', 'Industry Guide');
            $getModule_id = $mod->id;
         } elseif (in_array('industiry-guide', $check_module)) {
            $mod = $request->session()->get('module')->sole('name', 'Industry Guide');
            $getModule_id = $mod->id;
         } elseif (in_array('project', $check_module)) {
            $mod = $request->session()->get('module')->sole('name', 'Projects');
            $getModule_id = $mod->id;
            if (isset($request->id)) {  // for project view and edit give permission free
               return $next($request);
            }
         } elseif (in_array('job', $check_module)) {
            $mod = $request->session()->get('module')->sole('name', 'Jobs');
            $getModule_id = $mod->id;
         }

         if ($getModule_id) {
            $permissions = $request->session()->get('permission')->where('module_id', $getModule_id);
            // For JOBS routes
            if ($mod->name == 'Jobs') {
               foreach ($check_module as $name) {
                  if (in_array($name, $request->session()->get('action')->pluck('url_key')->toArray()) == true) {
                     $key =  $name;
                     break;
                  }
               }
            } else {
               $key =  $check_module[count($check_module) - 1];
            }
            // If any key route not found continue the process
            if ($key == null) {
               return $next($request);
            }
            $selected_action = $request->session()->get('action')->where('url_key', $key)->pluck('id');
            if (isset($selected_action[0])) { // check current url action in list
               $selected_permission = $permissions->whereIn('action_id', $selected_action)->first();
               if (!$selected_permission) { // view profile
                  if($request->ajax()){
                     $endorseUrl=route('endorse-user-mail-store');
                     $divideString=explode('/',$endorseUrl); 
                     if (end($divideString)=="endorse-user-mail-store") {
                        return response(['status'=>'error', 'msg'=>'Upgrade your plan to endorse user']);
                     }
                     return response(['status'=>'error', 'msg'=>'You Are Not Allowed to Access This Page']);
                  }
                        $currenturl = $request->url();
                        $divideString=explode('/',$currenturl);      
                        if(end($divideString)=="organisation-create"){
                           return back()->with('error','Upgrade your plan to create an organisation page');
                        }elseif(end($divideString)=="project-overview"){
                           return back()->with('error','Upgrade your plan to create another project');
                        }elseif(end($divideString)=="job-create"){
                           return back()->with('error','Upgrade your plan to post a job');
                        }
                  return back()->with('error', 'Sorry, You Are Not Allowed to Access This Page');
               } else {
                  if ($selected_permission->limit > 0) {
                     $status = MiddlewareUltilityController::checkActionLimit($selected_permission->id, $selected_permission->limit, $request);
                     if ($status == true) {
                        if($request->ajax()){
                           
                           return response(['status'=>'error', 'msg'=>'Sorry, You Are Not Allowed to Access This Page']);
                        }
                        $currenturl = $request->url();
                        $divideString=explode('/',$currenturl);
                        if(end($divideString)=="organisation-create"){
                           return back()->with('error','Upgrade your plan to create an organisation page');
                        }elseif(end($divideString)=="project-overview"){
                           return back()->with('error','Upgrade your plan to create another project');
                        }elseif(end($divideString)=="job-create"){
                           return back()->with('error','Upgrade your plan to post a job');
                        }
              
                        return back()->with('error', 'Sorry, You Are Not Allowed to Access This Page');
                     }
                  }
               }
            }
         }
      }
      return $next($request);
   }
}
