<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/home', 'UserController@index')->name('home');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post("login", [UserController::class, 'login']);
Route::view("loginform", "rms_driver.login")->name('loginform');
Route::post("register", [UserController::class, 'register']);
Route::post("compute", [UserController::class, 'computeRevenue']);
Route::post("contact", [UserController::class, 'insertMessage']);
