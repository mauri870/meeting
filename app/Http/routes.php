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

Route::get('/',['as'=>'auth.login','uses'=>'Auth\AuthController@getLogin']);
Route::post('/', ['as'=>'auth.post_login','uses'=>'Auth\AuthController@postLogin']);

//Main Route

Route::get('meeting', ['middleware' => 'auth', 'as'=>'home.index','uses'=>'PagesController@index']);

//Permission Routes

Route::get('admin', ['middleware' => ['auth', 'needsPermission'],'shield'=>'admin', function()
{
    return 'Hi am i admin';
}]);

Route::get('user', ['middleware' => ['auth', 'needsPermission'], 'shield' => 'user', function()
{
    return 'Hi am i user';
}]);

Route::get('responsible', ['middleware' => ['auth', 'needsPermission'], 'shield' => 'responsible', function()
{
    return 'Hi am i reponsible';
}]);

//Logout route
Route::get('logout', ['as'=>'auth.logout','uses'=>'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('register', ['as'=>'auth.register','uses'=>'Auth\AuthController@getRegister']);
Route::post('register', ['as'=>'auth.post_register','uses'=>'Auth\AuthController@postRegister']);
