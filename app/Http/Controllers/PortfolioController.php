<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPortfolio;
use Exception;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::query()->find(auth()->user()->id);
        return view('user.profile_portfolio', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::query()->find(auth()->user()->id);
        return view('user.profile_portfolio', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $portfolio = new UserPortfolio();
            $portfolio->user_id = $user->id;
            $portfolio->project_title = $request->project_title;
            $portfolio->project_title = $request->project_title;
            $portfolio->description = $request->description;
            $portfolio->completion_date = $request->completion_date;
            $portfolio->project_country_id = '5';
            // $portfolio->video = $request->video;
           
            if($portfolio->save()){
                $experience = $portfolio;
                // Session::flash('response', ['text'=>'Profile added successfully','type'=>'success']);
                return view('user.profile_experience', compact('experience'));
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('Somethig went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
