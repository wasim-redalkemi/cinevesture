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


    // View routes function
    public function profilePrivateShow(Request $request)
    {
        $user = User::query()->find(auth()->user()->id);
        
        $portfolio = UserPortfolio::query()->where('user_id',$user->id)->get();
        $experience = UserExperience::query()->where('user_id',$user->id)->get();
        $qualification = UserQualification::query()->where('user_id',$user->id)->get();
      
        return view('user.profile_private_view', compact('user','portfolio','experience','qualification')); 
    }

    public function profilePublicShow(Request $request)
    {
        $user = User::query()->find(auth()->user()->id);
        
        $portfolio = UserPortfolio::query()->where('user_id',$user->id)->get();
        $experience = UserExperience::query()->where('user_id',$user->id)->get();
        $qualification = UserQualification::query()->where('user_id',$user->id)->get();
        return view('user.profile_public_view', compact('user','portfolio','experience','qualification')); 
    }

    public function profileCreate()
    {
        $user = User::query()->find(auth()->user()->id);
        return view('user.profile_setup', compact('user'));
    }


    public function profileStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->job_title = $request->job_title;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->gender_pronouns = $request->gender_pronouns;
            $user->about=$request->about;
            $user->available_to_work_in=$request->available_to_work_in;
            $user->country=$request->country;
            $user->imdb_profile = $request->imdb_profile;
            $user->linkedin_profile = $request->linkedin_profile;
            $user->website = $request->website;
            $user->intro_video_link = $request->intro_video_link;

            if($request->hasFile('logo')) {

                $file = $request->file('profile_image');
                $originalFile = $file->getClientOriginalName();
                $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
                $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                $nameStr = date('_YmdHis');
                $newName = $fileName.$nameStr.'.'.$fileExt;
                $locationPath  = "user";
                $uploadFile = $this->uploadFile($locationPath , $file,$newName);
                $user->profile_image = $uploadFile;
            }
            if($user->save()){
                $portfolio = $user;
                // return view('user.profile_portfolio', compact('portfolio'))->with("success","Portfolio updated successfully.");
                return redirect()->route('portfolio-create')->with("success","Portfolio updated successfully.");

            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
        }
    }

    // User profile Portfolio
    public function portfolioCreate(Request $request)
    {
        $user = User::query()->find(auth()->user()->id);
        $portfolio = $user;
        return view('user.profile_portfolio', compact('portfolio'));
    }

    public function portfolioStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $portfolio = new UserPortfolio();
            $portfolio->user_id = $user->id;
            $portfolio->project_title = $request->project_title;
            $portfolio->project_title = $request->project_title;
            $portfolio->description = $request->description;
            $portfolio->completion_date = $request->completion_date;
            $portfolio->project_country_id = '5';
            // $portfolio->video = $request->video;
           
            if($portfolio->save()){
                $experience = $portfolio;
                // Session::flash('response', ['text'=>'Profile added successfully','type'=>'success']);
                return view('user.profile_experience', compact('experience'));
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
        }
    }


    // User profile experience

    public function experienceCreate(Request $request)
    {
        $user = User::query()->find(auth()->user()->id);
        $experience = $user;
        return view('user.profile_experience', compact('experience'));
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
            $experience->employement_type_id = 'Freelancer';
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

    public function qualificationCreate(Request $request)
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
            $qualification->institue_name = $request->institue_name;
            $qualification->degree_name = $request->degree_name;
            $qualification->feild_of_study = $request->feild_of_study;
            $qualification->start_year = $request->start_year;
            $qualification->end_year = $request->end_year;
            $qualification->description = $request->description;
           
            if($qualification->save()){
                return redirect()->route('profile-private-show');
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
        }
    }


   
}
