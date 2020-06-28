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

// Authentication routes ...
Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
Route::get('/', 'HomeController@index')->name('home');

// CRM routes ...
Route::resource('home', 'SchoolController', ['middleware' => 'auth', function () { return View::make('home'); }]);
Route::resource('schools', 'SchoolController', ['middleware' => 'auth', function () { return View::make('schools'); }]);
Route::resource('students', 'StudentController', ['middleware' => 'auth', function () { return View::make('students'); }]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');