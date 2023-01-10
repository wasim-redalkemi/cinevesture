<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\MasterProjectCategory;
use App\Models\MasterProjectGenre;
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
            $project_list->status=$request->status;
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
            if($request->favorited=='0'){
                $a='2';
            }
            if($request->project_verified=='0'){
                $b='3';
            }
            $search_data=(!empty($request->category) || !empty($request->genre) || !empty($request->from_date) || !empty($request->to_date) || !empty($request->favorited) || !empty($request->project_verified) || !empty($request->search)|| !empty($a) || !empty($b))?count([$request->category,$request->genre]):'';
            if((!isset($request->name) || !isset($request->category) || !isset($request->genre) || !isset($request->from_date) || !isset($request->to_date) || !isset($request->favorited) || !isset($request->project_verified) || !isset($request->search) ) && count($project_list_project)==0)
            {
                $is_added_only = false;
            }
            else if(!empty($search_data))
            {
                $is_added_only = false;
                $is_filter_applied = true;
            }
            if(!empty($search_data)){
                $is_filter_applied = true;
            }
            $categories=MasterProjectCategory::query()->get();
            $genres=MasterProjectGenre::query()->get();
            $project_data=UserProject::query()
            ->with('projectOnlyImage')
        
            ->where(function($q)use($is_filter_applied,$search_data,$project_list_project,$request){
                if($is_filter_applied){
                    // $q->where('project_name', 'like' ,"%$search_data%");
                    
                    if (isset($request->category)) { // search name of user
                        $q->whereHas('projectCategory', function ($q) use($request){
                        $q->where('category_id',$request->category);
                     });
                    }
                    if (isset($request->genre)) { // search name of user
                        $q->whereHas('genres', function ($q) use($request){
                            $q->where('gener_id',$request->genre);
                        });
                    }
                    if(isset($request->from_date) && isset($request->to_date)){
                        $from=$request->from_date.' '.'00:00:00';
                        $to=$request->to_date.' '.'23:59:59';
                        $q->whereBetween("created_at",[$from,$to]);
                    }
                    if (isset($request->favorited)) {
                        $q->where("favorited",$request->favorited);
                    }
                    if (isset($request->project_verified)) {
                        $q->where("project_verified",$request->project_verified);
                    }
                    if (isset($request->search)) {
                        $q->where("project_name","like","%$request->search%");
                    }
                    $q->whereNotIn('id', $project_list_project);
                    

                }
                else if(!empty($project_list_project))
                {
                    $q->whereIn('id', $project_list_project);
                }
            })
            ->where("user_status","published")
            ->paginate($this->records_limit);
            //     ->where(function ($q) use ($request) {

        //         if (isset($request->category)) { // search name of user
        //             $q->whereHas('projectCategory', function ($q) use($request){
        //             $q->where('category_id',$request->category);
        //         });
        //         }
        //         if (isset($request->genre)) { // search name of user
        //             $q->whereHas('genres', function ($q) use($request){
        //                 $q->where('gener_id',$request->genre);
        //             });
        //         }
        //         if(isset($request->from_date) && isset($request->to_date)){
        //             $from=$request->from_date.' '.'00:00:00';
        //             $to=$request->to_date.' '.'23:59:59';
        //             $q->whereBetween("created_at",[$from,$to]);
        //         }
        //         if (isset($request->favorited)) {
        //             $q->where("favorited",$request->favorited);
        //         }
        //         if (isset($request->project_verified)) {
        //             $q->where("project_verified",$request->project_verified);
        //         }
        //         if (isset($request->search)) {
        //             $q->where("project_name","like","%$request->search%");
        //         }
                
        // })
            
            return view('/admin.projectList.search',compact('id','project_data','is_added_only','categories','genres'));
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

    public function changeStatus(Request $request)
    {
        try
        {
            ProjectList::where("id", $request->id)->update(["status" => $request->status]);
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
    public function project_list_edit(request $request,$id)
    {
        try {
            
            $projectList=ProjectList::query()->where('id',$id)->first();
            return view('/admin.projectList.edit',compact('projectList'));
        } catch (\Throwable $e) {
           return back()->with($e->getMessage());        }
    }
    public function project_list_update(request $request)
    {
        try {
            $projectList=ProjectList::query()->where('id',$request->id)->first();
            $projectList->list_name=$request->name;
            $projectList->save();
            
            Session::flash('response', ['text'=>'Project list name update successfully!','type'=>'success']);
            return redirect()->route('show-list');
            // toastr() ->success('Promote update successfully!', 'Congrats');
            
        } catch (\Throwable $e) {
            $e->getMessage();
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
