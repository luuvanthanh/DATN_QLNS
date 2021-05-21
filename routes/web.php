<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

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

    // Admin Dashboard
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

     // departments
    Route::group(['prefix' => 'departments', 'as' => 'departments.'], function () {
        Route::get('/pb', [DepartmentController::class, 'index'])->name('index');
        // Route::get('/', 'DepartmentController@index')->middleware('permission:read-department')->name('index');
        // Route::get('/create', 'DepartmentController@create')->middleware('permission:create-department')->name('create');
        // Route::post('/', 'DepartmentController@store')->middleware('permission:create-department')->name('store');
        // Route::get('/{id}/edit', 'DepartmentController@edit')->middleware('permission:update-department')->name('edit');
        // Route::put('/{id}', 'DepartmentController@update')->middleware('permission:update-department')->name('update');
        // Route::delete('/{id}', 'DepartmentController@destroy')->middleware('permission:update-department')->name('destroy');
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
        Route::get('/show/{id}', [RoleController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [RoleController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('destroy');
    });

});


