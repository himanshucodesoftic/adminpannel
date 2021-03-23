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


// Route::view('admin_dashboard','admin_dashboard');

// Route::view('login','page-login');

Route::get('/adminlogin','App\Http\Controllers\AdminController@Adminloginpage');

Route::get('/admin/logout','App\Http\Controllers\AdminController@adminlogout');
Route::post('/admin/adminlogin/check', "App\Http\Controllers\AdminController@adminlogin");

Route::get('/admin_dashboard','App\Http\Controllers\Dashboard@show');
Route::get('delete/{id}','App\Http\Controllers\Dashboard@destroy');

// Route::get('edit-records','StudUpdateController@index');
Route::get('edit/{id}','App\Http\Controllers\Dashboard@showpage');
// Route::post('edit/{id}','App\Http\Controllers\Dashboard@edit');

Route::view('edit','edit');

Route::get('/oneday','App\Http\Controllers\userday@oneday');

Route::get('/sevenday','App\Http\Controllers\userday@sevenday');


Route::get('/oneyear','App\Http\Controllers\userday@oneyear');


Route::get('/thirtyday','App\Http\Controllers\userday@thirtyday');



Route::post('/store', "App\Http\Controllers\Dashboard@update_product");


Route::get('/changepassword','App\Http\Controllers\ChangePassword@show_edit_info');


Route::post('/password/{recid}', "App\Http\Controllers\ChangePassword@updatePassword");




Route::get('/admin_layout','App\Http\Controllers\userday@adminlayout');


// Route::get('forget-password', 'App\Http\Controllers\forgetpasswordController@getEmail')->name('forget-password');
// Route::post('forget-password', 'App\Http\Controllers\forgetpasswordController@postEmail')->name('forget-password');


// Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
// Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');




