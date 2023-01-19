<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Endorsement;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EndorsementController extends Controller
{   // views 


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endorsement = Endorsement::query()->with('endorsementCreater.organization')->where('to',auth()->user()->id)
        ->orderByDesc('id')->paginate(2);
        return view('website.user.endorsement',compact('endorsement'));
    }


    // Functionality
   

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
        //
    }

    // change status 

    public function changeStatus(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [

                'end_id' => 'required|exists:endorsements,id',
            ],['end_id.required'=>'Something went wrong',
               'end_id.exists'=>'Something went wrong',]);

            if ($validator->fails()) {
                return ['satus'=>0,'msg'=>$validator->errors()->first()];
            }
            
            $endorsement = Endorsement::find($request->end_id);
            if($endorsement->status == '1'){
                $endorsement->status = '0';
                $msg = "Endorsement Inactive successfully.";
            }else{
                $endorsement->status = '1';
                $msg = "Endorsement active successfully.";

            }
            $endorsement->save();

            $currentActiveCount = Endorsement::query()->where('to',$endorsement->to)->where('status','1')->get();
            $updateUserVerified = User::find($endorsement->to);
            if(count($currentActiveCount)>=config('constants.PROFILE_VERIFIED_ON_ENDORSE_COUNT'))
            {
                $updateUserVerified->is_profile_verified = 1;
            }
            else
            {
                $updateUserVerified->is_profile_verified = 0;
            }
            $updateUserVerified->update();


            return ['status'=>1,'msg'=>$msg];           
        } catch (Exception $e) {
            return ['status'=>0,'msg'=>"Something went wrong."];
        }
        
    }
}
