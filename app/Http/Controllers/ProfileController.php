<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreProfileUpdate;
use App\Models\UserExperience;
use App\Models\UserPortfolio;
use App\Models\UserQualification;
use Exception;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{   // View routes function
    public function profileView(Request $request)
    {
        $user = User::query()->find(auth()->user()->id);
        
        $portfolio = UserPortfolio::query()->where('user_id',$user->id)->get();
        $experience = UserExperience::query()->where('user_id',$user->id)->get();
        $qualification = UserQualification::query()->where('user_id',$user->id)->get();
        return view('user.guide_profile', compact('user','portfolio','experience','qualification')); 
    }

    public function profileCreate()
    {
        $user = User::query()->find(auth()->user()->id);
        return view('user.profile_setup', compact('user'));
    }


    //
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

            $file = $request->file('profile_image');
            $originalFile = $file->getClientOriginalName();
            $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
            $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
            $nameStr = date('_YmdHis');
            $newName = $fileName.$nameStr.'.'.$fileExt;
            $locationPath  = "user";
            $uploadFile = $this->uploadFile($locationPath , $file,$newName);
            $user->profile_image = $uploadFile;

            if($user->save()){
                $portfolio = $user;
                return view('user.profile_portfolio', compact('portfolio'));
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
        }
    }

    // public function profileUpdate(StoreProfileUpdate $request)
    // public function profileUpdate(Request $request)
    // {
    //     try {            
    //     } catch (Exception $e) {
    //         return back()->withError('Somethig went wrong.');
    //     }
    // }
}
