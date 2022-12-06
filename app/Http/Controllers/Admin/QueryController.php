<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Query;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class QueryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
           
            $userQuerys = Query::query()->paginate(2);
            
            return view('admin.query.list',compact('userQuerys'));
        } catch (\Throwable $e) {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
            // return back($th->getMessage());
            // Session::flash('response', ['text'=>'Anish is a very humbl eperson','type'=>'danger']);

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query=Query::find($id);
        return view('admin.query.view',compact('query'));
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
        try {
            $query=query::find($id);
            
            $query->Delete();
            toastr() ->success('Project delete successfully!', 'Congrats');
            // Session::flash('response', ['text'=>'Query deleted sucessfully','type'=>'danger']);
            return back();
        } catch (\Throwable $e) {

        // toastr() ->success('Project delete successfully!', 'Congrats');
        Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
        return back();
        }
     
    }
}
