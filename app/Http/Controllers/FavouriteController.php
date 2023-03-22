<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Endorsement;
use App\Models\User;
use App\Models\UserFavourite;
use App\Models\UserFavouriteProfile;
use App\Models\UserFavouriteProject;
use App\Models\UserProject;
use App\Models\UserSkill;
use Database\Factories\UserFactory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\InputBag;

class FavouriteController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $param_profile = 1;
        $param_project = 1;
        $user_projects = UserFavouriteProject::query()
                        ->with('projects.projectImage','projects.user')
                        ->where('user_id', $this->getCreatedById())
                        ->orderBy('created_at', 'DESC')
                        ->paginate(6,['*'],'project');
  
        $user_profiles = UserFavouriteProfile::query()
                        ->with('profiles', 'profileSkills.getSkills', 'profileCountry.country')
                        ->where('user_id', $this->getCreatedById())
                        ->orderBy('created_at', 'DESC')
                        ->paginate(6,['*'],'profile');
        if(isset($request->profile)){
            $param_profile  = $request->profile;
        }
        if(isset($request->project)){
            $param_project  = $request->project;
        }
        // $user_projects->appends('profile',$param_profile)->links();

        $user_profiles->appends('project',$param_project)->links();
                        // $vocational->appends(['search' => request('search')]);
        // $user_profiles->setPageName('user_profile_page');
        $user_endorsement = Endorsement::query()->with('endorsementCreater')->where('to', $this->getCreatedById())->where('status', '1')
            ->orderByDesc('id')->get();
        return view('website.user.favourite.favourite', compact(['user_projects', 'user_profiles', 'user_endorsement']));
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
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [

                'id' => 'required|exists:users,id',

            ]);

            if ($validator->fails()) {
                return ['status' => False, 'msg' => "Something went wrong, Please try again later."];
            }
            $favourite = UserFavouriteProfile::query()
                ->where('user_id', $this->getCreatedById())
                ->where('profile_id', $request->id)->first();
            if ($favourite) {
                $favourite->delete();
                return ['status' => True, 'msg' => "You have unliked a profile."];
            } else {
                $favourite = new UserFavouriteProfile();
                $favourite->user_id = $this->getCreatedById();
                $favourite->profile_id = $request->id;
                $favourite->save();
                return ['status' => true, 'msg' => "You have liked a profile."];
            }
        } catch (Exception $e) {
            return ['status' => false, 'msg' => "Something went wrong, Please try again later."];
        }
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
}
