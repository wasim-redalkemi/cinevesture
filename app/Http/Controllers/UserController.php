<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use App\Models\User;
use App\Models\UserExperience;
use App\Models\UserPortfolio;
use App\Models\UserQualification;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }



    // User profile experience

    public function experienceAdd(Request $request)
    {
        $user = User::query()->find(auth()->user()->id);
        return view('user.profile_experience', compact('user'));
    }

    public function experienceStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $experience = new UserExperience();
            $experience->user_id = $user->id;
            $experience->job_title = $request->job_title;
            $experience->comapny = $request->comapny;
            $experience->country_id = $request->country_id;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->employement_type_id = 'Panjab';
            $experience->description = $request->description;
           
            if($experience->save()){
                $qualification = $experience;
                return view('user.profile_qualification', compact('qualification'));
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
        }
    }

    // User profile qualification

    public function qualificationAdd(Request $request)
    {
        $user = User::query()->find(auth()->user()->id);
        $qualification =$user;
        return view('user.profile_qualification', compact('qualification'));
    }

    public function qualificationStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            
            $qualification = new UserQualification();
            $qualification->user_id = $user->id;
            $qualification->institute_id = '5';
            $qualification->institue_name = $request->institue_name;
            $qualification->degree_id = '6';
            $qualification->degree_name = $request->degree_name;
            $qualification->feild_of_study = $request->feild_of_study;
            $qualification->start_year = $request->start_year;
            $qualification->end_year = $request->end_year;
            $qualification->description = $request->description;
           
            if($qualification->save()){
                return redirect()->route('profile-view');
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
        }
    }


   
}
