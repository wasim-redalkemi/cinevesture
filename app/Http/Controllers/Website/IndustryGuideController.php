<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use App\Models\MasterCountry;
use App\Models\MasterSkill;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndustryGuideController extends WebController
{   
    // View Pages
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $countries = MasterCountry::all();
        $skills = MasterSkill::all();
        return view('website.guide.guide_search_result',compact(['countries','skills']));

    }
   
   
   // Web-fucntions
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       try{ 
        $validator = Validator::make($request->all(), [
            'search' => 'nullable',
            'locations.*' => 'nullable|exists:countries,id',
            'skills.*' => 'nullable|exists:master_skills,id',
            // 'talent.*' => 'nullable|exists:master_skils,name',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $countries = MasterCountry::all();
        $skills = MasterSkill::all();
        $talent_type = User::query()->where('job_title','!=',null)->where('user_type','U')->groupBy('job_title')->get();
        $users = User::query()->where(function($query) use($request){
            if (isset($request->search)) { // search name of user
                $query->where("name", "like", "%$request->search%");
            }
            if (isset($request->talentType)) { // search name of user
                $query->whereIn("job_title",$request->talentType);
            }
            if(isset($request->verified)){
              $query->where("is_profile_verified","1");
 
            }
        })
        ->where(function($subQuery) use($request)
        {   
            if (isset($request->countries)) { // search name of user
            $subQuery->whereHas('country',function ($q) use($request){
                    $q->whereIn('id',$request->countries);
                    
                });
            } 
            if (isset($request->skills)) { // search name of user
                $subQuery->whereHas('skill', function ($q) use($request){
                    $q->whereIn('skill_id',$request->skills);
                });
            } 
        })
        ->with('country','skill.getSkills')
        ->where('id','!=',auth()->user()->id)
        ->where('user_type','U')
        ->orderByDesc('id')
        ->paginate(1);
        $users->appends(request()->input())->links();
        return view('website.guide.guide_search_result',compact(['countries','skills','users','talent_type']));                   
       }catch(Exception $e){
        return back()->with('error', 'Something went wrong.');
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
}
