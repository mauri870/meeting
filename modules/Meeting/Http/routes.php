<?php

Route::group(['prefix' => 'meeting','middleware' => 'auth','namespace' => 'Modules\Meeting\Http\Controllers'], function () {
        //Main Route

        Route::get('/', ['as' => 'home.index', 'uses' => 'PagesController@index']);

        //Permission Routes

        Route::get('admin/', ['as'=>'home.admin','middleware' => ['needsPermission'], 'shield' => 'admin', function () {
            return 'Hi am i admin';
        }]);

        Route::get('responsible/', ['as'=>'home.responsible','middleware' => ['needsPermission'], 'shield' => 'responsible', function () {
            return 'Hi am i reponsible';
        }]);
});