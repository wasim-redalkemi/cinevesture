<?php

namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;

use App\Models\MasterCountry;
use App\Models\MasterLanguage;
use App\Models\MasterOrganisationService;
use App\Models\MasterOrganisationType;
use App\Models\UserOrganisation;
use App\Models\UserOrganisationLanguage;
use App\Models\UserOrganisationService;
use App\Notifications\TeamInvite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class OrganisationController extends WebController
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
            
            return view('website.user.organisation.organisation',compact(['UserOrganisation']));
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
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
            
            $temp_services = [];
            foreach ($UserOrganisation->organizationServices as $k => $v){
                array_push($temp_services, $v->services->id);
            }
            $UserOrganisation->organizationServices = $temp_services;

            $temp_languages = [];
            foreach ($UserOrganisation->organizationLanguages as $k => $v){
                array_push($temp_languages, $v->languages->id);
            }
            $UserOrganisation->organizationLanguages = $temp_languages;
            
            return view('website.user.organisation.organisation_create',compact(['languages','country','organisationType','organisationService','UserOrganisation']));
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
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
            $UserOrganisation = UserOrganisation::query()->where('user_id', auth()->user()->id)->first();
            if (!$UserOrganisation) {
                $UserOrganisation = new UserOrganisation();
            }
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


            if ($request->hasFile('logo')) {

                $file = $request->file('logo');
                $originalFile = $file->getClientOriginalName();
                $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
                $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                $nameStr = date('_YmdHis');
                $newName = $fileName . $nameStr . '.' . $fileExt;
                $locationPath  = "organisation";
                $uploadFile = $this->uploadFile($locationPath, $file, $newName);
                $UserOrganisation->logo = $uploadFile;
            }
            if ($UserOrganisation->save()) {
                if (isset($request->service_id)) {
                    UserOrganisationService::query()->where('organisation_id', $UserOrganisation->id)->delete();
                    foreach ($request->service_id as $k => $v) {
                        $UserOrganisationService = new UserOrganisationService();
                        $UserOrganisationService->organisation_id = $UserOrganisation->id;
                        $UserOrganisationService->services_id = $v;
                        $UserOrganisationService->save();
                    }
                }
                if (isset($request->language_id)) {
                    UserOrganisationLanguage::query()->where('organisation_id', $UserOrganisation->id)->delete();
                    foreach ($request->language_id as $k => $v) {
                        $UserOrganisationLanguage = new UserOrganisationLanguage();
                        $UserOrganisationLanguage->organisation_id = $UserOrganisation->id;
                        $UserOrganisationLanguage->language_id = $v;
                        $UserOrganisationLanguage->save();
                    }
                }
                return redirect()->route('organisation-private-view')->with("success", "User organisation updated successfully.");
            } else {
                return back()->withError('error', 'Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
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

    public function createTeam()
    {
        return view('website.user.organisation.organisation');
    }

    public function teamStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [

                'email_1' => 'nullable|email',
                'email_2' => 'nullable|email',
            ]);

            if ($validator->fails()) {
                return ['satus'=>0,'msg'=>$validator->errors()->first()];
            }
            $email = '';
            if(!$_REQUEST['email_1'] && !$_REQUEST['email_2']){
                return ['satus'=>0,'msg'=>"Email fields can not be empty."];
            }
            if(!empty($_REQUEST['email_1']) ){
                $email = $_REQUEST['email_1'];
                $collect = collect();
                $collect->put('url','www.google.com');
                Notification::route('mail', $email)->notify(new TeamInvite($collect));
                
            }
            if(!empty($_REQUEST['email_2']) ){
                $email = $_REQUEST['email_2'];
                $collect = collect();
                $collect->put('url','www.google.com');
                Notification::route('mail', $email)->notify(new TeamInvite($collect));
            }
            return ['status'=>1,'msg'=>"Invite link has been gone by email."];           
        } catch (Exception $e) {
            return ['status'=>0,'msg'=>"Something went wrong."];
        }
    }
}
