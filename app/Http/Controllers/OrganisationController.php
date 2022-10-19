<?php

namespace App\Http\Controllers;

use App\Models\MasterCountry;
use App\Models\MasterLanguage;
use App\Models\MasterOrganisationService;
use App\Models\MasterOrganisationType;
use App\Models\UserOrganisation;
use App\Models\UserOrganisationLanguage;
use App\Models\UserOrganisationService;
use Exception;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $UserOrganisation = UserOrganisation::query()->with(['organizationLanguages.languages','organizationServices.services','country'])->where('user_id',auth()->user()->id)->first();
            
            return view('user.organisation.organisation',compact(['UserOrganisation']));

        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $organisationType = MasterOrganisationType::query()->get();
            $organisationService = MasterOrganisationService::query()->get();
            $UserOrganisation = UserOrganisation::query()->with(['organizationLanguages.languages','organizationServices.services','country'])->where('user_id',auth()->user()->id)->first();
            if (!isset($UserOrganisation)) {
                $UserOrganisation = '';
                return view('user.organisation.organisation_create',compact(['languages','country','organisationType','organisationService','UserOrganisation']));
            }
            return view('user.organisation.organisation_create',compact(['languages','country','organisationType','organisationService','UserOrganisation']));


        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
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
        try {
            UserOrganisation::query()->where('user_id',auth()->user()->id)->delete();
            
            $UserOrganisation =new UserOrganisation();

            $UserOrganisation->user_id = auth()->user()->id;
            $UserOrganisation->name = $request->name;
            $UserOrganisation->type = $request->organisation_type;
            $UserOrganisation->location_in = $request->located_in;
            $UserOrganisation->about = $request->name;
            $UserOrganisation->available_to_work_in = $request->available_to_work_in;
            $UserOrganisation->imdb_profile = $request->imdb_profile;
            $UserOrganisation->linkedin_profile = $request->linkedin_profile;
            $UserOrganisation->website = $request->website;
            $UserOrganisation->intro_video_link = $request->intro_video_link;
            $UserOrganisation->team_size = $request->team_size;


            if($request->hasFile('logo')) {

                $file = $request->file('logo');
                $originalFile = $file->getClientOriginalName();
                $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
                $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                $nameStr = date('_YmdHis');
                $newName = $fileName.$nameStr.'.'.$fileExt;
                $locationPath  = "organisation";
                $uploadFile = $this->uploadFile($locationPath , $file,$newName);
                $UserOrganisation->logo = $uploadFile;
            }
            if($UserOrganisation->save()) {
                if (isset($request->service_id)) {
                    UserOrganisationService::query()->where('organisation_id',$UserOrganisation->id)->delete();
                    foreach ($request->service_id as $k => $v) {
                        $UserOrganisationService = new UserOrganisationService();
                        $UserOrganisationService->organisation_id = $UserOrganisation->id;
                        $UserOrganisationService->services_id = $v;
                        $UserOrganisationService->save();
                    }
                }
                if (isset($request->language_id)) {
                    UserOrganisationLanguage::query()->where('organisation_id',$UserOrganisation->id)->delete();
                    foreach ($request->language_id as $k => $v) {
                        $UserOrganisationLanguage = new UserOrganisationLanguage();
                        $UserOrganisationLanguage->organisation_id = $UserOrganisation->id;
                        $UserOrganisationLanguage->language_id = $v;
                        $UserOrganisationLanguage->save();
                    }
                }
                return redirect()->route('organisation-private-view')->with("success","User organisation updated successfully.");
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }
           

        } catch (Exception $e) {
            // return back()->withError('error','Somethig went wrong.');
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
