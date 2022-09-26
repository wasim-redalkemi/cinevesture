<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortfolioController;
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
    Route::get('/profile-view', [ProfileController::class, 'profileView'])->name('profile-view');
    Route::get('/profile-create', [ProfileController::class, 'profileCreate'])->name('profile-create');
    Route::post('/profile-store', [ProfileController::class, 'profileStore'])->name('profile-store');
    // Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile-update');

    Route::get('/portfolio-add', [PortfolioController::class, 'index'])->name('portfolio-add');
    Route::post('/portfolio-store', [PortfolioController::class, 'store'])->name('portfolio-store');

    Route::get('/experience-add', [UserController::class, 'experienceAdd'])->name('experience-add');
    Route::post('/experience-store', [UserController::class, 'experienceStore'])->name('experience-store');

    Route::get('/qualification-add', [UserController::class, 'qualificationAdd'])->name('qualification-add');
    Route::post('/qualification-store', [UserController::class, 'qualificationStore'])->name('qualification-store');


    Route::get('/setting-page', function () {
        return view('user.setting');
    })->name('setting-page');
});


