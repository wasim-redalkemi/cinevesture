<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreProfileUpdate;
use Exception;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function profileView(Request $request)
    {
        $user = User::query()->find(auth()->user()->id);
        return view('user.guide_profile', compact('user')); 
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
            // $user->gender = $request->gender;
            // $user->gender_pronouns = $request->gender_pronouns;
            $user->about=$request->about;
            // $user->available_to_work_in=$request->website;
            // $user->state=$request->state;
            // $user->country=$request->country;
            $user->imdb_profile = $request->imdb_profile;
            $user->linkedin_profile = $request->linkedin_profile;
            $user->website = $request->website;
            // $user->video = $request->video;
            if($user->save()){
                Session::flash('response', ['text'=>'Profile added successfully','type'=>'success']);
                return view('user.guide_profile', compact('user'));
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
