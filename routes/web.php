<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ModulesController;
use App\Http\Controllers\Admin\PermissionModulesController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','log'],'prefix'=> 'admin'], function(){
    Route::group(['prefix'=> 'projects'], function(){
        Route::get('/list', [ProjectController::class,'index'])->name("project.index");
        Route::get('/new', [ProjectController::class,'create'])->name("project.create");
        Route::post('/store', [ProjectController::class,'store'])->name("project.store");
        Route::get('/edit/{id}', [ProjectController::class,'edit'])->name("project.edit");
        Route::post('/update', [ProjectController::class,'update'])->name("project.update");
        Route::get('/show/{id}', [ProjectController::class,'show'])->name("project.view");
        // Route::get('/refund', [ProjectController::class,'cancelAndRefund'])->name("project.refund");
    });
    Route::group(['prefix'=>'task'], function(){
        Route::get('/list', [TaskController::class,'index'])->name("task.index");
        Route::get('/new', [TaskController::class,'create'])->name("task.create");
        Route::post('/store', [TaskController::class,'store'])->name("task.store");
        Route::post('/edit', [TaskController::class,'edit'])->name("task.edit");
        Route::post('/update', [TaskController::class,'update'])->name("task.update");
        Route::get('/show/{id}', [TaskController::class,'show'])->name("task.view");
    });
    Route::group(['prefix'=>'log/activity'], function(){
        Route::get('/list', [ActivityLogController::class,'index'])->name("activity.index");
        Route::get('/new', [ActivityLogController::class,'create'])->name("activity.create");
        Route::post('/store', [ActivityLogController::class,'store'])->name("activity.store");
        Route::post('/edit', [ActivityLogController::class,'edit'])->name("activity.edit");
        Route::post('/update', [ActivityLogController::class,'update'])->name("activity.update");
        Route::get('/show/{id}', [ActivityLogController::class,'show'])->name("activity.view");
    });
    Route::group(['prefix'=>'employee'], function(){
        Route::get('/list', [EmployeeController::class,'index'])->name("employee.index");
        Route::get('/new', [EmployeeController::class,'create'])->name("employee.create");
        Route::post('/store', [EmployeeController::class,'store'])->name("employee.store");
        Route::get('/edit/{id}', [EmployeeController::class,'edit'])->name("employee.edit");
        Route::post('/update', [EmployeeController::class,'update'])->name("employee.update");
        Route::get('/show/{id}', [EmployeeController::class,'show'])->name("employee.view");
        Route::get('/education/{id}/details', [EmployeeController::class,'educationDetails'])->name("employee.education.details");
        Route::get('/company/{id}/details', [EmployeeController::class,'companyDetails'])->name("employee.company.details");
        Route::post( '/history/{id}/store', [EmployeeController::class, 'storeHistory' ] )->name( 'employee.history.store' );
        Route::post( '/education/{id}/store', [EmployeeController::class, 'storeEducation' ] )->name( 'employee.education.store' );
    });
    Route::group(['prefix'=>'team'], function(){
        Route::get('/list', [TeamController::class,'index'])->name("team.index");
        Route::get('/new', [TeamController::class,'create'])->name("team.create");
        Route::post('/store', [TeamController::class,'store'])->name("team.store");
        Route::post('/edit', [TeamController::class,'edit'])->name("team.edit");
        Route::post('/update', [TeamController::class,'update'])->name("team.update");
        Route::get('/show/{id}', [TeamController::class,'show'])->name("team.view");
    });
    Route::group(['prefix'=>'user'], function(){
        Route::get('/list', [UserController::class,'index'])->name("user.index");
        Route::get('/new', [UserController::class,'create'])->name("user.create");
        Route::post('/store', [UserController::class,'store'])->name("user.store");
        Route::get('/edit/{id}', [UserController::class,'edit'])->name("user.edit");
        Route::post('/update/{id}', [UserController::class,'update'])->name("user.update");
        Route::get('/show/{id}', [UserController::class,'show'])->name("user.view");
        Route::get('/destroy/{id}', [UserController::class,'destroy'])->name("user.destroy");
        Route::get('/profile/{id}', [UserController::class,'getProfile'])->name("user.profile");
        Route::post('/change/password', [UserController::class,'changePasswordOrEmail'])->name("user.changePassword");
        Route::get('/send/{email}/{name}/password', [UserController::class,'sendEmailForChangePassword'])->name("user.sendemail.password");
        Route::get('/new/password', [UserController::class,'ChangePassword'])->name("user.new.password");
        Route::post('/new/password/change', [UserController::class,'UpdatePassword'])->name("user.update.password");
    });
    Route::group(['prefix'=>'roles'], function(){
        Route::get('/list', [RolesController::class,'index'])->name("roles.index");
        Route::get('/new', [RolesController::class,'create'])->name("roles.create");
        Route::post('/store', [RolesController::class,'store'])->name("roles.store");
        Route::get('/edit', [RolesController::class,'edit'])->name("roles.edit");
        Route::post('/update', [RolesController::class,'update'])->name("roles.update");
        Route::get('/show/{id}', [RolesController::class,'show'])->name("roles.view");
    });
    Route::group(['prefix'=>'permission'], function(){
        Route::get('/list', [PermissionModulesController::class,'index'])->name("permission.index");
        Route::get('/new', [PermissionModulesController::class,'create'])->name("permission.create");
        Route::post('/store', [PermissionModulesController::class,'store'])->name("permission.store");
        Route::get('/edit', [PermissionModulesController::class,'edit'])->name("permission.edit");
        Route::post('/update', [PermissionModulesController::class,'update'])->name("permission.update");
        Route::get('/show/{id}', [PermissionModulesController::class,'show'])->name("permission.view");
    });
    Route::group(['prefix'=>'module'], function(){
        Route::get('/list', [ModulesController::class,'index'])->name("module.index");
        Route::get('/new', [ModulesController::class,'create'])->name("module.create");
        Route::post('/store', [ModulesController::class,'store'])->name("module.store");
        Route::get('/edit', [ModulesController::class,'edit'])->name("module.edit");
        Route::post('/update', [ModulesController::class,'update'])->name("module.update");
        Route::get('/show/{id}', [ModulesController::class,'show'])->name("module.view");
    });
    //Route::get( 'dashboard', [DashboardController::class, 'index' ] )->name( 'home' );
});