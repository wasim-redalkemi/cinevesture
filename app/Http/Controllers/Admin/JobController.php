<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\MasterCountry;
use App\Models\UserJob;
use Illuminate\Support\Facades\Session;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class JobController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        try {
            
            $countries=MasterCountry::query()->get();
            $jobs=UserJob::query()
            ->with('jobLocation','user','jobOrganisation')
            ->where(function($q) use ($request){
                if (isset($request->country)) {
                    $q->whereHas('jobLocation', function($q) use($request){
                        $q->where('location_id',$request->country);
                    });
                }
                if (isset($request->status)) {
                    $q->where('save_type',$request->status);
                }
                if (isset($request->search)) {
                    $q->where('title',"like","%$request->search%") ;
                }
            })
            ->paginate(5);
           
            return view('admin.job.index',compact('jobs','countries'));
        } catch (\Throwable $e) {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
            // return back()->withErrors( $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status_update(request $request)
    {
        try {
            
            $status=UserJob::query()
            ->where('id',$request->job_Id)
            ->first();
            $status->save_type = $request->status;
            $status->save();
            toastr() ->success('Status update successfully!', 'Congrats');

            // Session::flash('response', ['text'=>'Status update successfully','type'=>'success']);
            return back();
            
        } catch (\Throwable $e) {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
    }
    public function promotUpdate(request $request)
    {
       try {
            
            $promote=UserJob::where('id',$request->id)->first();    
            $promote->promote=$request->p;
            $promote->save();
            
            toastr() ->success('Promote update successfully!', 'Congrats');
            return redirect(route('job'));
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
            $job=UserJob::find($id);
            $job->delete();
            toastr() ->success('Job delete successfully!', 'Congrats');
            return back();
        } catch (\Throwable $e) {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
        
    }
}
