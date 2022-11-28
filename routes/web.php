<?php


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\EndorsementController;
use App\Http\Controllers\Website\OrganisationController;
use App\Http\Controllers\Website\UserController;

use App\Http\Controllers\Website\IndustryGuideController;
use App\Http\Controllers\Website\ProjectController;
use App\Http\Controllers\Website\SettingController;
use App\Http\Controllers\Website\AjaxController;
use App\Http\Controllers\Website\JobController;
use App\Http\Controllers\Website\PlanController;
use App\Http\Controllers\Website\SubscriptionController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;  

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return view('website.job.myjob');
});
Route::get('/', function () {
    return view('website.auth.login');
});
Auth::routes(['verify' => true]);


// Admin routes 




    // routes that require user to be authenticated
    Route::post('verify-otp', [RegisterController::class, 'otpVerify'])->name('verify-otp');
    Route::get('otp-view', [RegisterController::class, 'index'])->name('otp-view'); 
    Route::get('resend-otp/{email?}/{type?}', [RegisterController::class, 'resendOtp'])->name('resend-otp'); 

    Route::group(["middleware"=>["adminWebAuth"],"prefix"=>"admin"],function(){
        Route::get('project/public-view', [ProjectController::class, 'publicView'])->name('project-public-view');
		Route::get('user/profile-public-show', [UserController::class, 'profilePublicShow'])->name('user-profile-public-show');
    });
    // Route::get('reset-password/{token}',[ResetPasswordController::class,'restPasswordPublicView'])->name('reset-password-view');

