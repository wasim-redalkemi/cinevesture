<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\MiddlewareUltilityController;
use App\Http\Controllers\Helper\SubscriptionUtilityController;
use App\Http\Controllers\Website\SubscriptionController;
use App\Models\SubscriptionOrder;
use App\Models\User;
use App\Models\UserInvite;
use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
         // if (!($request->session()->has('subscription_end_date'))) {
      // // }
      if(session()->get('user_subscription_end_date')< Carbon::now() ){
         
         $subscriptionorder=SubscriptionOrder::query()->where('user_id',auth()->user()->id)->where("is_used_for_subscription",'0')->first();
         if(!empty ($subscriptionorder)){
            $subscriptionorder->is_used_for_subscription="1";
            $subscriptionorder->save();
            if(!empty($subscriptionorder)){
            $subscriptionData=[
               'user_id'=>$subscriptionorder->user_id,
               'plan_amount'=> $subscriptionorder->plan_amount,
               'plan_name' =>$subscriptionorder->plan_name,
               'currency' =>$subscriptionorder->currency,
               'plan_time' =>$subscriptionorder->plan_time,
               'plan_time_quntity' => $subscriptionorder->plan_time_quntity,
               // 'subscription_start_date' = Carbon::now(), // for free plan 
               'total_days' => $subscriptionorder->plan_time_quntity,
               'subscription_end_date' => date('Y-m-d 23:59:59',strtotime('+'.$subscriptionorder->plan_time_quntity.'days')),//Carbon::now()->addDays($subscriptionorder->plan_time_quntity), // for free plan 
               'order_id' => $subscriptionorder->order_id,
               'plan_id' => $subscriptionorder->plan_id
      
            ];
            
            $subscriptionData = (object) $subscriptionData;
            $subscription=new SubscriptionController();
            $subscription1 = $subscription->createSubscription($subscriptionData,null);
            }
         }

      }
      $is_subscribed = SubscriptionUtilityController::isUserSubscribe();

         if($is_subscribed == false) 
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
      }
      if ($request->session()->get('permission')) {
         $key = null;
         $getModule_id = null;
         $check_module = explode('/', $request->url());
         // Get Module Id
         if (in_array('user', $check_module)) {
            $mod = $request->session()->get('module')->sole('name', 'Industry Guide');
            $getModule_id = $mod->id;
         } elseif (in_array('industry-guide', $check_module)) {
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
                  // // check organisation
                  // if($selected_permission->get_operation->url_key == "organisation-create"){
                  //    return back()->with('error','Upgrade your plan to create an organisation page');
                  // }
                  // limits of action check
                  if ($selected_permission->limit > 0) {
                     $status = MiddlewareUltilityController::checkActionLimit($selected_permission->id, $selected_permission->limit, $request);
                     if ($status == true) {
                        if($request->ajax()){
                           
                           return response(['status'=>'error', 'msg'=>'Sorry, You Are Not Allowed to Access This Page']);
                        }
                        $currenturl = $request->url();
                        $divideString=explode('/',$currenturl);
                        if(end($divideString)=="project-overview"){
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
