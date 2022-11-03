<?php
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Website\ProjectController;
use App\Http\Controllers\Website\UsersController;
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
Route::group(['prefix'=>'admin'],function()
{	
    Route::get('/login', function() {print('Admin login page');})->name('admin-login');

    Route::get('index', [AdminController::class, 'index'])->name('admin-index');
    Route::get('/user', function () {
        return view('admin.user.user');
    });

    Route::get('project-list', [AdminProjectController::class, 'index'])->name('project-list');
    Route::get('project-list-favorite', [AdminProjectController::class, 'markFavorite'])->name('project-list-favorite');
    Route::get('project-list-Recommended', [AdminProjectController::class, 'markRecommended'])->name('project-list-Recommended');

});


?>