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

// Authentication routes...

//Login

Route::get('/', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/', ['as' => 'auth.post_login', 'uses' => 'Auth\AuthController@postLogin']);

//Logout route
Route::get('logout', ['middleware'=>'auth','as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);