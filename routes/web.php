<?php


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\EndorsementController;
use App\Http\Controllers\Website\OrganisationController;
use App\Http\Controllers\Website\UserController;

use App\Http\Controllers\Website\IndustryGuideController;
use App\Http\Controllers\Website\ProjectController;
use App\Http\Controllers\Website\SettingController;
use App\Http\Controllers\Website\AjaxController;
use App\Http\Controllers\Website\JobController;
use App\Http\Controllers\Website\OtpController;
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



// Google URL
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

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

Route::group(["middleware"=>["auth","revalidate","verified"]],function(){
    
    // check plans permission
  
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('plancheck');

    Route::group(['prefix' => 'ajax'],function(){
        Route::post('/get-video-details',[AjaxController::class, 'getVideoDetails'])->name('get-video-details');
        Route::post('/add-video',[AjaxController::class, 'addVideo'])->name('add-video');
        Route::get('/get-media/{media_id}',[AjaxController::class, 'getMedia'])->name('get-media');
        Route::post('/update-media/{media_id}',[AjaxController::class, 'updateMedia'])->name('update-video');
        Route::post('/delete-media/{media_id}',[AjaxController::class, 'deleteMedia'])->name('delete-media');
        Route::post('/upload-image',[AjaxController::class, 'uploadImage'])->name('upload-image');
        Route::post('/upload-doc',[AjaxController::class, 'uploadDoc'])->name('ajax/upload-doc');
        Route::post('/add-proj-association/{project_id}',[AjaxController::class, 'addProjAssociationEntry'])->name('add-proj-association');
        Route::post('/update-proj-association/{associate_id}',[AjaxController::class,'updateProjAssociationEntry'])->name('update-proj-association');
        Route::delete('/delete-proj-association/{associate_id}',[AjaxController::class, 'removeProjAssociationEntry'])->name('delete-proj-association');
        Route::post('/add-proj-milestone/{project_id}',[AjaxController::class,'addProjMilestoneEntry'])->name('add-proj-milestone');
        Route::post('/update-proj-milestone/{milestone_id}',[AjaxController::class,'updateProjMilestoneEntry'])->name('update-proj-milestone');
        Route::delete('/delete-proj-milestone/{milestone_id}',[AjaxController::class,'removeProjMilestoneEntry'])->name('delete-proj-milestone');
        Route::post('/add-portfolio-img/{portfolio_id}',[AjaxController::class,'addPortfolioImg'])->name('add-portfolio-img');
        Route::delete('/delete-portfolio-img/{img_id}',[AjaxController::class,'deletePortfolioImg'])->name('delete-portfolio-img');
    });

    Route::group(['prefix'=>'user'],function()
	{	Route::get('/plans',[PlanController::class,'showPlans'])->name('plans-view');
        Route::get('/subscription/order-create',[SubscriptionController::class,'createOrder'])->name('subscription-order-create');
        Route::get('/subscription/success',[SubscriptionController::class,'paymentSuccess'])->name('subscription-success');
        Route::get('/subscription/failed',[SubscriptionController::class,'paymnetFailed'])->name('subscription-failed');


		Route::get('/profile-private-show', [UserController::class, 'profilePrivateShow'])->name('profile-private-show');
		Route::get('/profile-public-show', [UserController::class, 'profilePublicShow'])->name('profile-public-show')->middleware('plancheck');
        Route::get('/profile-create', [UserController::class, 'profileCreate'])->name('profile-create')->middleware('plancheck');
        Route::post('/profile-store', [UserController::class, 'profileStore'])->name('profile-store');

        Route::post('/contact-user-mail-store', [UserController::class, 'contactMailStore'])->name('contact-user-mail-store')->middleware('plancheck');
        Route::post('/endorse-user-mail-store', [UserController::class, 'endorseMailStore'])->name('endorse-user-mail-store')->middleware('plancheck');


        Route::get('/portfolio-create/{id?}', [UserController::class, 'portfolioCreate'])->name('portfolio-create');
        Route::post('/portfolio-store/{id?}', [UserController::class, 'portfolioStore'])->name('portfolio-store');
        Route::get('/portfolio-edit/{id}', [UserController::class, 'portfolioEdit'])->name('portfolio-edit');
        Route::post('/portfolio-edit-store/{id}', [UserController::class, 'portfolioEditStore'])->name('portfolio-edit-store');
        Route::get('/protfolio-delete', [UserController::class, 'protfolioDelete'])->name('protfolio-delete');


        Route::post('/protfolio-modal', [UserController::class, 'getPortfolioHtml'])->name('protfolio-modal');

        Route::get('/experience-create/{id?}', [UserController::class, 'experienceCreate'])->name('experience-create');
        Route::post('/experience-store/{id?}', [UserController::class, 'experienceStore'])->name('experience-store');
        Route::get('/experience-edit/{id}', [UserController::class, 'experienceEdit'])->name('experience-edit');
        Route::post('/experience-edit-store/{id}', [UserController::class, 'experienceEditStore'])->name('experience-edit-store');
        Route::get('/experience-delete', [UserController::class, 'experienceDelete'])->name('experience-delete');

        Route::get('/qualification-create/{id?}', [UserController::class, 'qualificationCreate'])->name('qualification-create');
        Route::post('/qualification-store/{id?}', [UserController::class, 'qualificationStore'])->name('qualification-store');        		
        Route::get('/qualification-edit/{id}', [UserController::class, 'qualificationEdit'])->name('qualification-edit');
        Route::post('/qualification-edit-store/{id}', [UserController::class, 'qualificationEditStore'])->name('qualification-edit-store');
        Route::get('/qualification-delete', [UserController::class, 'qualificationDelete'])->name('qualification-delete');
        
        Route::get('/billing', [SubscriptionController::class, 'getBilling'])->name('subscription-billing');
        Route::post('/deactivate', [UserController::class, 'deactivateAccount'])->name('user-deactivate'); 

               		
	});

    Route::group(['prefix'=>'project'],function()
	{	
        Route::get('/project-list', [ProjectController::class, 'projectList'])->name('project-list');

        Route::get('/project-overview', [ProjectController::class, 'projectOverview'])->name('project-overview')->middleware('plancheck');
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



        Route::get('/project-public-view', [ProjectController::class, 'publicView'])->name('public-view')->middleware('plancheck');;
        Route::post('/like', [ProjectController::class, 'projectLike'])->name('project-like');
        
        Route::get('/get-project-media/{id}', [ProjectController::class, 'getMediaByProject'])->name('get-project-media');

        Route::get('/filter', [ProjectController::class, 'getFilteredProject'])->name('get-project-filter');
        Route::get('/project-delete', [UserController::class, 'projectDelete'])->name('project-delete');


	});


    Route::group(['prefix'=>'industiry-guide'],function()
	{	
        Route::get('/profile-filter', [IndustryGuideController::class, 'index'])->name('guide-view');
        Route::get('/profile-show', [IndustryGuideController::class, 'show'])->middleware('plancheck')->name('show-guide');
        Route::group(['prefix'=>'endorsement'],function()
        {	
            Route::get('/', [EndorsementController::class, 'index'])->name('endorsement-view');
            Route::post('/status', [EndorsementController::class, 'changeStatus'])->name('endorsement-status-change');
    
            
        });

        Route::group(['prefix'=>'organisation'],function()
        {	
            Route::get('/private-view',[OrganisationController::class, 'index'])->name('organisation-private-view');
            Route::get('/organisation-create',[OrganisationController::class, 'create'])->name('organisation-create')->middleware('plancheck');
            Route::post('/organisation-store', [OrganisationController::class, 'store'])->name('organisation-store');
            // Route::get('/edit/{id}', [OrganisationController::class, 'edit'])->name('organisation-edit');
            // Route::post('/update/{id}', [OrganisationController::class, 'update'])->name('organisation-update');
            Route::get('/create-team', [OrganisationController::class, 'createTeam'])->name('create-team')->middleware('plancheck');
            Route::post('/team-email', [OrganisationController::class, 'teamEmail'])->name('team-email');
            Route::post('/team-email-log', [OrganisationController::class, 'teamEmailLogStore'])->name('team-email-log');
    
        });

        Route::group(['prefix'=>'favourite'],function()
        {	
            Route::get('/view',[FavouriteController::class, 'index'])->name('favourite-view');
            Route::post('/profile-save',[FavouriteController::class, 'update'])->name('favourite-update')->middleware('plancheck');
    
        });
	});

    Route::group(['prefix'=>'settings'],function()
	{	
        Route::get('/password-reset-otp', [ResetPasswordController::class, 'restPasswordOtpView'])->name('password-reset-otp');
        Route::get('/password-change-view', [ResetPasswordController::class, 'restPasswordView'])->name('password-change-view');
        Route::post('/verify-otp',[OtpController::class, 'otpVerify'])->name('verify-otp-after-login');
        Route::get('/create-reset-Otp',[ResetPasswordController::class, 'createResetOtp'])->name('create-reset-otp');
        Route::post('/password-change', [ResetPasswordController::class, 'resetPasswordCreate'])->name('password-change');

 
	});

   

    Route::group(['prefix'=>'job'],function()
	{	
        Route::get('/search',[JobController::class, 'index'])->middleware('plancheck')->name('job-search-page');
        Route::get('/job-create',[JobController::class, 'create'])->name('job-create-page')->middleware('plancheck');
        Route::get('/apply-job/{jobId}/',[JobController::class, 'showApplyJob'])->name('showApplyJob')->middleware('plancheck');
        Route::post('/apply/{jobId}',[JobController::class, 'storeApplyJob'])->name('storeApplyJob');
        Route::any('/search/results',[JobController::class, 'showJobSearchResults'])->name('showJobSearchResults');
        Route::post('/search/add_to_fav',[JobController::class, 'storeJobToFavList'])->name('addJobToFavList');
        Route::post('/action',[JobController::class, 'store'])->name('job-store');
        Route::post('/job-store-edit',[JobController::class, 'jobStoreEdit'])->name('job-store-edit');
        Route::post('/validate-job',[JobController::class, 'validatejob'])->name('validate-job');

        
        Route::get('/unpublish-job',[JobController::class, 'unPublishJob'])->name('unpublish-job');
        Route::get('/delete-job',[JobController::class,'deleteJob'])->name('delete-job');

        Route::get('/posted-job',[JobController::class, 'postedJob'])->name('posted-job');
        Route::get('/saved-job',[JobController::class, 'savedJob'])->name('saved-job');
        Route::get('/applied-job',[JobController::class, 'appliedJob'])->name('applied-job');
        Route::get('/applicants/{jobId}',[JobController::class, 'showJobApplicants'])->name('showJobApplicants');
        Route::get('/cover-letter/{jobId}/{userId}',[JobController::class, 'showAppliedJobCoverLetter'])->name('showAppliedJobCoverLetter');

        Route::get('/posted-job-single-view',[JobController::class, 'postedJobView'])->name('posted-job-single-view');

	});



    Route::get('/setting-page',[SettingController::class, 'index'])->name('setting-page');
    Route::get('/forgot-password-page', function () {
        return view('website.auth.passwords/forgot');
    })->name('forgot-password-page');

});



@include('admin.php');
