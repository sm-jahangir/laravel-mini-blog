<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth:web'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('401', function () {
        return "Sorry You are not authorized person";
    })->name('401');

    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);

});