<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Admin\UserRequest as AdminUserRequest;
use App\Http\Requests\admin\UserRequest;
use Illuminate\Validation\ValidationException;
use App\Models\MasterCountry;
use App\Models\Plans;
use App\Models\User;
use App\Models\UserInvite;
use App\Models\UserOrganisation;
use App\Models\UserSubscription;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try
        {
            $countries=MasterCountry::query()->orderBy('name','ASC')->get();
            $UserOrganisation = UserOrganisation::query()->get();
            $users=User::query()->where('user_type','U')
            ->with(['organization','country','membership'])
            ->where(function ($q) use ($request) {
                if (isset($request->search)) {
                    $q->where("name","like","%$request->search%");
                }
                if(isset($request->from_date) && isset($request->to_date)){
                    $from=($request->from_date).' '.('00:00:00');
                    
                    $to=($request->to_date).' '.'23:59:59';
                    
                    $q->whereBetween("created_at",[$from,$to]);
                }
                if (isset($request->country)) {
                    $q->where("country_id",$request->country);
                }
                if (isset($request->status)) {
                    $q->where('status',$request->status);
                }
                if (isset($request->organization)) { // search name of user
                        $q->whereHas('organization', function ($q) use($request){
                        $q->where('id',$request->organization);
                    });
                }
                if(isset($request->membership)){
                    $q->whereHas("membership",function($q)use($request){
                        // if (isset($request->membership)) {
                            $q->where("plans.plan_name",$request->membership);
                        // }
                    });
                }

            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->records_limit);
            $users->appends(request()->input())->links() ;

            return view('admin.user.list',compact('users','UserOrganisation','countries'));
        } 
        catch (Exception  $e) {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }

    }

    public function changeStatus(Request $request)
    {
       try {
       $user=User::find($request->user_id);
       $user->status= $request->status;
    // if($user->status=='0'){
    //     $this->suspendUserEntities([$request->user_id]);  
    // }
       $user->save();
       Session::flash('response', ['text'=>'Status update successfully!','type'=>'success']);
       return back();
    } catch (Exception $e) {
       
        Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
        return back();
       } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.user.create');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $user=User::query()->where('email',$request->email)->first();
            if (!empty($user)) {
                Session::flash('response', ['text'=>'This user already exist','type'=>'danger']);
                return back();
            }
        //    if ($request->password!=$request->confirmed) {
        //     Session::flash('response', ['text'=>'Password and confirm password should be match','type'=>'danger']);
        //     return back();
        //    }
            $user=new User();
            $user->name=$request->first_name.' '.$request->last_name;
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->save();
            Session::flash('response', ['text'=>'User add successfully!','type'=>'success']);
            return redirect()->route('user-management');
        } catch (\Throwable $e) {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function editPlan($id)
    {
        try {
            $user=User::find($id);
            $subscription=UserSubscription::query()->where('user_id',$id)->first();
            return view('admin.user.plan_edit',compact(['user','subscription']));
        } catch (\Throwable $e) {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function planUpdate(Request $request)
    {
        $plan=Plans::find($request->plan_type);
        $expiryDate = date("Y-m-d 23:59:59", strtotime($request->end_date));
        $subscription=UserSubscription::query()->where('user_id',$request->user_id)->first();
        if (empty($subscription)) {
            if (($request->plan_type=='#')) {
                Session::flash('response', ['text'=>'Please enter plan type','type'=>'danger']);
                return back();
            }
            if (empty($request->end_date)) {
                Session::flash('response', ['text'=>'Please enter expiry date','type'=>'danger']);
                return back();
            }
            $subscription=new UserSubscription();
            $subscription->subscription_start_date=date("Y-m-d 00:00:00");
        }
        $subscription->user_id=$request->user_id;
        $subscription->plan_id=$request->plan_type;
        $subscription->plan_time=$plan->plan_time;
        $subscription->plan_time_quntity=$plan->plan_time_quntity;
        $subscription->plan_name=$plan->plan_name;
        $subscription->plan_amount=$plan->plan_amount;
        $subscription->subscription_end_date=$expiryDate;
        $subscription->platform_subscription_id="plan extended by admin";
        $subscription->save();
        Session::flash('response', ['text'=>'User add successfully!','type'=>'success']);
        return redirect()->route('user-management');
    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user=User::find($id)->delete();
            Session::flash('response', ['text'=>'User delete successfully','type'=>'success']);
                return back();
            
        } catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
       
    }
}
