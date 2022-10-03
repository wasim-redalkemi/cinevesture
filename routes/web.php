<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustryGuideController;
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



Route::middleware(['guest'])->group(function () {
    // routes that require user to be authenticated
    Route::post('verify-otp', [RegisterController::class, 'otpVerify'])->name('verify-otp');
    Route::get('otp-view', [RegisterController::class, 'index'])->name('otp-view');    
});


Route::group(["middleware"=>["auth","revalidate","verified"],"prefix"=>""],function(){
 
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'user'],function()
	{	
		Route::get('/profile-private-show', [UserController::class, 'profilePrivateShow'])->name('profile-private-show');
		Route::get('/profile-public-show', [UserController::class, 'profilePublicShow'])->name('profile-public-show');
        Route::get('/profile-create', [UserController::class, 'profileCreate'])->name('profile-create');
        Route::post('/profile-store', [UserController::class, 'profileStore'])->name('profile-store');

        Route::get('/portfolio-create', [UserController::class, 'portfolioCreate'])->name('portfolio-create');
        Route::post('/portfolio-store', [UserController::class, 'portfolioStore'])->name('portfolio-store');

        Route::get('/experience-create', [UserController::class, 'experienceCreate'])->name('experience-create');
        Route::post('/experience-store', [UserController::class, 'experienceStore'])->name('experience-store');

        Route::get('/qualification-create', [UserController::class, 'qualificationCreate'])->name('qualification-create');
        Route::post('/qualification-store', [UserController::class, 'qualificationStore'])->name('qualification-store');        		
	});

    Route::group(['prefix'=>'project'],function()
	{	
        Route::get('/project-create', [ProjectController::class, 'projectViewRender'])->name('project-create');
        Route::post('/project-overview-store', [ProjectController::class, 'overviewStore'])->name('project-overview-store');
        Route::post('/project-details-store/{id}', [ProjectController::class, 'detailsStore'])->name('project-details-store');
        Route::post('/project-description-store/{id}', [ProjectController::class, 'descriptionStore'])->name('project-description-store');
        Route::post('/project-milestone-store/{id}', [ProjectController::class, 'milestoneStore'])->name('project-milestone-store');
	});

    Route::group(['prefix'=>'industry-guide'],function()
	{	
        Route::get('/show', [IndustryGuideController::class, 'show'])->name('guide-view');
        Route::post('/filter', [IndustryGuideController::class, 'index'])->name('filter-profile');
       
	});


    Route::get('/setting-page', function () {
        return view('user.setting');
    })->name('setting-page');
});

Route::get('/test', function () {
    return view('user.project.project_gallery');
});


