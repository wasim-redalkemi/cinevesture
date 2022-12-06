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
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
            $categories=MasterProjectCategory::query()->get();
            $genres=MasterProjectGenre::query()->get();
            $projects = UserProject::query()
            ->with(['user','projectCategory','genres'])
            ->where(function ($q) use ($request) {
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
                    if (isset($request->Recommended_badge)) {
                        $q->where("Recommended_badge",$request->Recommended_badge);
                    }
                    if (isset($request->search)) {
                        $q->where("project_name","like","%$request->search%");
                    }
            })
            ->paginate($this->records_limit);
                return view('admin.project.list',compact('projects','categories','genres'));
        } 
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
        // catch (\Throwable $e) {
        // return back()->withErrors($e->getMessage());
        // }
    }
    public function markFavorite(Request $request)
    {
        try {
        $fav=($request->s);
            
            $project=UserProject::where('id',$request->p)->first();
            $project->favorited = $request->s;
            $project->save();
            if($fav==0){
                toastr() ->success('Unfavorite update successfully!', 'Congrats');
            // Session::flash('response', ['text'=>'Unfavorite update sucessfully','type'=>'success']);
            }else{
                toastr() ->success('Favorite update successfully!', 'Congrats');
                // Session::flash('response', ['text'=>'Favorite update sucessfully','type'=>'success']);
            }
            return back();
        } 
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
        // catch (\Throwable $e) {
        //     return back($e);
        // }
    }
    public function markRecommended(Request $request)
    {
        try {
            
            $rec=($request->s);
            $project=UserProject::where('id',$request->p)->first();
            $project->Recommended_badge = $request->s;
            $project->save();
            if($rec==0){
                toastr() ->success('Unrecommend update successfully!', 'Congrats');
                // Session::flash('response', ['text'=>'Unrecommend update sucessfully','type'=>'success']);
                }else{
                    toastr() ->success('Recommend update successfully!', 'Congrats');
                    // Session::flash('response', ['text'=>'Recommend update sucessfully','type'=>'success']);
                }
            return back();
        } 
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
        // catch (\Throwable $e) {
        //     return back($e);
        // }
    }
    public function changeStatus(Request $request)
    {
        try {
            
        
            $project=UserProject::where('id',$request->pId)->first();
            $project->project_verified = $request->status;
            $project->save();
            toastr() ->success('Status update successfully!', 'Congrats');
            // Session::flash('response', ['text'=>'Status update sucessfully','type'=>'success']);
            return back();
        } 
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
        // catch (\Throwable $e) {
        //     return back($e);
        // }
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
        try {
            
       
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
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
    }    
    public function categoryUpdate(request $request)
    {
      try {
      
        $project = ProjectCategory::query()->where('project_id',$request->p_id)->delete();
        if (!empty(request('category'))) {
          foreach (request('category') as $value) {
             $project = new ProjectCategory();
             $project->project_id=$request->p_id;
             $project->category_id=$value;
             $project->save();
             
          }
          toastr() ->success('Category update successfully!', 'Congrats');
        //   Session::flash('response', ['text'=>'Category update sucessfully','type'=>'success']);
          return redirect(route('admin-project-list'));
        }
      } 
      catch (Exception $e)
      {
          Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
          return back();
      }
    //   catch (\Throwable $e) {
    //     return back()->withErrors($e->getmessage);
    //   }
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
        } 
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
        // catch (\Throwable $e) {
        //     return back()->withErrors($e->getmessage());
        // }
        
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
              toastr() ->success('Genre update successfully!', 'Congrats');
            //   Session::flash('response', ['text'=>'Genre update successfully','type'=>'success']);
              return redirect(route('admin-project-list'));
              
            };
        }
       
      }
      catch (Exception $e)
      {
          Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
          return back();
      };
    //   catch (\Throwable $e) {
    //     return back()->withErrors($e->getMessage());
    //   };
    }
}
