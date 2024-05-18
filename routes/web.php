<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TeamController;
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

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth','prefix'=> 'admin'], function(){
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
        Route::post('/edit', [EmployeeController::class,'edit'])->name("employee.edit");
        Route::post('/update', [EmployeeController::class,'update'])->name("employee.update");
        Route::get('/show/{id}', [EmployeeController::class,'show'])->name("employee.view");
    });
    Route::group(['prefix'=>'team'], function(){
        Route::get('/list', [TeamController::class,'index'])->name("team.index");
        Route::get('/new', [TeamController::class,'create'])->name("team.create");
        Route::post('/store', [TeamController::class,'store'])->name("team.store");
        Route::post('/edit', [TeamController::class,'edit'])->name("team.edit");
        Route::post('/update', [TeamController::class,'update'])->name("team.update");
        Route::get('/show/{id}', [TeamController::class,'show'])->name("team.view");
    });
    Route::get( 'dashboard', [DashboardController::class, 'index' ] )->name( 'home' );
    // Route::get( '/dashboard', [DashboardController::class, 'getAccount' ] )->name( 'account' );
});