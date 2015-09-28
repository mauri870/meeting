<?php

Route::group(['prefix' => 'meeting', 'middleware' => 'auth', 'namespace' => 'Modules\Meeting\Http\Controllers'], function () {
    //Main Route

    Route::get('/', ['as' => 'home.index', 'uses' => 'PagesController@index']);

    //Permission Routes

        //Admin Routes
        Route::group(['middleware' => 'needsRole', 'is' => 'admin'], function () {

            //Default Route
            Route::get('/admin', ['as' => 'home.admin', function () {
                return 'Hi am i admin';
            }]);
        });

    //Admin Permission
    Route::group(['middleware' => 'needsPermission', 'shield' => 'admin'], function () {
        Route::get('/users',['as'=>'admin.users', 'uses'=>'PagesController@users']);
        Route::get('/users/add',['as'=>'admin.users.add', 'uses'=>'PagesController@user_add']);
    });

    //Responsible Routes
    Route::group(['middleware' => 'needsPermission', 'shield' => 'responsible'], function () {

    });
});