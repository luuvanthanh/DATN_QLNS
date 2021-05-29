<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ProfileController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['checklogin'] , 'as' => 'admin.'], function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login.handle');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Dashboard
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('updateProfile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    Route::post('changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');

     // departments
    Route::group(['prefix' => 'departments', 'as' => 'departments.'], function () {
        Route::get('/list', [DepartmentController::class, 'index'])->name('index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('store');
        Route::get('/show/{id}', [DepartmentController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
    });

         // Workers
    Route::group(['prefix' => 'workers', 'as' => 'workers.'], function () {
        Route::get('/list', [WorkerController::class, 'index'])->name('index');
        Route::get('/create', [WorkerController::class, 'create'])->name('create');
        Route::post('/store', [WorkerController::class, 'store'])->name('store');
        Route::get('/show/{id}', [WorkerController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [WorkerController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [WorkerController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [WorkerController::class, 'destroy'])->name('destroy');
            
    });

    // ------------route-user-----------------
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/list', [UserController::class, 'index'])->middleware('checkRole:user-list')->name('index');
        Route::get('/create', [UserController::class, 'create'])->middleware('checkRole:user-add')->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware('checkRole:user-edit')->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->middleware('checkRole:user-delete')->name('destroy');
    });

    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
        Route::get('/list', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [RoleController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('destroy');
    });

    // Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
    //     Route::get('/list', [RoleController::class, 'index'])->name('index');
    //     Route::get('/create', [RoleController::class, 'create'])->name('create');
    //     Route::post('/store', [RoleController::class, 'store'])->name('store');
    //     Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
    //     Route::put('/update/{id}', [RoleController::class, 'update'])->name('update');
    //     Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('destroy');
    // });

});


