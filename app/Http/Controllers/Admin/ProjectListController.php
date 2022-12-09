<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\ProjectList;
use App\Models\ProjectMedia;
use App\Models\ProjectListProjects;
use App\Models\UserProject;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
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
            // Session::flash('response', ['text'=>'Project create successfully!','type'=>'success']);
             return redirect()->route('show-list');
        }
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
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
            $projects_data = ProjectList::query()->with('lists', function($q){
                $q->select(DB::raw('list_id,COUNT(project_id) as pcount'))->groupby('list_id');
               
            })
            
            ->paginate($this->records_limit);
          
             return view('admin.projectList.list',compact('projects_data'));
        }
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        try
        {
            $project_data=UserProject::query()
            ->with('projectOnlyImage')
            ->paginate($this->records_limit);
            $project_data = $project_data->toArray();

            return view('admin.projectList.search',compact('id','project_data'));
        }
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }

    }
    public function edit($id)
    {
        //
    }
    public function search_project(Request $request)
    {
        try
        {
            $id = $request->id;
            $project_list_project = ProjectListProjects::query()->where('list_id',$id)->pluck('project_id')->toArray();
            $project_list_project = array_unique(array_values($project_list_project));
            $is_added_only = true;
            $is_filter_applied = false;
            $search_data=(!empty($request->name))?$request->name:'';
            if(!isset($request->name) && count($project_list_project)==0)
            {
                $is_added_only = false;
            }
            else if(!empty($search_data))
            {
                $is_added_only = false;
                $is_filter_applied = true;
            }
            $project_data=UserProject::query()
            ->with('projectOnlyImage')
            ->where(function($q)use($is_filter_applied,$search_data,$project_list_project){
                if($is_filter_applied){
                    $q->where('project_name', 'like' ,"%$search_data%");
                    $q->whereNotIn('id', $project_list_project);
                }
                else if(!empty($project_list_project))
                {
                    $q->whereIn('id', $project_list_project);
                }
            })
            
            ->paginate($this->records_limit);

            //     echo '<pre>';
            // print_r($project_data->toArray());
            // die;
            
            return view('/admin.projectList.search',compact('id','project_data','is_added_only'));
        }
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
    }

    public function saveSearchProjects(Request $request)
    {
       try
       {
        
        if (!empty(request('projects_id'))) {
            
            if (isset($request->add_edit)) {
                    
                $project=ProjectListProjects::where('list_id',$request->list_id);
                $project->delete();
            }
            foreach (request('projects_id') as $project_id) {
                
              
                
               $project = new ProjectListProjects();
               $project->list_id=$request->list_id;
               $project->project_id=$project_id;
               $project->save();
            }
            Session::flash('response', ['text'=>'Project Update successfull!','type'=>'success']);
            return back();
          }else{
            $project=ProjectListProjects::where('list_id',$request->list_id);
                    $project->delete();
                    return back()->with('messege','Update successfull');
          }
        
        }
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
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
            Session::flash('response', ['text'=>'Status Update successfull!','type'=>'success']);
            return redirect('/admin/project-list/list');
        }
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
    }

    public function deleteList(Request $request, $id)
    {
        try
        {
            $delete_list=ProjectList::where('id',$id);
            $delete_list->delete();
            $delete_search_list=ProjectListProjects::where('list_id',$id);
            $delete_search_list->delete();
            Session::flash('response', ['text'=>'Project delete successfully!','type'=>'success']);
            return redirect('/admin/project-list/list');
        }
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
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
