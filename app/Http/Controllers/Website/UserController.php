<?php

namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use App\Http\Requests\PostUserPortfolioRequest;
use App\Http\Requests\StoreProfileUpdate;
use App\Models\AgeRange;
use App\Models\Endorsement;
use App\Models\MasterCountry;
use App\Models\MasterLanguage;
use App\Models\MasterSkill;
use App\Models\MasterState;
use App\Models\User;
use App\Models\UserExperience;
use App\Models\UserLanguage;
use App\Models\UserPortfolio;
use App\Models\UserPortfolioImage;
use App\Models\UserPortfolioSpecificSkills;
use App\Models\UserProject;
use App\Models\UserQualification;
use App\Models\UserSkill;
use App\Notifications\ContactUser;
use App\Notifications\EndorseUser;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class UserController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    // View routes function
    public function profilePrivateShow(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $portfolio = UserPortfolio::query()
                ->with('getPortfolio')
                ->where('user_id', $user->id)
                ->get()
                ->toArray();

            $experience = UserExperience::query()->where('user_id', $user->id)->get();
            $qualification = UserQualification::query()->where('user_id', $user->id)->get();
            $user_country = MasterCountry::query()->where('id', $user->country_id)->first();
            $user_age = AgeRange::query()->where('id', $user->age)->first();

            // $user_state = MasterState::query()->where('id',$user->state_id)->first();
            $user_skills = UserSkill::query()
                ->with('getSkills')
                ->where('user_id', $user->id)
                ->get()
                ->toArray();

            $user_languages = UserLanguage::query()
                ->with('getLanguages')
                ->where('user_id', $user->id)
                ->get()
                ->toArray();
            // Endorsement
            $user_endorsement = Endorsement::query()->with('endorsementCreater')->where('to',$user->id)
                                ->orderByDesc('id')->limit(5)->get();
            return view('website.user.profile_private_view', compact(['user', 'portfolio', 'experience', 'qualification', 'user_country', 'user_age', 'user_skills', 'user_languages','user_endorsement']));
        } catch (Exception $e) {
            return back()->with('error', "Something went wrong");
        }
    }


    public function profilePublicShow()
    {
        try {
            $id=request('id');
            $user = User::query()->find($id);            
            $portfolio = UserPortfolio::query()
                ->with('getPortfolio')
                ->where('user_id', $user->id)
                ->get()
                ->toArray();

            $experience = UserExperience::query()->where('user_id', $user->id)->get();
            $qualification = UserQualification::query()->where('user_id', $user->id)->get();
            $user_country = MasterCountry::query()->where('id', $user->country_id)->first();
            $user_age = AgeRange::query()->where('id', $user->age)->first();
            $user_skills = $this->userSkills($user->id);
            $UserProject = UserProject::query()->with('projectImage')->where('user_id',$user->id)->get();
            
            $user_languages = UserLanguage::query()
                ->with('getLanguages')
                ->where('user_id', $user->id)
                ->get()
                ->toArray();
            // Endorsement
            $user_endorsement = Endorsement::query()->with('endorsementCreater')->where('to',$user->id)
                                ->orderByDesc('id')->limit(5)->get();
                                // dd($user_endorsement);
                               
            return view('website.user.profile_public_view', compact(['user', 'portfolio', 'experience', 'qualification', 'user_country', 'user_age', 'user_skills', 'user_languages','user_endorsement', 'UserProject']));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function userSkills($user_id)
    {
        return UserSkill::query()
        ->with('getSkills')
        ->where('user_id', $user_id)
        ->get()
        ->toArray();
    }

    public function profileCreate()
    {
        try {
            $user = User::query()->with(['country', 'language', 'skill'])->find(auth()->user()->id);

            $temp_lang = [];
            foreach ($user->language as $k => $v) {
                array_push($temp_lang, $v->language_id);
            }
            $user->language = $temp_lang;

            $temp_skill = [];
            foreach ($user->skill as $k => $v) {
                array_push($temp_skill, $v->skill_id);
            }
            $user->skill = $temp_skill;

            $skills = MasterSkill::query()->get();
            $languages = MasterLanguage::query()->orderBy('name', 'ASC')->get();
            $country = MasterCountry::query()->orderBy('name', 'ASC')->get();
            $state = MasterState::query()->get();
            $age = AgeRange::query()->get();
            return view('website.user.profile_create', compact(['user', 'skills', 'languages', 'country', 'state', 'age']));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function profileStore(StoreProfileUpdate $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->job_title = $request->job_title;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->gender_pronouns = $request->gender_pronouns;
            $user->about = $request->about;
            $user->available_to_work_in = $request->available_to_work_in;
            $user->country_id = $request->Located_in;
            $user->state_id = $request->state;
            $user->imdb_profile = $request->imdb_profile;
            $user->linkedin_profile = $request->linkedin_profile;
            $user->website = $request->website;
            $user->intro_video_link = $request->intro_video_link;

            if ($request->croppedImg) {


                $image_64 = $request->croppedImg; //your base64 encoded data

                $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
              
                $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
              
              // find substring fro replace here eg: data:image/png;base64,
              
               $image = str_replace($replace, '', $image_64); 
              
               $image = str_replace(' ', '+', $image); 
              
               $fileName = Str::random(10).'.'.$extension;
                $locationPath  = "user/";
                
                $nameStr = date('_YmdHis');
                $newName = $nameStr .  $fileName ;
                 $path = $this->uploadFile($locationPath,base64_decode($image), $newName);
             

                // $file = $request->file('croppedImg');
                // $originalFile = $file->getClientOriginalName();
                // $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);

                // $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                // $nameStr = date('_YmdHis');
                // $newName = $fileName . $nameStr . '.' . $fileExt;
                // $locationPath  = "user";
                // $uploadFile = $this->uploadFile($locationPath, $file, $newName);
                // $user->profile_image = $uploadFile;



              
                $user->profile_image = $locationPath.$newName;
            }
            if ($user->save()) {
                if (isset($request->skills)) {
                    UserSkill::query()->where('user_id', auth()->user()->id)->delete();
                    foreach ($request->skills as $k => $v) {
                        $userSkills = new UserSkill();
                        $userSkills->user_id = $user->id;
                        $userSkills->skill_id = $v;
                        $userSkills->save();
                    }
                }
                if (isset($request->languages)) {
                    UserLanguage::query()->where('user_id', auth()->user()->id)->delete();
                    foreach ($request->languages as $k => $v) {
                        $userLanguages = new UserLanguage();
                        $userLanguages->user_id = $user->id;
                        $userLanguages->language_id = $v;
                        $userLanguages->save();
                    }
                }
                return redirect()->route('portfolio-create')->with("success", "User details updated successfully.");
            } else {
                return back()->with('error', 'Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    // User profile Portfolio
    public function portfolioCreate(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $country = MasterCountry::query()->orderBy('name', 'ASC')->get();
            $skills = MasterSkill::query()->get();
            $portfolio = $user;
            return view('website.user.profile_portfolio', compact('portfolio', 'country', 'skills'));
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }

    public function portfolioStore(PostUserPortfolioRequest $request)
    {
        try {
            if (
                !$request->project_title && !$request->description && !$request->completion_date && !$request->project_country_id &&
                !$request->video && !$request->project_image_1 && !$request->project_image_2 && !$request->project_image_3
            ) {
                return redirect()->route('experience-create');
            }


            $user = User::query()->find(auth()->user()->id);
            $portfolio = new UserPortfolio();

            $portfolio->user_id = $user->id;
            $portfolio->project_title = $request->project_title;
            $portfolio->description = $request->description;
            $portfolio->completion_date = $request->completion_date;
            $portfolio->project_country_id = $request->project_country_id;
            $portfolio->video = $request->video;

            if ($portfolio->save()) {
                if (isset($request->project_specific_skills_id)) {
                    UserPortfolioSpecificSkills::query()->where('portfolio_id', $portfolio->id)->delete();
                    $user_portfolio_specific_skills = new UserPortfolioSpecificSkills();
                    $user_portfolio_specific_skills->portfolio_id = $portfolio->id;
                    $user_portfolio_specific_skills->project_specific_skills_id = $request->project_specific_skills_id;
                    $user_portfolio_specific_skills->save();
                }
            }

            $data_to_insert = [];
            foreach ($request->toArray() as $k => $v) {
                if (substr($k, 0, 14) == 'project_image_') {
                    $image_file_name = $k;
                    if ($request->hasFile($image_file_name)) {
                        $file = $request->file($image_file_name);
                        $originalFile = $file->getClientOriginalName();
                        $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
                        $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                        $nameStr = date('_YmdHis');
                        $newName = $fileName . $nameStr . '.' . $fileExt;
                        $locationPath  = "project/image";
                        $uploadFile = $this->uploadFile($locationPath, $file, $newName);
                        $data_to_insert[] = [
                            'file_type' => 'image',
                            'file_link' => $uploadFile
                        ];
                    }
                }
            }

            foreach ($data_to_insert as $k => $v) {
                $projectMedia = new UserPortfolioImage();
                $projectMedia->portfolio_id = $portfolio->id;
                $projectMedia->file_type = $v['file_type'];
                $projectMedia->file_link = $v['file_link'];
                $projectMedia->save();
            }
            $experience = $portfolio;
            if ($request->flag == 'privateView') {
                return redirect()->route('profile-private-show')->with("success", "Portfolio added successfully.");
            }
            return redirect()->route('experience-create')->with("success", "Portfolio created successfully.");
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }

    public function portfolioEdit($id)
    {
        try {
            $UserPortfolioData = UserPortfolio::query()->where('id', $id)->first();
            if (is_null($UserPortfolioData)) {
                return back()->withError('This portfolio is not exist');
            } else {
                $skills = MasterSkill::query()->get();
                $country = MasterCountry::query()->orderBy('name', 'ASC')->get();
                $UserPortfolioEdit = UserPortfolio::query()->where('id', $id)->get();
                $UserPortfolioImages = UserPortfolioImage::query()->where('portfolio_id', $id)->get();
                $UserPortfolioSkills = UserPortfolioSpecificSkills::query()->where('portfolio_id', $id)->get();
                $portfolio_skills_ids = [];
                foreach ($UserPortfolioSkills as $k => $v) {
                    $portfolio_skills_ids[] = $v->id;
                }
                $user_portfolio_skill = UserPortfolioSpecificSkills::query()
                    ->whereIn('id', $portfolio_skills_ids)
                    ->get()
                    ->toArray();

                return view('website.user.profile_portfolio_edit', compact('UserPortfolioEdit', 'UserPortfolioImages', 'user_portfolio_skill', 'skills', 'country'));
            }
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }

    public function portfolioEditStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $portfolio = UserPortfolio::query()->where('id', $request->portfolio_id)->first();
            $portfolio->user_id = $user->id;
            $portfolio->project_title = $request->project_title;
            $portfolio->description = $request->description;
            $portfolio->completion_date = $request->completion_date;
            $portfolio->project_country_id = $request->project_country_id;
            $portfolio->video = $request->video;

            if ($portfolio->update()) {
                if (isset($request->project_specific_skills_id)) {
                    UserPortfolioSpecificSkills::query()->where('portfolio_id', $request->portfolio_id)->delete();
                    $user_portfolio_specific_skills = new UserPortfolioSpecificSkills();
                    $user_portfolio_specific_skills->portfolio_id = $request->portfolio_id;
                    $user_portfolio_specific_skills->project_specific_skills_id = $request->project_specific_skills_id;
                    $user_portfolio_specific_skills->save();
                }
            }

            $data_to_insert = [];
            foreach ($request->toArray() as $k => $v) {
                if (substr($k, 0, 14) == 'project_image_') {
                    $image_file_name = $k;
                    if ($request->hasFile($image_file_name)) {
                        $file = $request->file($image_file_name);
                        $originalFile = $file->getClientOriginalName();
                        $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
                        $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                        $nameStr = date('_YmdHis');
                        $newName = $fileName . $nameStr . '.' . $fileExt;
                        $locationPath  = "project/image";
                        $uploadFile = $this->uploadFile($locationPath, $file, $newName);
                        $data_to_insert[] = [
                            'file_type' => 'image',
                            'file_link' => $uploadFile
                        ];
                    }
                }
            }

            foreach ($data_to_insert as $k => $v) {
                $projectMedia = new UserPortfolioImage();
                $projectMedia->portfolio_id = $request->portfolio_id;
                $projectMedia->file_type = $v['file_type'];
                $projectMedia->file_link = $v['file_link'];
                $projectMedia->save();
            }
            return redirect()->route('profile-private-show')->with("success", "Portfolio updated successfully.");
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }


    // User profile experience

    public function experienceCreate(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $experience = $user;
            return view('website.user.profile_experience');
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }

    public function experienceStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [

                'start_date' => 'required|date_format:Y-m-d',
                'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            if (
                !$request->job_title && !$request->comapny && !$request->country_id && !$request->start_date &&
                !$request->end_date && !$request->employement_type_id && !$request->description
            ) {
                return redirect()->route('qualification-create');
            }
            $user = User::query()->find(auth()->user()->id);
            $experience = new UserExperience();
            $experience->user_id = $user->id;
            $experience->job_title = $request->job_title;
            $experience->comapny = $request->comapny;
            $experience->country_id = $request->country_id;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->employement_type_id = $request->employement_type_id;
            $experience->description = $request->description;

            if ($experience->save()) {
                $qualification = $experience;
                if ($request->flag == 'privateView') {
                    return redirect()->route('profile-private-show')->with("success", "Experience added successfully.");
                }
                return redirect()->route('qualification-create')->with("success", "Experience added successfully.");
            } else {
                return back()->withError('Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }


    public function experienceEdit($id)
    {
        try {
            $UserExperienceData = UserExperience::query()->where('id', $id)->first();
            if (is_null($UserExperienceData)) {
                return back()->withError('This experience is not exist');
            } else {
                return view('website.user.profile_experience_edit', compact('UserExperienceData'));
            }
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }

    public function experienceEditStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [

                'start_date' => 'required|date_format:Y-m-d',
                'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user = User::query()->find(auth()->user()->id);
            $experience = UserExperience::query()->where('id', $request->experience_id)->first();
            $experience->user_id = $user->id;
            $experience->job_title = $request->job_title;
            $experience->comapny = $request->comapny;
            $experience->country_id = $request->country_id;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->employement_type_id = $request->employement_type_id;
            $experience->description = $request->description;
            if ($experience->update()) {
                return redirect()->route('profile-private-show')->with("success", "Experience added successfully.");
            } else {
                return back()->with('Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    // User profile qualification

    public function qualificationCreate(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $qualification = $user;
            return view('website.user.profile_qualification', compact('qualification'));
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }

    public function qualificationStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);

            $qualification = new UserQualification();
            $qualification->user_id = $user->id;
            $qualification->institue_name = $request->institue_name;
            $qualification->degree_name = $request->degree_name;
            $qualification->feild_of_study = $request->feild_of_study;
            $qualification->start_year = $request->start_year;
            $qualification->end_year = $request->end_year;
            $qualification->description = $request->description;

            if ($qualification->save()) {
                if ($request->flag == 'privateView') {
                    return redirect()->route('profile-private-show')->with("success", "Qualification added successfully.");
                }
                return redirect()->route('profile-private-show');
            } else {
                return back()->withError('error', 'Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }

    public function qualificationEdit($id)
    {
        try {
            $UserQualificationData = UserQualification::query()->where('id', $id)->first();
            return view('website.user.profile_qualification_edit', compact('UserQualificationData'));
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }

    public function qualificationEditStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);

            $qualification = UserQualification::query()->where('id', $request->qualification_id)->first();
            $qualification->user_id = $user->id;
            $qualification->institue_name = $request->institue_name;
            $qualification->degree_name = $request->degree_name;
            $qualification->feild_of_study = $request->feild_of_study;
            $qualification->start_year = $request->start_year;
            $qualification->end_year = $request->end_year;
            $qualification->description = $request->description;
            if ($qualification->update()) {
                return redirect()->route('profile-private-show')->with("success", "Qualification added successfully.");
            } else {
                return back()->withError('Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->withError('error', 'Something went wrong.');
        }
    }


    public function deactivateAccount()
    {   $user= User::find(auth()->user()->id);
        Auth::logout();
        $user->delete();
        return redirect('/login');

    }

    public function contactMailStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email_1' => 'required|email',
                'message' => 'required|string',
                'subject' => 'required|string',
            ]);

            if ($validator->fails()) {
                return ['satus'=>0,'msg'=>$validator->errors()->first()];
            }
            $email = '';
            if(!$_REQUEST['email_1'] && !$_REQUEST['message'] && !$_REQUEST['subject']){
                return ['satus'=>0,'msg'=>"Email or message or subject fields can not be empty."];
            }
            if(!empty($_REQUEST['email_1']) ){
                $email = $_REQUEST['email_1'];
                $collect = collect();
                $collect->put('url','https://www.youtube.com/');
                Notification::route('mail', $email)->notify(new ContactUser($collect));                
            }
            return ['status'=>1,'msg'=>"Email has been sending by contact email."];           
        } catch (Exception $e) {
            return ['status'=>0,'msg'=>"Something went wrong."];
        }
    }

    public function endorseMailStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'endorse_email' => 'required|email',
                'endorse_message' => 'required|string',
            ]);

            if ($validator->fails()) {
                return ['satus'=>0,'msg'=>$validator->errors()->first()];
            }
            $email = '';
            if(!$_REQUEST['endorse_email'] && !$_REQUEST['endorse_message']){
                return ['satus'=>0,'msg'=>"Endorse email or message or subject fields can not be empty."];
            }
            if(!empty($_REQUEST['endorse_email']) ){
                $email = $_REQUEST['endorse_email'];
                $collect = collect();
                $collect->put('url','https://www.google.com/');
                Notification::route('mail', $email)->notify(new EndorseUser($collect));                
            }
            return ['status'=>1,'msg'=>"Email has been sending by endorse email."];           
        } catch (Exception $e) {
            return ['status'=>0,'msg'=>"Something went wrong."];
        }
    }
}

