<?php

namespace App\Http\Controllers;

use App\Models\MasterCountry;
use App\Models\MasterSkill;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndustryGuideController extends Controller
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
        return view('guide.guide_search_result',compact(['countries','skills']));

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
            'locations.*' => 'nullable|exists:countries,name',
            'skills.*' => 'nullable|exists:master_skils,name',
            // 'talent.*' => 'nullable|exists:master_skils,name',
        ]);
    
        if ($validator->fails()) {
            // return $this->returnResponse(false, "ERR081", $validator->errors()->first(), null, null);
        }

        // $locations = MasterCountry::whereIn('id', $request->location)->pluck('name');
        // $skills = MasterSkill::whereIn('id', $request->skills)->pluck('name');

        $users = User::query()->where(function($query) use($request){
            if (isset($request->search)) { // search name of user
                $query->where("name", "like", "%$request->search%");
            }
        })
        ->wherehas(['country'=> function ($q) use($request){
             $q->whereIn('id',$request->locations);
            
        }])
        ->wherehas(['skill.getSkills'=> function ($q) use($request){
            $q->whereIn('id',$request->skills);
        }])
        ->paginate();

        dd($users);
                      
       }catch(Exception $e){
           
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