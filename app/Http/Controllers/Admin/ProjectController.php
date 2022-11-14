<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\MasterProjectCategory;
use App\Models\MasterProjectGenre;
use App\Models\ProjectCategory;
use App\Models\ProjectCountry;
use App\Models\ProjectGenre;
use App\Models\UserProject;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $projects = UserProject::query()->with(['user','projectCategory','genres'])
            ->get();
          
                return view('admin.project.list',compact('projects'));
        } catch (\Throwable $e) {
        return back()->withErrors($e->getMessage());
        }
        
    }
    public function markFavorite(Request $request)
    {
        try {
            $project=UserProject::where('id',$request->p)->first();
            $project->favorited = $request->s;
            $project->save();
            return back();
        } catch (\Throwable $e) {
            return back($e);
        }
    }
    public function markRecommended(Request $request)
    {
        try {
            $project=UserProject::where('id',$request->p)->first();
            $project->Recommended_badge = $request->s;
            $project->save();
            return back();
        } catch (\Throwable $e) {
            return back($e);
        }
    }
    public function changeStatus(Request $request)
    {
        try {
            
        
            $project=UserProject::where('id',$request->pId)->first();
            $project->project_verified = $request->status;
            $project->save();
            return back();
        } catch (\Throwable $e) {
            return back($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

    public function categoryEdit(request $request)
    {
        
        $projectcategories = ProjectCategory::query()->where('project_id',$request->pid)->get();
        $categories = MasterProjectCategory::get();
        $temp_cat = [];
        foreach($projectcategories as $k =>$v)
        {
            array_push($temp_cat,$v->category_id);
        }
        $projectcategories = $temp_cat;
        $project_id = $request->pid;
        
        return view('admin.project.categoryedit',compact(['projectcategories','categories','project_id']));
    }
    public function categoryUpdate(request $request)
    {
      try {
        if ($request->cat) {
            # code...
        }
        $project = ProjectCategory::query()->where('project_id',$request->p_id)->delete();
        if (!empty(request('category'))) {
          foreach (request('category') as $value) {
             $project = new ProjectCategory();
             $project->project_id=$request->p_id;
             $project->category_id=$value;
             $project->save();
          }
          return back();
        }
      } catch (\Throwable $e) {
        return back()->withErrors($e->getmessage);
      }
    }


    public function genreEdit(request $request)
    {
        try {
            $genre = ProjectGenre::query()->where('project_id',$request->p_id)->get();
            $mastergenres=MasterProjectGenre::get();
            
            $temp_cat = [];
            foreach($genre as $k =>$v)
            {
                array_push($temp_cat,$v->gener_id);
            }
            $genres = $temp_cat;
            $project_id = $request->p_id;
            
            return view('admin.project.genreedit',compact(['genres','mastergenres','project_id']));
        } catch (\Throwable $e) {
            return back()->withErrors($e->getmessage());
        }
        
    }

    public function genreUpdate(request $request)
    {
      try {
        
        if (!empty($request->genres)) {
            $project = ProjectGenre::query()->where('project_id',$request->p_id)->delete();
            if (!empty(request('genres'))) {
              foreach (request('genres') as $genre) {
               
                 $project = new ProjectGenre();
                 $project->project_id=$request->p_id;
                 $project->gener_id=$genre;
                 $project->save();
              }
              return back();
            };
        }
       
      } catch (\Throwable $e) {
        return back()->withErrors($e->getMessage());
      };
    }
}
