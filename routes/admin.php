<?php

use App\Http\Controllers\admin\AdminAuth;
use App\Http\Controllers\admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProjectListController;  
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/
// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

Route::group(['prefix'=>'admin'],function()
{	
    Route::get('/dashboard', [AdminAuth::class, 'index'])->name('admin.dashboard');

   
    Route::group(['prefix'=>'user-management'],function()
    {
        Route::get('/list', [AdminUserController::class, 'index'])->name('user-management');
    });  
    Route::group(['prefix'=>'project-management'],function()
    {
        Route::get('/project-list', [ProjectListController::class, 'index'])->name('project-list-management');
        Route::post('/create-list', [ProjectListController::class, 'create'])->name('create-list');
        Route::get('/list', [ProjectListController::class, 'show'])->name('show-list');
        Route::get('/search', [ProjectListController::class, 'search'])->name('search-project');
        Route::post('/find', [ProjectListController::class, 'find'])->name('find-project');
    }); 
   
   
    Route::get('user', function () {
        return view('admin.user.user');
    });

    Route::get('login', [AdminAuth::class, 'login'])->name('admin-login');

    Route::get('project-list', [AdminProjectController::class, 'index'])->name('admin-project-list');
    Route::get('project-list-favorite', [AdminProjectController::class, 'markFavorite'])->name('project-list-favorite');
    Route::get('project-list-Recommended', [AdminProjectController::class, 'markRecommended'])->name('project-list-recommended');
    Route::get('project-list-status', [AdminProjectController::class, 'changeStatus'])->name('project-list-status');

});
?>
