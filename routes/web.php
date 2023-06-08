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

use App\Mail\SendMail;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/mail', function () {
    return new SendMail();
});

Route::get('/kirim-email', 'EmailController@index');

Auth::routes();

//home
Route::get('/home', 'HomeController@index');

//profile
Route::get('/profile', 'ProfileController@index');

//Admin Middleware
Route::middleware(['auth', 'admin'])->group(function () {

    // User
    Route::resource('/user', 'DataUserController');

    //Biodata
    Route::resource('/biodata', 'DataBioController');
    Route::post('biodata-save/{id}', 'DataBioController@store');
    Route::get('/user/biodata/{id}', 'DataBioController@create');

    // Title
    Route::resource('/title', 'TitleController');

    //Departement
    Route::resource('/departement', 'DeptController');

    //Family
    Route::resource('/family', 'FamilyController');

    //Leave
    Route::delete('/leave/deleteAll', 'LeaveController@deleteAll');
    Route::get('/leave/history', 'LeaveController@history');
});

Route::resource('/leave', 'LeaveController');
