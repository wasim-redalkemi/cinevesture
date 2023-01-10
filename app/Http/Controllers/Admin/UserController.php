<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Models\MasterCountry;
use App\Models\User;
use App\Models\UserInvite;
use App\Models\UserOrganisation;
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
                        $q->whereHas('invites', function ($q) use($request){
                        $q->where('user_organization_id',$request->organization);
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
       $user->save();
       Session::flash('response', ['text'=>'Status update successfully!','type'=>'success']);
       return redirect()->route('user-management');
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
