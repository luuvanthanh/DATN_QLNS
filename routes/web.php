<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
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
        Route::get('/list', [DepartmentController::class, 'index'])->name('index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('store');
        Route::get('/show/{id}', [DepartmentController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
    });
});



