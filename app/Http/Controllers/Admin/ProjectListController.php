<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\AppUtilityController;
use App\Models\ListFilters;
use App\Models\MasterCountry;
use App\Models\MasterGender;
use App\Models\MasterLanguage;
use App\Models\MasterProjectCategory;
use App\Models\MasterProjectGenre;
use App\Models\ProjectCategory;
use App\Models\ProjectCountry;
use App\Models\ProjectGenre;
use App\Models\ProjectLanguage;
use App\Models\ProjectList;
use App\Models\ProjectListCategories;
use App\Models\ProjectListFilters;
use App\Models\ProjectMedia;
use App\Models\ProjectListProjects;
use App\Models\UserProject;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
            $categories=MasterProjectCategory::query()->get();
            $genre=MasterProjectGenre::query()->get();
            $language=MasterLanguage::query()->get();
            $location=MasterCountry::query()->get();
             return view('admin.projectList.create')->with(compact('categories','genre','language','location'));
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
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'status' => 'required',
                'type' => 'required',
            ]);
            if ($validator->fails()) {
                Session::flash('response', ['text'=>'Project list name update successfully!','type'=>'danger']);
               return back();
            }else{
            $project_list= new ProjectList();
            $project_list->list_name=$request->name;
            $project_list->status=$request->status;
            $project_list->type=$request->type;
            $project_list->save();
            
            if($project_list->type == 'automated')
            {
                $projectList = new ProjectListFilters();
                $projectList->list_id=$project_list->id;
                $projectList->category_id=(isset($request->categories) && !empty($request->categories))?implode(',',$request->categories):'';
                $projectList->genre_id=$request->genre;
                $projectList->language_id=(isset($request->language)&& !empty($request->language))?implode(',',$request->language):"";
                $projectList->location_id=(isset($request->location)&& !empty($request->location))?implode(',',$request->location):"";
                $projectList->recommendation=$request->recommended;
                $projectList->favorite=$request->favorite;
                $projectList->save();
                $aa=new AppUtilityController();
                $aa->listAutomation();
                // AppUtilityController::listAutomation();
                
            }

             return redirect()->route('show-list');
            }
        }
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
    }

    
    public function listAutomation()
    {
        // AppUtilityController::listAutomation();
        $aa=new AppUtilityController();
            $aa->listAutomation();
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
                
            ->paginate(30);        
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
            $list_type= ProjectList::query()->where('id',$id)->get();
            $list_name = $request->name;
            $project_list_project = ProjectListProjects::query()->where('list_id',$id)->pluck('project_id')->toArray();
            $project_list_project = array_unique(array_values($project_list_project));
            $is_added_only = true;
            $is_filter_applied = ((isset($request->category) || isset($request->genre) || isset($request->from_date) || isset($request->to_date) || isset($request->favorited) || isset($request->project_verified) || isset($request->search) ))?true:false;
            $search_data=(!empty($request->search))?$request->search:'';
            
            if(($is_filter_applied && count($project_list_project)==0) || (count($project_list_project)==0) || ($is_filter_applied))
            {
                $is_added_only = false;
            }
            // else if(count($project_list_project)==0)
            // {
            //     $is_added_only = false;
            // }
            // else if($is_filter_applied)
            // {
            //     $is_added_only = false;
            // }
            $categories=MasterProjectCategory::query()->get();
            $genres=MasterProjectGenre::query()->get();
            $project_data=UserProject::query()
            ->with('projectOnlyImage')
        
            ->where(function($q)use($is_filter_applied,$search_data,$project_list_project,$request,$list_type){
                if($is_filter_applied){
                    // $q->where('project_name', 'like' ,"%$search_data%");
                    if (isset($request->category)) {
                        $q->whereHas('projectCategory', function ($q) use($request){
                        $q->where('category_id',$request->category);
                     });
                    }
                    if (isset($request->genre)) {
                        $q->whereHas('genres', function ($q) use($request){
                            $q->where('gener_id',$request->genre);
                        })->orWhere("primary_genre_id",$request->genre);
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
                else if($list_type[0]->type == 'automated')
                {
                    $q->whereIn('id', [0]);
                }
            })
            ->orderBy('created_at', 'desc')
            // ->where("user_status","published")
            ->paginate($this->records_limit);
            return view('/admin.projectList.search',compact('id','project_data','is_added_only','categories','genres','list_name','list_type'));
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
            }
            else{
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
        try
        {   
            $genre=MasterProjectGenre::query()->get();
            $language=MasterLanguage::query()->get();
            $location=MasterCountry::query()->get();
            $categories=MasterProjectCategory::query()->get();
            $projectList=ProjectList::query()->where('id',$id)->with(['ProjectListFilters'])->first();
            return view('/admin.projectList.edit',compact('projectList','categories','genre','language','location'));
        } 
        catch(\Throwable $e)
        {
           return back()->with($e->getMessage());        
        }
    }
    public function project_list_update(request $request)
    {
        try 
        {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                Session::flash('response', ['text'=>'Project list name update successfully!','type'=>'danger']);
                return back();
            }
            $projectList=ProjectList::query()->where('id',$request->id)->first();
            $projectList->list_name=$request->name;
            $projectList->status=$request->status;
            // $projectList->type=$request->type;
            $projectList->save();

            if( $projectList->type == 'automated')
            {
                
                $projectListFilters = ProjectListFilters::query()->where('list_id',$projectList->id)->first();
                $projectListFilters->list_id=$projectList->id;
                $projectListFilters->category_id=(isset($request->categories)&& !empty($request->categories))?implode(',',$request->categories):"";
                $projectListFilters->genre_id=$request->genre;
                $projectListFilters->language_id=(isset($request->language)&& !empty($request->language))?implode(',',$request->language):"";
                $projectListFilters->location_id=(isset($request->location)&& !empty($request->location))?implode(',',$request->location):"";
                $projectListFilters->recommendation=$request->recommended;
                $projectListFilters->favorite=$request->favorite;
                $projectListFilters->save();
                // AppUtilityController::listAutomation();
                $aa=new AppUtilityController();
                $aa->listAutomation();
            }
            Session::flash('response', ['text'=>'Project list name update successfully!','type'=>'success']);
            return redirect()->route('show-list');
            // toastr() ->success('Promote update successfully!', 'Congrats');
        } 
        catch(\Throwable $e)
        {
            return back()->with($e->getMessage());        
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
