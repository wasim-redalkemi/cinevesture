<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


Auth::routes();



Route::get('/test-blade', function () {
    return view('user.setting');
});
Route::get('/verify-otp/{user}',  [RegisterController::class, 'verifyOtpView'])->name('verifyOtpView');
Route::post('verify-otp', [RegisterController::class, 'verifyOtp'])->name('verify-otp');
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

Route::group(["middleware"=>["auth","revalidate","verified"],"prefix"=>""],function(){

    Route::get('/', function () {
        return view('auth.login');
    });
    
    // Route::get('/otp', function () {
    //     return view('auth.auth_otp');
    // });
    Route::get('/main', function () {
        return view('main');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/', function () {
        return view('user.profile_portfolio');
    });
    Route::get('/user-qualification', function () {
        return view('user.profile_qualification');
    });
    Route::get('/profile-setup', function () {
        return view('user.profile_setup');
    });
    Route::get('/profile-experience', function () {
        return view('user.profile_experience');
    });
    Route::get('/guide-profile', function () {
        return view('user.guide_profile');
    })->name('guide-profile');
    Route::get('/profile-view', function () {
        return view('user.profile_view');
    })->name('profile-view');
    Route::get('/profile-contact', function () {
        return view('user.profile_contact');
    });
    Route::get('/searchpage', function () {
        return view('user.searchpage');
    });
    Route::get('/setting-page', function () {
        return view('user.setting');
    })->name('setting-page');
});


