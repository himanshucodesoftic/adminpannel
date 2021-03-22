<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', 'App\Http\Controllers\UsersController@index');

Route::post('user-store', 'App\Http\Controllers\UsersController@userPostRegistration');

Route::get('userlogin', 'App\Http\Controllers\UsersController@userLoginIndex');

Route::post('login', 'App\Http\Controllers\UsersController@userPostLogin');

Route::get('dashboard', 'App\Http\Controllers\UsersController@dashboard');

Route::get('logout', 'App\Http\Controllers\UsersController@logout');

Route::get('forget','App\Http\Controllers\forgetpassword@forget_password');    


Route::post('forgot_password','App\Http\Controllers\forgetpassword@password');    

Route::view('admin_dashboard','admin_dashboard');

// Route::view('login','page-login');

Route::get('/adminlogin','App\Http\Controllers\AdminController@Adminloginpage');

Route::get('/admin/logout','App\Http\Controllers\AdminController@adminlogout');
Route::post('/admin/adminlogin/check', "App\Http\Controllers\AdminController@adminlogin");