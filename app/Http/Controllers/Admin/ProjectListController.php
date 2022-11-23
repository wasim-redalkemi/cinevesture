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
             return back()->with('error','Something went wrong.');
           
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
            return response()->json(["status"=>false,"message"=> $e->getMessage()]);
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
            return back()->withError('error','Something went wrong.');
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
            // dd($project_list_project);
            $search_data=(!empty($request->name))?$request->name:'';
            $project_data=UserProject::query()
            ->with('projectOnlyImage')
            ->where(function($q)use($search_data,$project_list_project){
                if(!empty($search_data) && !is_null($search_data)){
                    $q->where('project_name', 'like' ,"%$search_data%");
                }
                else
                {
                    $q->whereIn('id', $project_list_project);
                }
            })
            ->paginate($this->records_limit);
            $project_data = $project_data->toArray();
            return view('/admin.projectList.search',compact('id','project_data','project_list_project'));
        }
        catch (Exception $e) 
        {
            die($e->getMessage());
            return back()->withError('error','Something went wrong.');
        }
    }

    public function saveSearchProjects(Request $request)
    {
       try
       {
        
        if (!empty(request('projects_id'))) {
            foreach (request('projects_id') as $project_id) {
               $project = new ProjectListProjects();
               $project->list_id=$request->list_id;
               $project->project_id=$project_id;
               $project->save();
            }
            return back()->with('messege','Update successfull');;
            // with("success", "Project selected successfully.");
            
          }
            // foreach($request->projectids as $project){
                
            // $projectid = explode(',', $project);
            //     $data[] = [
            //         'project_id' =>$projectid[0],
            //         'list_id'  =>$projectid[1]
            //         ];
            //     }
            // ProjectListProjects::insert( $data );
            // return redirect('/admin/project-management/list')->with("success", "Project selected successfully.");
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
