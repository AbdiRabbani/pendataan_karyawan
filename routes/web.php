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
Route::get('/home', 'HomeController@index');

Route::get('/profile', 'ProfileController@index');

// User
Route::get('/users', 'AdminUsersController@index');
Route::view('/user/create', 'user.create-user');


// Title
Route::get('/title', 'TitleController@index');
Route::get('title/edit/{id}', 'TitleController@edit');
Route::post('/simpan-title', 'TitleController@save');
Route::delete('title/delete/{id}', 'TitleController@destroy');
Route::put('edit-title/{id}', 'TitleController@update');

//Departement
Route::get('/departement', 'DeptController@index');
Route::get('dept/edit/{id}', 'DeptController@edit');
Route::post('/simpan-dept', 'DeptController@save');
Route::delete('dept/delete/{id}', 'DeptController@destroy');
Route::put('edit-dept/{id}', 'DeptController@update');