Route::group(["middleware"=>["auth","revalidate","verified"],"prefix"=>""],function(){
 
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'ajax'],function(){
        Route::post('/get-video-details',[AjaxController::class, 'getVideoDetails'])->name('get-video-details');
        Route::post('/add-video',[AjaxController::class, 'addVideo'])->name('add-video');
        Route::get('/get-media/{media_id}',[AjaxController::class, 'getMedia'])->name('get-media');
        Route::post('/update-media/{media_id}',[AjaxController::class, 'updateMedia'])->name('update-video');
        Route::post('/delete-media/{media_id}',[AjaxController::class, 'deleteMedia'])->name('delete-media');
        Route::post('/upload-image',[AjaxController::class, 'uploadImage'])->name('upload-image');
        Route::post('/upload-doc',[AjaxController::class, 'uploadDoc'])->name('ajax/upload-doc');
    });

    Route::group(['prefix'=>'user'],function()
	{	Route::get('/plans',[PlanController::class,'showPlans'])->name('plans-view');
        Route::get('/subscription/store',[SubscriptionController::class,'storeSubscription'])->name('subscription-create');

		Route::get('/profile-private-show', [UserController::class, 'profilePrivateShow'])->name('profile-private-show');
		Route::get('/profile-public-show', [UserController::class, 'profilePublicShow'])->name('profile-public-show');
        Route::get('/profile-create', [UserController::class, 'profileCreate'])->name('profile-create');
        Route::post('/profile-store', [UserController::class, 'profileStore'])->name('profile-store');

        Route::post('/contact-user-mail-store', [UserController::class, 'contactMailStore'])->name('contact-user-mail-store');
        Route::post('/endorse-user-mail-store', [UserController::class, 'endorseMailStore'])->name('endorse-user-mail-store');


        Route::get('/portfolio-create/{id?}', [UserController::class, 'portfolioCreate'])->name('portfolio-create');
        Route::post('/portfolio-store/{id?}', [UserController::class, 'portfolioStore'])->name('portfolio-store');
        Route::get('/portfolio-edit/{id}', [UserController::class, 'portfolioEdit'])->name('portfolio-edit');
        Route::post('/portfolio-edit-store/{id}', [UserController::class, 'portfolioEditStore'])->name('portfolio-edit-store');

        Route::get('/experience-create/{id?}', [UserController::class, 'experienceCreate'])->name('experience-create');
        Route::post('/experience-store/{id?}', [UserController::class, 'experienceStore'])->name('experience-store');
        Route::get('/experience-edit/{id}', [UserController::class, 'experienceEdit'])->name('experience-edit');
        Route::post('/experience-edit-store/{id}', [UserController::class, 'experienceEditStore'])->name('experience-edit-store');

        Route::get('/qualification-create/{id?}', [UserController::class, 'qualificationCreate'])->name('qualification-create');
        Route::post('/qualification-store/{id?}', [UserController::class, 'qualificationStore'])->name('qualification-store');        		
        Route::get('/qualification-edit/{id}', [UserController::class, 'qualificationEdit'])->name('qualification-edit');
        Route::post('/qualification-edit-store/{id}', [UserController::class, 'qualificationEditStore'])->name('qualification-edit-store'); 
        
        Route::post('/deactivate', [UserController::class, 'deactivateAccount'])->name('user-deactivate'); 

               		
	});

    Route::group(['prefix'=>'project'],function()
	{	
        Route::get('/project-list', [ProjectController::class, 'projectList'])->name('project-list');

        Route::get('/project-overview', [ProjectController::class, 'projectOverview'])->name('project-overview');
        Route::post('/validate-project-overview', [ProjectController::class, 'validateProjectOverview'])->name('validate-project-overview');

        Route::get('/project-details', [ProjectController::class, 'projectDetails'])->name('project-details');
        Route::post('/validate-project-details', [ProjectController::class, 'validateProjectDetails'])->name('validate-project-details');

        Route::get('/project-description', [ProjectController::class, 'projectDescription'])->name('project-description');
        Route::post('/validate-project-description', [ProjectController::class, 'validateProjectDescription'])->name('validate-project-description');


        Route::get('/project-gallery', [ProjectController::class, 'projectGallery'])->name('project-gallery');     
        Route::post('/project-gallery-store', [ProjectController::class, 'galleryStore'])->name('project-gallery-store');

        Route::get('/project-milestone', [ProjectController::class, 'projectMilestone'])->name('project-milestone');
        Route::post('/validate-project-milestone', [ProjectController::class, 'validateProjectMilestone'])->name('validate-project-milestone');

        Route::get('/project-preview', [ProjectController::class, 'projectPreview'])->name('project-preview');
        Route::get('/project-status', [ProjectController::class, 'changeStatus'])->name('project-status');



        Route::get('/public-view', [ProjectController::class, 'publicView'])->name('public-view');
        Route::post('/like', [ProjectController::class, 'projectLike'])->name('project-like');
        
        Route::get('/get-project-media/{id}', [ProjectController::class, 'getMediaByProject'])->name('get-project-media');

        Route::get('/filter', [ProjectController::class, 'getFilteredProject'])->name('get-project-filter');

	});

    Route::group(['prefix'=>'endorsement'],function()
	{	
        Route::get('/', [EndorsementController::class, 'index'])->name('endorsement-view');
        Route::post('/status', [EndorsementController::class, 'changeStatus'])->name('endorsement-status-change');

        
	});

    Route::group(['prefix'=>'industry-guide'],function()
	{	
        Route::get('/filter', [IndustryGuideController::class, 'index'])->name('guide-view');
        Route::get('/show', [IndustryGuideController::class, 'show'])->name('show-guide');
       
	});

    Route::group(['prefix'=>'settings'],function()
	{	
        Route::get('/password-reset-otp', [ResetPasswordController::class, 'restPasswordOtpView'])->name('password-reset-otp');
        Route::get('/password-change-view', [ResetPasswordController::class, 'restPasswordView'])->name('password-change-view');
        Route::post('/verify-otp',[OtpController::class, 'otpVerify'])->name('verify-otp-after-login');
        Route::get('/create-reset-Otp',[ResetPasswordController::class, 'createResetOtp'])->name('create-reset-otp');
        Route::post('/password-change', [ResetPasswordController::class, 'resetPasswordCreate'])->name('password-change');

 
	});

    Route::group(['prefix'=>'organisation'],function()
	{	
        Route::get('/private-view',[OrganisationController::class, 'index'])->name('organisation-private-view');
        Route::get('/create',[OrganisationController::class, 'create'])->name('organisation-create');
        Route::post('/store', [OrganisationController::class, 'store'])->name('organisation-store');
        // Route::get('/edit/{id}', [OrganisationController::class, 'edit'])->name('organisation-edit');
        // Route::post('/update/{id}', [OrganisationController::class, 'update'])->name('organisation-update');
        Route::get('/create-team', [OrganisationController::class, 'createTeam'])->name('create-team');
        Route::post('/team-email', [OrganisationController::class, 'teamEmail'])->name('team-email');
        Route::post('/team-email-log', [OrganisationController::class, 'teamEmailLogStore'])->name('team-email-log');

	});

    Route::group(['prefix'=>'job'],function()
	{	
        Route::get('/search',[JobController::class, 'index'])->name('job-search-page');
        Route::get('/create',[JobController::class, 'create'])->name('job-create-page');
        Route::post('/action',[JobController::class, 'store'])->name('job-store');

	});

    Route::group(['prefix'=>'favourite'],function()
	{	
        Route::get('/view',[FavouriteController::class, 'index'])->name('favourite-view');
        Route::post('/action',[FavouriteController::class, 'update'])->name('favourite-update');

	});

    
    Route::get('/setting-page',[SettingController::class, 'index'])->name('setting-page');
    Route::get('/forgot-password-page', function () {
        return view('website.auth.passwords/forgot');
    })->name('forgot-password-page');
});



@include('admin.php');
