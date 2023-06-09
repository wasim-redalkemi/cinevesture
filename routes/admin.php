<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProjectListController;
use App\Http\Controllers\Admin\QueryController;
use App\Http\Controllers\Admin\UsreOrderController;
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
Route::get('admin/login', [AuthController::class, 'showLoginAdmin'])->name('admin.loginview')->middleware('is_admin');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::group(['prefix'=>'admin','middleware' => ['adminAuth']],function()
{	
    Route::get('/dashboard/index', [AuthController::class, 'index'])->name('admin.dashboard');
   
    Route::group(['prefix'=>'user-management'],function()
    {
        Route::get('/list', [AdminUserController::class, 'index'])->name('user-management');
        Route::get('/delete/{id}', [AdminUserController::class, 'destroy'])->name('user-delete');
        Route::get('/user_status', [AdminUserController::class, 'changeStatus'])->name('user-status-change');
    });  
    Route::group(['prefix'=>'project-list'],function()
    {
        Route::get('/create', [ProjectListController::class, 'index'])->name('project-list-management');
        // Route::get('/update-automated-list', [ProjectListController::class, 'updateAutomatedList'])->name('project-list-management');
        Route::post('/list-create', [ProjectListController::class, 'create'])->name('create-list');
        Route::get('/list', [ProjectListController::class, 'project_list_show'])->name('show-list');
        Route::get('/list-projects', [ProjectListController::class, 'search_project'])->name('list-projects');
        Route::get('/edit/{id}', [ProjectListController::class, 'project_list_edit'])->name('projectlistedit');
        Route::post('/edit', [ProjectListController::class, 'project_list_update'])->name('update_project_list');
        Route::post('/search-projects', [ProjectListController::class, 'saveSearchProjects'])->name('save-search-projects');
        Route::get('/change-status/{id}/{status}', [ProjectListController::class, 'changeStatus'])->name('change-status');
        Route::get('/delete-list/{id}', [ProjectListController::class, 'deleteList'])->name('delete-list');
        Route::get('/list-automation', [ProjectListController::class, 'listAutomation']);
    }); 
    Route::group(['prefix'=>'query-management'],function()
    {
        Route::get('/list', [QueryController::class, 'index'])->name('query.list');
        Route::get('delete/{id}', [QueryController::class, 'destroy'])->name('query-delete');
        Route::get('view/{id}', [QueryController::class, 'show'])->name('query-show');
       
        
    }); 
    Route::group(['prefix'=>'job-managemant'],function()
    {
        Route::get('/index', [JobController::class, 'index'])->name('job');
        Route::get('delete/{id}', [JobController::class, 'destroy'])->name('job-delete');
        Route::get('status_update', [JobController::class, 'status_update'])->name('status_update');
        Route::get('promote_update', [JobController::class, 'promoteUpdate'])->name('promote_update');

    }); 
    Route::group(['prefix'=>'User-order'],function()
    {
        Route::get('/index', [UsreOrderController::class, 'index'])->name('user_order');
    }); 
   

    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('project/list', [AdminProjectController::class, 'index'])->name('admin-project-list');
    Route::get('project-favorite', [AdminProjectController::class, 'markFavorite'])->name('project-list-favorite');
    Route::get('project-verified', [AdminProjectController::class, 'markVerified'])->name('project-list-verified');
    Route::get('project-status', [AdminProjectController::class, 'changeStatus'])->name('project-list-status'); 
    Route::get('category-update-view', [AdminProjectController::class, 'categoryEdit'])->name('category.update-view');
    Route::post('category-update', [AdminProjectController::class, 'categoryUpdate'])->name('category.update');
    Route::get('project/genre-update-view', [AdminProjectController::class, 'genreEdit'])->name('genre.update-view');
    Route::post('genre-update', [AdminProjectController::class, 'genreUpdate'])->name('genre.update');
});
?>
