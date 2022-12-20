<?php

namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use App\Http\Requests\PostUserPortfolioRequest;
use App\Http\Requests\ProfieQualificationRequest;
use App\Http\Requests\ProfileExperienceRequest;
use App\Http\Requests\StoreProfileUpdate;
use App\Models\AgeRange;
use App\Models\Endorsement;
use App\Models\MasterCountry;
use App\Models\MasterGender;
use App\Models\MasterGenderPronouns;
use App\Models\MasterLanguage;
use App\Models\MasterSkill;
use App\Models\MasterState;
use App\Models\User;
use App\Models\UserExperience;
use App\Models\UserLanguage;
use App\Models\UserPortfolio;
use App\Models\UserPortfolioImage;
use App\Models\UserPortfolioLocation;
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
            $user_gender = MasterGender::query()->where('id', $user->gender)->first();
            $user_gender_pronouns = MasterGenderPronouns::query()->where('id', $user->gender_pronouns)->first();

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
            $user_endorsement = Endorsement::query()->with('endorsementCreater')->where('to',$user->id)->where('status','1')
                                ->orderByDesc('id')->limit(5)->get();
            return view('website.user.profile_private_view', compact(['user', 'portfolio', 'experience', 'qualification', 'user_country', 'user_age', 'user_skills', 'user_languages','user_endorsement','user_gender','user_gender_pronouns']));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage()."Something went wrong");
        }
    }

    public function getPortfolio($id)
    {
        return $portfolio = UserPortfolio::query()
        ->with(['getPortfolio','getPortfolioSkill','getPortfolioLocation'])
        ->where('id', $id)
        ->first()
        ->toArray();
    }

    public function getPortfolioHtml(Request $request)
    {
        $data = $this->getPortfolio($request->portfolioId);
        $html = view('website.user.portfolio_modal',compact('data'))->render();
        return json_encode($html);
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
            $UserProject = UserProject::query()->with('projectImage')->where('user_id',$user->id)->where('status','published')->get();
            
            $user_languages = UserLanguage::query()
                ->with('getLanguages')
                ->where('user_id', $user->id)
                ->get()
                ->toArray();
            // Endorsement
            $user_endorsement = Endorsement::query()->with('endorsementCreater')->where('to',$user->id)->where('status','1')
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

            $skills = MasterSkill::query()->orderBy('name', 'ASC')->get();
            $languages = MasterLanguage::query()->orderBy('name', 'ASC')->get();
            $country = MasterCountry::query()->orderBy('name', 'ASC')->get();
            $state = MasterState::query()->orderBy('name', 'ASC')->get();
            $age = AgeRange::query()->get();
            $gender = MasterGender::query()->get();
            $genderPronouns = MasterGenderPronouns::query()->get();
            return view('website.user.profile_create', compact(['user', 'skills', 'languages', 'country', 'state', 'age','gender','genderPronouns']));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function profileStore(StoreProfileUpdate $request)
    {
        try {
            
            $video_url = [];
            if (!empty($request->intro_video_link)) 
            {

                $video_url = $this->getVideoLink($request->intro_video_link);
                $videoDetailsParams = [
                    'link'=>$video_url['link'],
                    'video_id'=>$video_url['video_id'],
                    'platform'=>$video_url['platform'],
                ];
                $videoDetails = $this->getVideoDetailsURL($videoDetailsParams);
                if ($videoDetails['status'] == 0 || empty($videoDetails['pl'])) {
                    return back()->with('error', 'Only allow youtube and vemio video.');
                }
                if($video_url['platform'] == $this->platform_youtube)
                {
                    $thumbnail = $videoDetails['pl']['items'][0]['snippet']['thumbnails']['high']['url'];
                }
                elseif($video_url['platform'] == $this->platform_vimeo)
                {
                    $thumbnail = $videoDetails['pl']['thumbnail_medium'];
                }
            }

            $user = User::query()->find(auth()->user()->id);
            $user->first_name = ucfirst($request->first_name);
            $user->last_name = ucfirst($request->last_name);
            $user->job_title = ucfirst($request->job_title);
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->gender_pronouns = $request->gender_pronouns;
            $user->about = ucfirst($request->about);
            $user->available_to_work_in = $request->available_to_work_in;
            $user->country_id = $request->Located_in;
            $user->state_id = $request->state;
            $user->imdb_profile = $request->imdb_profile;
            $user->linkedin_profile = $request->linkedin_profile;
            $user->website = $request->website;
            if (!empty($request->intro_video_link)) {
                $user->intro_video_link = $video_url['link'];
                $user->intro_video_thumbnail = $thumbnail;
            }

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
            return back()->with('error', 'Something went wrong. '.$e->getMessage());
        }
    }

    // User profile Portfolio
    public function portfolioCreate(Request $request)
    {
        try {
            $prevPortfolio = UserPortfolio::query()->where('user_id',auth()->user()->id)->with(['getPortfolioSkill','getPortfolioLocation'])->get();
            $country = MasterCountry::query()->orderBy('name', 'ASC')->get();
            $skills = MasterSkill::query()->orderBy('name', 'ASC')->get();
            $portfolio = $user;
            return view('website.user.profile_portfolio', compact('portfolio', 'country', 'skills'));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
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
            $portfolio->project_title = ucfirst($request->project_title);
            $portfolio->description = ucfirst($request->description);
            $portfolio->completion_date = $request->completion_date;
            $portfolio->video = json_encode(['video_url'=>$request->video_url,'video_thumbnail'=>$request->video_thumbnail]);

            if ($portfolio->save()) {
                if (isset($request->project_specific_skills_id)) {
                    UserPortfolioSpecificSkills::query()->where('portfolio_id', $portfolio->id)->delete();
                    foreach ($request->project_specific_skills_id as $k => $v) {
                        $user_portfolio_specific_skills = new UserPortfolioSpecificSkills();
                        $user_portfolio_specific_skills->portfolio_id = $portfolio->id;
                        $user_portfolio_specific_skills->project_specific_skills_id = $v;
                        $user_portfolio_specific_skills->save();
                    }                   
                }

                if (isset($request->project_country_id)) {
                    UserPortfolioLocation::query()->where('portfolio_id', $portfolio->id)->delete();
                    foreach ($request->project_country_id as $k => $v) {
                        $user_portfolio_locations = new UserPortfolioLocation();
                        $user_portfolio_locations->portfolio_id = $portfolio->id;
                        $user_portfolio_locations->location_id = $v;
                        $user_portfolio_locations->save();
                    }                   
                }
            }

            $data_to_insert = [];
            foreach ($request->toArray() as $k => $v) {
                if (strpos($k, 'portfolio-image') !== false) {
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
            if ($request->saveButtonType == 'saveAndAnother') {
                return redirect()->route('portfolio-create')->with("success", "Please add another portfolio.");
            }
            return redirect()->route('experience-create')->with("success", "Portfolio created successfully.");
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function portfolioEdit($id)
    {
        try {
            $UserPortfolioData = UserPortfolio::query()->where('id', $id)->first();
            if (is_null($UserPortfolioData)) {
                return back()->with('This portfolio is not exist');
            } else {
                $skills = MasterSkill::query()->orderBy('name', 'ASC')->get();
                $country = MasterCountry::query()->orderBy('name', 'ASC')->get();
                $UserPortfolioEdit = UserPortfolio::query()->where('id', $id)->get();
                $UserPortfolioEdit[0]->video = json_decode($UserPortfolioEdit[0]->video, true);
                $UserPortfolioImages = UserPortfolioImage::query()->where('portfolio_id', $id)->get();
                $UserPortfolioSkills = UserPortfolioSpecificSkills::query()->where('portfolio_id', $id)->get();
                $UserPortfolioLocations = UserPortfolioLocation::query()->where('portfolio_id', $id)->get();
                $portfolio_skills_ids = [];
                foreach ($UserPortfolioSkills as $k => $v) {
                    $portfolio_skills_ids[] = $v->id;
                }
                $user_portfolio_skill = UserPortfolioSpecificSkills::query()
                    ->whereIn('id', $portfolio_skills_ids)
                    ->get()
                    ->toArray();

                $portfolio_locations_ids = [];
                foreach ($UserPortfolioLocations as $k => $v) {
                    $portfolio_locations_ids[] = $v->id;
                }
                $user_portfolio_location = UserPortfolioLocation::query()
                    ->whereIn('id', $portfolio_locations_ids)
                    ->get()
                    ->toArray();
                $prevPortfolio = UserPortfolio::query()->where('user_id',auth()->user()->id)->with(['getPortfolioSkill','getPortfolioLocation'])->get();
                return view('website.user.profile_portfolio_edit', compact('UserPortfolioEdit', 'UserPortfolioImages', 'user_portfolio_skill','user_portfolio_location', 'skills', 'country','prevPortfolio'));
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function portfolioEditStore(PostUserPortfolioRequest $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $portfolio = UserPortfolio::query()->where('id', $request->portfolio_id)->first();
            $portfolio->user_id = $user->id;
            $portfolio->project_title = ucFirst($request->project_title);
            $portfolio->description = ucFirst($request->description);
            $portfolio->completion_date = $request->completion_date;
            $portfolio->video = json_encode(['video_url'=>$request->video_url,'video_thumbnail'=>$request->video_thumbnail]);

            if ($portfolio->update()) {
                if (isset($request->project_specific_skills_id)) {
                    UserPortfolioSpecificSkills::query()->where('portfolio_id', $request->portfolio_id)->delete();
                    foreach ($request->project_specific_skills_id as $k => $v) {
                        $user_portfolio_specific_skills = new UserPortfolioSpecificSkills();
                        $user_portfolio_specific_skills->portfolio_id = $request->portfolio_id;
                        $user_portfolio_specific_skills->project_specific_skills_id = $v;
                        $user_portfolio_specific_skills->save();
                    }
                }

                if (isset($request->project_country_id)) {
                    UserPortfolioLocation::query()->where('portfolio_id', $portfolio->id)->delete();
                    foreach ($request->project_country_id as $k => $v) {
                        $user_portfolio_locations = new UserPortfolioLocation();
                        $user_portfolio_locations->portfolio_id = $portfolio->id;
                        $user_portfolio_locations->location_id = $v;
                        $user_portfolio_locations->save();
                    }                   
                }
            }

            $data_to_insert = [];
            foreach ($request->toArray() as $k => $v) {
                if (strpos($k, 'portfolio-image') !== false) {
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
            if ($request->saveButtonType == 'saveAndAnother') {
                return redirect()->route('portfolio-create')->with("success", "Please add another portfolio after edit.");
            }
            return redirect()->route('profile-private-show')->with("success", "Portfolio updated successfully.");
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }


    public function portfolioDelete()
    {
        try {
            $id = $_REQUEST['id'];
            UserPortfolio::query()->where('id', $id)->delete();
            UserPortfolioSpecificSkills::query()->where('portfolio_id', $id)->delete();
            UserPortfolioImage::query()->where('portfolio_id', $id)->delete();
            return redirect(route('profile-private-show'));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }
    

    // User profile experience

    public function experienceCreate(Request $request)
    {
        try {
            $prevExperience = UserExperience::query()->where('user_id',auth()->user()->id)->get();
            return view('website.user.profile_experience',compact(['prevExperience']));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function experienceStore(ProfileExperienceRequest $request)
    {
        try {
            if (
                !$request->job_title && !$request->company && !$request->country_id && !$request->start_date &&
                !$request->end_date && !$request->employement_type_id && !$request->description
            ) {
                return redirect()->route('qualification-create');
            }
            $user = User::query()->find(auth()->user()->id);
            $experience = new UserExperience();
            $experience->user_id = $user->id;
            $experience->job_title = ucFirst($request->job_title);
            $experience->company = ucFirst($request->company);
            $experience->country_id = $request->country_id;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->employement_type_id = $request->employement_type_id;
            $experience->description = ucFirst($request->description);

            if ($experience->save()) {
                $qualification = $experience;
                if ($request->flag == 'privateView') {
                    return redirect()->route('profile-private-show')->with("success", "Experience added successfully.");
                }
                if ($request->saveButtonType == 'saveAndAnother') {
                    return redirect()->route('experience-create')->with("success", "Please add another experience.");
                }
                return redirect()->route('qualification-create')->with("success", "Experience added successfully.");
            } else {
                return back()->with('Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }


    public function experienceEdit($id)
    {
        try {
            $prevExperience = UserExperience::query()->where('user_id',auth()->user()->id)->get();
            $UserExperienceData = UserExperience::query()->where('id', $id)->first();
            if (is_null($UserExperienceData)) {
                return back()->with('This experience is not exist');
            } else {
                return view('website.user.profile_experience_edit', compact(['UserExperienceData','prevExperience']));
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function experienceEditStore(ProfileExperienceRequest $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $experience = UserExperience::query()->where('id', $request->experience_id)->first();
            $experience->user_id = $user->id;
            $experience->job_title = ucFirst($request->job_title);
            $experience->company = ucFirst($request->company);
            $experience->country_id = $request->country_id;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->employement_type_id = $request->employement_type_id;
            $experience->description = ucFirst($request->description);
            if ($experience->update()) {
                if ($request->saveButtonType == 'saveAndAnother') {
                    return redirect()->route('experience-create')->with("success", "Please add another experience after edit.");
                }
                return redirect()->route('profile-private-show')->with("success", "Experience added successfully.");
            } else {
                return back()->with('Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function experienceDelete()
    {
        try {
            $id = $_REQUEST['id'];
            UserExperience::query()->where('id', $id)->delete();
            return redirect(route('profile-private-show'));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    // User profile qualification

    public function qualificationCreate(Request $request)
    {
        try {
            $prevQualification = UserQualification::query()->where('user_id',auth()->user()->id)->get();
            return view('website.user.profile_qualification', compact('prevQualification'));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function qualificationStore(ProfieQualificationRequest $request)
    {
        try {
            if (
                !$request->institue_name && !$request->degree_name && !$request->field_of_study && !$request->start_year &&
                !$request->end_year && !$request->description
            ) {
                return redirect()->route('profile-private-show');
            }
            $user = User::query()->find(auth()->user()->id);

            $qualification = new UserQualification();
            $qualification->user_id = $user->id;
            $qualification->institue_name = ucFirst($request->institue_name);
            $qualification->degree_name = ucFirst($request->degree_name);
            $qualification->field_of_study = $request->field_of_study;
            $qualification->start_year = $request->start_year;
            $qualification->end_year = $request->end_year;
            $qualification->description = ucFirst($request->description);

            if ($qualification->save()) {
                if ($request->flag == 'privateView') {
                    return redirect()->route('profile-private-show')->with("success", "Qualification added successfully.");
                }
                if ($request->saveButtonType == 'saveAndAnother') {
                    return redirect()->route('qualification-create')->with("success", "Please add another qualification.");
                }
                return redirect()->route('profile-private-show');
            } else {
                return back()->with('error', 'Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function qualificationEdit($id)
    {
        try {
            $prevQualification = UserQualification::query()->where('user_id',auth()->user()->id)->get();
            $UserQualificationData = UserQualification::query()->where('id', $id)->first();
            return view('website.user.profile_qualification_edit', compact(['UserQualificationData','prevQualification']));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function qualificationEditStore(ProfieQualificationRequest $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);

            $qualification = UserQualification::query()->where('id', $request->qualification_id)->first();
            $qualification->user_id = $user->id;
            $qualification->institue_name = ucFirst($request->institue_name);
            $qualification->degree_name = ucFirst($request->degree_name);
            $qualification->field_of_study = $request->field_of_study;
            $qualification->start_year = $request->start_year;
            $qualification->end_year = $request->end_year;
            $qualification->description = ucFirst($request->description);
            if ($qualification->update()) {
                if ($request->saveButtonType == 'saveAndAnother') {
                    return redirect()->route('qualification-create')->with("success", "Please add another qualification after edit.");
                }
                return redirect()->route('profile-private-show')->with("success", "Qualification added successfully.");
            } else {
                return back()->with('Something went wrong ,please try again.');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function qualificationDelete()
    {
        try {
            $id = $_REQUEST['id'];
            UserQualification::query()->where('id', $id)->delete();
            return redirect(route('profile-private-show'));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.');
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
                'subject' => 'required|string|max:1200',
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
                $collect->put('subject',$request->subject);
                $collect->put('msg',$request->message);
                if ($_REQUEST['checkbox_cc'] == 1) {
                    
                    $collect->put('cc_email',auth()->user()->email);
                }
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
                'endorse_message' => 'required|string|max:600',
            ]);

            if ($validator->fails()) {
                return ['satus'=>0,'msg'=>$validator->errors()->first()];
            }
            // $email = '';
            if(!$_REQUEST['endorse_email'] && !$_REQUEST['endorse_message']){
                return ['satus'=>0,'msg'=>"Endorse email or message or subject fields can not be empty."];
            }
            
            $data = [
                ['from'=>auth()->user()->id,'to'=>$_REQUEST['endorse_to_id'],'comment'=>$_REQUEST['endorse_message'] ,'created_at'=>date("Y-m-d h:i:s", time()),'updated_at'=>date("Y-m-d h:i:s", time())],
            ];
            $userEndorsement = Endorsement::query()->where('to',$_REQUEST['endorse_to_id'])->get();
            $is_profile_verified_data =1;
            if (count($userEndorsement)> 3) {
                $userEmdorseVerifyProfile = $this->userEmdorseVerifyProfile($is_profile_verified_data,$_REQUEST['endorse_to_id']);
            }            

            $UserEmdorse = $this->userEmdorseLogStore($data);
            if ($UserEmdorse['status'] ==1) {
                return ['status'=>1,'msg'=>$UserEmdorse['msg']];           

            }
            return ['status'=>0,'msg'=>"Endorse records updated failed,please try again."];           


            // if(!empty($_REQUEST['endorse_email']) ){
            //     $email = $_REQUEST['endorse_email'];
            //     $collect = collect();
            //     $collect->put('url','https://www.google.com/');
            //     Notification::route('mail', $email)->notify(new EndorseUser($collect));                
            // }
            // return ['status'=>1,'msg'=>"Email has been sending by endorse email."];           
        } catch (Exception $e) {
            return ['status'=>0,'msg'=>"Something went wrong."];
        }
    }

    public function userEmdorseLogStore($data)
    {
        try {            
            $UserEndorsements = new Endorsement();            
            $UserEndorsements->insert($data); 
            return ['status'=>1,'msg'=>"Endorse records updated successfully."];
        } catch (Exception $e) {
            return ['status'=>0,'msg'=>"Something went wrong."];
        }
    }

    public function userEmdorseVerifyProfile($is_profile_verified_data,$user_id)
    {
        try {            
            $UserIsProfileVerified = User::query()->where('id',$user_id)->first();            
            $UserIsProfileVerified->is_profile_verified = $is_profile_verified_data;
            $UserIsProfileVerified->save();
            return ['status'=>1,'msg'=>"15 endorse completed so verify profile successfully."];
        } catch (Exception $e) {
            return ['status'=>0,'msg'=>"Something went wrong."];
        }
    }
}

