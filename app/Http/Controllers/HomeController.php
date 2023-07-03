<?php

namespace App\Http\Controllers;

use App\Models\MasterCountry;
use App\Models\MasterLanguage;
use App\Models\MasterLookingFor;
use App\Models\MasterProjectCategory;
use App\Models\MasterProjectGenre;
use App\Models\MasterSkill;
use App\Models\ProjectList;
use App\Models\ProjectListProjects;
use App\Models\ProjectStage;
use App\Models\SubscriptionOrder;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    { 
        try 
        {
            // $freeSub='paid';
            $subscription=UserSubscription::query()->where('user_id',auth()->user()->id)->where('status','active')->first();
            $freeSub=$subscription->platform_subscription_id;
            $endsub=round((strtotime($subscription->subscription_end_date)-time()) / (60 * 60 * 24));
            Session::put('freeEndDateSub', $endsub);
            $value = $request->session()->get('freeEndDateSub');
            $order=SubscriptionOrder::query()->where('user_id',auth()->user()->id)->where('is_used_for_subscription','0')->first();

        // if(isset($freeSub) && !isset($order) && empty($order)){
        //     Session::put('freeSubscription', $freeSub);
        // }else{
        //     Session::put('freeSubscription', $freeSub);
        // }
        if($subscription->platform_subscription_id=="free" && !isset($order) && empty($order)){
            Session::put('freeSubscription', $freeSub);
        }else{
            Session::put('freeSubscription', "paid");
        }
        $countries = MasterCountry::query()->get();
        $languages = MasterLanguage::query()->get();
        $geners = MasterProjectGenre::query()->orderBy('name', 'ASC')->get();
        $categories = MasterProjectCategory::query()->orderBy('name', 'ASC')->get();
        $looking_for = MasterLookingFor::query()->orderBy('name', 'ASC')->get();
        $project_stages = ProjectStage::query()->orderBy('name', 'ASC')->get();
        $project_list_project = ProjectList::query()
        // ->join('project_lists_projects','project_lists.id','=','project_lists_projects.list_id')
        // ->join('user_projects','project_lists_projects.project_id','=','user_projects.id')
        // ->join('users','user_projects.user_id','=','users.id')
        // ->where('project_lists.status','published')
        // ->where('users.status','1')
       // ->with([])
        ->with(['lists'=>function($q){
            $q->where('admin_status','active')
            ->where('user_status','published');
            $q->whereHas('user',function($q){
                $q->where('status','1');
            });

        },
        'lists.user'=>function($q){
            $q->where('status','1');
        },
        'lists.genres',
        'lists.projectCountries','lists.projectLanguages','lists.projectImage','lists.isfavouriteProjectMain','lists.isfavouriteProject'=>function($q){
            $q->where('user_id',auth()->user()->id);
        }])
       ->where('status','published')
       
        ->get();
        $project_lists_carousel = (isset($project_list_project[0]))?$project_list_project[0]:[];
        unset($project_list_project[0]);
        $project_lists_except_carousel = $project_list_project;
        
        return view('main',compact(['countries','languages','geners','categories','looking_for','project_stages','project_lists_carousel','project_lists_except_carousel']));
    } catch (\Throwable $th) {
        echo $th;
    }
    }

}
