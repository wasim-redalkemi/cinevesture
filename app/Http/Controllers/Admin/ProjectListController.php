<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\ProjectList;
use App\Models\ProjectMedia;
use App\Models\ProjectListProjects;
use App\Models\UserProject;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ProjectListController extends AdminController
{
  
    
   
      

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        try
        {
             return view('admin.projectList.create');
        }
        catch (Exception $e) 
        {
             return back()->withError('error','Something went wrong.');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try
        {
            $project_list= new ProjectList();
            $project_list->list_name=$request->name;
            $project_list->list_status=$request->status;
            $project_list->save();
             return redirect()->route('show-list')->with("success", "List added  successfully.");
        }
        catch (Exception $e) 
        {
             return back()->withError('error','Something went wrong.');
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
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function project_list_show()
    {
       
        try
        {
            $project_list=ProjectList::query()->paginate($this->records_limit);
            $projects_data=ProjectListProjects::query()->with('lists')->groupby('list_id')
            ->selectraw('count(project_id) as project_count,list_id')
            ->paginate($this->records_limit);
            return view('admin.projectList.list',compact('project_list','projects_data'));
        }
        catch (Exception $e) 
        {
             return back()->withError('error','Something went wrong.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        try
        {
            $project_data=UserProject::paginate($this->records_limit);
            $project_search=ProjectListProjects::query()
             ->with('projects')
            ->select('project_id')
            ->where('list_id', $id)
            ->paginate($this->records_limit);
           // dd($project_search);
            return view('admin.projectList.search',compact('id','project_search'));
        }
        catch (Exception $e) 
        {
            return back()->withError('error','Something went wrong.');
        }

    }
    public function edit($id)
    {
        //
    }
    public function search_project(Request $request,$id)
    {
       
        try
        {
            $search_data=$request->name;
            $project_search=ProjectListProjects::query()
            ->with('projects')
            ->select('project_id')
            ->groupby('list_id')
            ->havingraw('list_id','=',$id)
            ->paginate($this->records_limit);
            // dd($project_search);


        //     $project_data=UserProject::query()
        //     ->with('projectImage')
        //     ->where(function($q)use($search_data){
        //     if(!empty($search_data) && !is_null($search_data)){
        //       $q->where('project_name', 'like' ,"%$search_data%");
        //     }
        //     })
        //    ->paginate($this->records_limit);
            return view('/admin.projectList.search',compact('id','project_data'));
        }
        catch (Exception $e) 
        {
            return back()->withError('error','Something went wrong.');
        }
    }

    public function saveSearchProjects(Request $request)
    {
       try
       {
            foreach($request->projectids as $project){
            $projectid = explode(',', $project);
                $data[] = [
                    'project_id' =>$projectid[0],
                    'list_id'  =>$projectid[1]
                    ];
                }
            ProjectListProjects::insert( $data );
            return redirect('/admin/project-management/list')->with("success", "Project selected successfully.");
        }
        catch (Exception $e) 
        {
             return back()->with('error','Something went wrong.');
        }
       

    }

    public function changeStatus(Request $request, $id, $status)
    {
        try
        {
            if($status=='Publish')
            {
            $list_status="Unpublish";
            }
            else
            {
            $list_status="Publish";
            }
            ProjectList::where("id", $id)->update(["list_status" => $list_status]);
            return redirect('/admin/project-management/list')->with("success", "Status changed successfully.");
        }
        catch (Exception $e) 
        {
            return back()->with('error','Something went wrong.');
        }
    }

    public function deleteList(Request $request, $id)
    {
        try
        {
            $delet_list=ProjectList::where('id',$id)->delete();
            $delete_search_list=ProjectListProjects::where('list_id',$id)->delete();
            return redirect('/admin/project-management/list')->with("success", "List deleted successfully.");
        }
        catch (Exception $e) 
        {
            return back()->with('error','Something went wrong.');
        }
       
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
