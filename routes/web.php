<?php

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
    return view('auth.login');
});

Auth::routes();

//home
Route::get('/home', 'HomeController@index');

//profile
Route::get('/profile', 'ProfileController@index');

//Admin Middleware
Route::middleware(['auth', 'admin'])->group(function() {

// User
Route::resource('/user', 'DataUserController');

//Biodata
Route::resource('/biodata','DataBioController');
Route::post('biodata-save/{id}', 'DataBioController@store');
Route::get('/user/biodata/{id}', 'DataBioController@create');

// Title
Route::resource('/title', 'TitleController');

//Departement
Route::resource('/departement', 'DeptController');

//Family
Route::resource('/family', 'FamilyController');
});

Route::resource('/leave','LeaveController');

