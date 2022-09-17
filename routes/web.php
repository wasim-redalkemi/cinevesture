<?php

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/otp', function () {
    return view('auth.auth_otp');
});
Route::get('/main', function () {
    return view('main');
});
Route::get('/user-portfolio', function () {
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
});
Route::get('/profile-view', function () {
    return view('user.profile_view');
});
Route::get('/profile-contact', function () {
    return view('user.profile_contact');
});
Route::get('/searchpage', function () {
    return view('user.searchpage');
});

Route::get('/test-blade', function () {
    return view('user.organisation');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
