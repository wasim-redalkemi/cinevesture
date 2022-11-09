<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\ProjectList;
use App\Models\ProjectMedia;
use App\Models\ProjectSearch;
use App\Models\UserProject;
use Illuminate\Http\Request;

class ProjectListController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.project_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $project_list= new ProjectList();
        $project_list->list_name=$request->name;
        $project_list->list_status=$request->status;
        $project_list->save();
            

           
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
    public function show()
    {
        $project_list=ProjectList::all();
        $project_count=UserProject::select('id')->get()->count();
        return view('admin.user.projectlist',compact('project_list','project_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        $project_data=UserProject::all();
        return view('admin.user.search_project',compact('id','project_data'));
    }
    public function edit($id)
    {
        //
    }
    public function find(Request $request,$id)
    {
        //dd(array_count_values($request->projectids));
        {
        foreach ($request->projectids as $k=>$v ) {
            $data[] = [
                'project_id' =>$v,
                'list_id'  =>$request->listids[$k]
                ];
            }
        }
            ProjectSearch::insert( $data );
            $project_data=UserProject::query()->with('projectImage')->get();
            $search_data=$request->name;
            $search_projects=UserProject::query()->with('projectImage')
            ->where('project_name', 'like' ,"%$search_data%")
            ->get();
            return view('admin.user.search_project',compact('search_projects','id','project_data'));
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
