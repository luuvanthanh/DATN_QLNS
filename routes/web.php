<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DepartmentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//admin
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
});



