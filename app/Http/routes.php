<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
return view('welcome');
});

Route::get('/home', 'PagesController@home');
Route::post('/home', 'UploadApplyController@store');
Route:get('/profile/{id}', 'PagesController@profile');

Route::post('/home', 'PagesController@store' );





Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');






// socialite
Route::get('login/{provider?}', 'Auth\AuthController@login');


