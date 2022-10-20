<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustryGuideController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes(['verify' => true]);




    // routes that require user to be authenticated
    Route::post('verify-otp', [RegisterController::class, 'otpVerify'])->name('verify-otp');
    Route::get('otp-view', [RegisterController::class, 'index'])->name('otp-view'); 
    Route::get('resend-otp/{email?}/{type?}', [RegisterController::class, 'resendOtp'])->name('resend-otp'); 

    


Route::group(["middleware"=>["auth","revalidate","verified"],"prefix"=>""],function(){
 
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'user'],function()
	{	
		Route::get('/profile-private-show', [UserController::class, 'profilePrivateShow'])->name('profile-private-show');
		Route::get('/profile-public-show', [UserController::class, 'profilePublicShow'])->name('profile-public-show');
        Route::get('/profile-create', [UserController::class, 'profileCreate'])->name('profile-create');
        Route::post('/profile-store', [UserController::class, 'profileStore'])->name('profile-store');

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
	});

    Route::group(['prefix'=>'project'],function()
	{	
        Route::get('/project-list', [ProjectController::class, 'projectList'])->name('project-list');
        Route::get('/project-create', [ProjectController::class, 'projectViewRender'])->name('project-create');
        Route::post('/project-overview-store', [ProjectController::class, 'overviewStore'])->name('project-overview-store');
        Route::post('/project-details-store/{id}', [ProjectController::class, 'detailsStore'])->name('project-details-store');
        Route::post('/project-gallery-store/{id}', [ProjectController::class, 'galleryStore'])->name('project-gallery-store');
        Route::post('/project-description-store/{id}', [ProjectController::class, 'descriptionStore'])->name('project-description-store');
        Route::post('/project-milestone-store/{id}', [ProjectController::class, 'milestoneStore'])->name('project-milestone-store');
	});

    Route::group(['prefix'=>'industry-guide'],function()
	{	
        Route::get('/show', [IndustryGuideController::class, 'show'])->name('guide-view');
        Route::get('/filter', [IndustryGuideController::class, 'index'])->name('filter-profile');
       
	});

    Route::group(['prefix'=>'settings'],function()
	{	
        Route::get('/password-reset-otp', [ResetPasswordController::class, 'restPasswordOtpView'])->name('password-reset-otp');
        Route::get('/password-change-view', [ResetPasswordController::class, 'restPasswordView'])->name('password-change-view');
        Route::post('/verify-otp',[OtpController::class, 'otpVerify'])->name('verify-otp-after-login');
        Route::get('/create-reset-Otp',[ResetPasswordController::class, 'createResetOtp'])->name('create-reset-otp');
        Route::post('/password-change', [ResetPasswordController::class, 'resetPasswordCreate'])->name('password-change');

 
	});

    
    Route::get('/setting-page', function () {
        return view('user.setting');
    })->name('setting-page');
    Route::get('/forgot-password-page', function () {
        return view('auth.passwords/forgot');
    })->name('forgot-password-page');
    Route::get('/reset-password-page', function () {
        return view('auth.passwords/reset_public');
    })->name('reset-password-page');
});

Route::get('/test', function () {
    return view('organisation.organisation');
});


