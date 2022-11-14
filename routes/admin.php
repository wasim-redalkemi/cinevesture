<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProjectListController;
use App\Http\Controllers\Admin\QueryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthMiddleware;

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
//     return view('admin.auth.login');
// });
Route::get('admin/login', [AuthController::class, 'showLoginAdmin'])->name('admin.loginview');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::group(['prefix'=>'admin','middleware' => 'adminAuth'],function()
{	
    Route::get('/dashboard', [AuthController::class, 'index'])->name('admin.dashboard');
   
    Route::group(['prefix'=>'user-management'],function()
    {
        Route::get('/list', [AdminUserController::class, 'index'])->name('user-management');
    });  
    Route::group(['prefix'=>'project-management'],function()
    {
        Route::get('/project-list', [ProjectListController::class, 'index'])->name('project-list-management');
        Route::post('/create-list', [ProjectListController::class, 'create'])->name('create-list');
        Route::get('/list', [ProjectListController::class, 'show'])->name('show-list');
        Route::get('/search/{id}', [ProjectListController::class, 'search'])->name('search-project');
        Route::post('/find/{id}', [ProjectListController::class, 'find'])->name('find-project');
        Route::post('/search-projects', [ProjectListController::class, 'saveSearchProjects'])->name('save-search-projects');
        Route::get('/change-status/{id}/{status}', [ProjectListController::class, 'changeStatus'])->name('change-status');
        Route::get('/delete-list/{id}', [ProjectListController::class, 'deleteList'])->name('delete-list');
    }); 
    Route::group(['prefix'=>'query-management'],function()
    {
        Route::get('/query-list', [QueryController::class, 'index'])->name('query.list');
        Route::get('query-delete/{id}', [QueryController::class, 'destroy'])->name('query-delete');
        Route::get('query-view/{id}', [QueryController::class, 'show'])->name('query-show');
       
        
    }); 
   
    Route::get('user', function () {
        return view('admin.user.user');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('project-list', [AdminProjectController::class, 'index'])->name('admin-project-list');
    Route::get('project-list-favorite', [AdminProjectController::class, 'markFavorite'])->name('project-list-favorite');
    Route::get('project-list-Recommended', [AdminProjectController::class, 'markRecommended'])->name('project-list-recommended');
    Route::get('project-list-status', [AdminProjectController::class, 'changeStatus'])->name('project-list-status'); 
    Route::get('category-update-view', [AdminProjectController::class, 'categoryEdit'])->name('category.update-view');
    Route::post('category-update', [AdminProjectController::class, 'categoryUpdate'])->name('category.update');
    Route::get('genre-update-view', [AdminProjectController::class, 'genreEdit'])->name('genre.update-view');
    Route::post('genre-update', [AdminProjectController::class, 'genreUpdate'])->name('genre.update');
});
?>
