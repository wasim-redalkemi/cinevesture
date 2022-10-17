<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUserPortfolioRequest;
use App\Http\Requests\StoreProfileUpdate;
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
use App\Models\UserQualification;
use App\Models\UserSkill;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
            ->where('user_id',$user->id)
            ->get()
            ->toArray();
          
            $experience = UserExperience::query()->where('user_id',$user->id)->get();
            $qualification = UserQualification::query()->where('user_id',$user->id)->get();
            $user_country = MasterCountry::query()->where('id',$user->country_id)->first();
            // $user_state = MasterState::query()->where('id',$user->state_id)->first();
            $user_skills = UserSkill::query()
            ->with('getSkills')
            ->where('user_id',$user->id)
            ->get()
            ->toArray();            

            $user_languages = UserLanguage::query()
            ->with('getLanguages')
            ->where('user_id',$user->id)
            ->get()
            ->toArray();        
      
            return view('user.profile_private_view', compact('user','portfolio','experience','qualification','user_country','user_skills','user_languages'));
        
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }   
    

    public function profilePublicShow(Request $request)
    {
        try {            
        
            $user = User::query()->find(auth()->user()->id);
            $portfolio = UserPortfolio::query()->where('user_id',$user->id)->get();
            $experience = UserExperience::query()->where('user_id',$user->id)->get();
            $qualification = UserQualification::query()->where('user_id',$user->id)->get();
            return view('user.profile_public_view', compact('user','portfolio','experience','qualification')); 
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    public function profileCreate()
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $skills = MasterSkill::query()->get();
            $languages = MasterLanguage::query()->get();
            $country = MasterCountry::query()->get();
            $state = MasterState::query()->get();

            return view('user.profile_create', compact('user','skills','languages','country','state'));
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
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
            $user->about=$request->about;
            $user->available_to_work_in=$request->available_to_work_in;
            $user->country_id=$request->Located_in;
            $user->state_id=$request->state;
            $user->imdb_profile = $request->imdb_profile;
            $user->linkedin_profile = $request->linkedin_profile;
            $user->website = $request->website;
            $user->intro_video_link = $request->intro_video_link;

            if($request->hasFile('profile_image')) {

                $file = $request->file('profile_image');
                $originalFile = $file->getClientOriginalName();
                $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
                $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                $nameStr = date('_YmdHis');
                $newName = $fileName.$nameStr.'.'.$fileExt;
                $locationPath  = "user";
                $uploadFile = $this->uploadFile($locationPath , $file,$newName);
                $user->profile_image = $uploadFile;
            }
            if($user->save()) {
                if (isset($request->skills)) {
                    UserSkill::query()->where('user_id',auth()->user()->id)->delete();                
                    foreach ($request->skills as $k => $v) {
                        $userSkills = new UserSkill();
                        $userSkills->user_id = $user->id;
                        $userSkills->skill_id = $v;
                        $userSkills->save();
                    }
                }
                if (isset($request->languages)) {
                    UserLanguage::query()->where('user_id',auth()->user()->id)->delete();
                    foreach ($request->languages as $k => $v) {
                        $userLanguages = new UserLanguage();
                        $userLanguages->user_id = $user->id;
                        $userLanguages->language_id = $v;
                        $userLanguages->save();
                    }
                }
                return redirect()->route('portfolio-create')->with("success","User details updated successfully.");
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    // User profile Portfolio
    public function portfolioCreate(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $country = MasterCountry::query()->get();
            $skills = MasterSkill::query()->get();
            $portfolio = $user;
            return view('user.profile_portfolio', compact('portfolio','country','skills'));
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    public function portfolioStore(PostUserPortfolioRequest $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $portfolio = new UserPortfolio();
            $portfolio->user_id = $user->id;
            $portfolio->project_title = $request->project_title;
            $portfolio->description = $request->description;
            $portfolio->completion_date = $request->completion_date;
            $portfolio->project_country_id = $request->project_country_id;
            $portfolio->video = $request->video;
                       
            if($portfolio->save()){
                if (isset($request->project_specific_skills_id)) {
                    UserPortfolioSpecificSkills::query()->where('portfolio_id',$portfolio->id)->delete();
                    $user_portfolio_specific_skills = new UserPortfolioSpecificSkills();
                    $user_portfolio_specific_skills->portfolio_id = $portfolio->id;
                    $user_portfolio_specific_skills->project_specific_skills_id = $request->project_specific_skills_id;
                    $user_portfolio_specific_skills->save();
                }            
            }
            
            $data_to_insert = [];
            foreach($request->toArray() as $k => $v) 
            {
                if(substr($k,0,14) == 'project_image_')
                {
                    $image_file_name = $k;
                    if($request->hasFile($image_file_name)) 
                    {
                        $file = $request->file($image_file_name);
                        $originalFile = $file->getClientOriginalName();
                        $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
                        $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                        $nameStr = date('_YmdHis');
                        $newName = $fileName.$nameStr.'.'.$fileExt;
                        $locationPath  = "project/image";
                        $uploadFile = $this->uploadFile($locationPath , $file,$newName);
                        $data_to_insert[] = [
                            'file_type' => 'image',
                            'file_link' => $uploadFile
                        ];
                    }
                }                             
            }               
            
            foreach($data_to_insert as $k => $v)
            {
                $projectMedia = new UserPortfolioImage();
                $projectMedia->portfolio_id = $portfolio->id;
                $projectMedia->file_type = $v['file_type'];
                $projectMedia->file_link = $v['file_link'];
                $projectMedia->save();
            }               
            $experience = $portfolio;
            if ($request->flag == 'privateView') {
                return redirect()->route('profile-private-show')->with("success","Portfolio added successfully.");
            }
            return view('user.profile_experience', compact('experience'))->with("success","User Portfolio updated successfully.");;
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    public function portfolioEdit($id)
    {
        try {
            $UserPortfolioData = UserPortfolio::query()->where('id',$id)->first();
            if (is_null($UserPortfolioData)) {
                return back()->withError('This portfolio is not exist');
            } else {
                $skills = MasterSkill::query()->get();
                $country = MasterCountry::query()->get();
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
                
                return view('user.profile_portfolio_edit', compact('UserPortfolioEdit','UserPortfolioImages','user_portfolio_skill','skills','country'));
            }            
            
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    public function portfolioEditStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $portfolio = UserPortfolio::query()->where('id',$request->portfolio_id)->first();
            $portfolio->user_id = $user->id;
            $portfolio->project_title = $request->project_title;
            $portfolio->description = $request->description;
            $portfolio->completion_date = $request->completion_date;
            $portfolio->project_country_id = $request->project_country_id;
            $portfolio->video = $request->video;
                       
            if($portfolio->update()){
                if (isset($request->project_specific_skills_id)) {
                    UserPortfolioSpecificSkills::query()->where('portfolio_id',$request->portfolio_id)->delete();
                    $user_portfolio_specific_skills = new UserPortfolioSpecificSkills();
                    $user_portfolio_specific_skills->portfolio_id = $request->portfolio_id;
                    $user_portfolio_specific_skills->project_specific_skills_id = $request->project_specific_skills_id;
                    $user_portfolio_specific_skills->save();                    
                }            
            }
            
            $data_to_insert = [];
            foreach($request->toArray() as $k => $v) 
            {
                if(substr($k,0,14) == 'project_image_')
                {
                    $image_file_name = $k;
                    if($request->hasFile($image_file_name)) 
                    {
                        $file = $request->file($image_file_name);
                        $originalFile = $file->getClientOriginalName();
                        $fileExt = pathinfo($originalFile, PATHINFO_EXTENSION);
                        $fileName = pathinfo($originalFile, PATHINFO_FILENAME);
                        $nameStr = date('_YmdHis');
                        $newName = $fileName.$nameStr.'.'.$fileExt;
                        $locationPath  = "project/image";
                        $uploadFile = $this->uploadFile($locationPath , $file,$newName);
                        $data_to_insert[] = [
                            'file_type' => 'image',
                            'file_link' => $uploadFile
                        ];
                    }
                }                             
            }               
            
            foreach($data_to_insert as $k => $v)
            {
                $projectMedia = new UserPortfolioImage();
                $projectMedia->portfolio_id = $request->portfolio_id;
                $projectMedia->file_type = $v['file_type'];
                $projectMedia->file_link = $v['file_link'];
                $projectMedia->save();
            }
            return redirect()->route('profile-private-show')->with("success","Portfolio updated successfully.");
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }


    // User profile experience

    public function experienceCreate(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $experience = $user;
            return view('user.profile_experience', compact('experience'));
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    public function experienceStore(Request $request)
    {
        try {
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
           
            if($experience->save()){
                $qualification = $experience;
                if ($request->flag == 'privateView') {
                    return redirect()->route('profile-private-show')->with("success","Experience added successfully.");
                }
                return view('user.profile_qualification', compact('qualification'));
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }


    public function experienceEdit($id)
    {
        try {
            $UserExperienceData = UserExperience::query()->where('id',$id)->first();
            if (is_null($UserExperienceData)) {
                return back()->withError('This experience is not exist');
            } else {
                return view('user.profile_experience_edit', compact('UserExperienceData'));
            }            
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    public function experienceEditStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $experience = UserExperience::query()->where('id',$request->experience_id)->first();
            $experience->user_id = $user->id;
            $experience->job_title = $request->job_title;
            $experience->comapny = $request->comapny;
            $experience->country_id = $request->country_id;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->employement_type_id = $request->employement_type_id;
            $experience->description = $request->description;
            if($experience->update()){
                return redirect()->route('profile-private-show')->with("success","Experience added successfully.");
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    // User profile qualification

    public function qualificationCreate(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $qualification =$user;
            return view('user.profile_qualification', compact('qualification'));
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
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
           
            if($qualification->save()){
                if ($request->flag == 'privateView') {
                    return redirect()->route('profile-private-show')->with("success","Qualification added successfully.");
                }
                return redirect()->route('profile-private-show');
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }
    
    public function qualificationEdit($id)
    {
        try {
            $UserQualificationData = UserQualification::query()->where('id',$id)->first();
            return view('user.profile_qualification_edit', compact('UserQualificationData'));
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }

    public function qualificationEditStore(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            
            $qualification = UserQualification::query()->where('id',$request->qualification_id)->first();
            $qualification->user_id = $user->id;
            $qualification->institue_name = $request->institue_name;
            $qualification->degree_name = $request->degree_name;
            $qualification->feild_of_study = $request->feild_of_study;
            $qualification->start_year = $request->start_year;
            $qualification->end_year = $request->end_year;
            $qualification->description = $request->description;
            if ($qualification->update()) {
                return redirect()->route('profile-private-show')->with("success","Qualification added successfully.");
            }else {
                return back()->withError('Somethig went wrong ,please try again.');
            }            
        } catch (Exception $e) {
            return back()->withError('error','Somethig went wrong.');
        }
    }
    

}
