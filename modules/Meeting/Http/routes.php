<?php

Route::group(['prefix' => 'meeting', 'middleware' => 'auth', 'namespace' => 'Modules\Meeting\Http\Controllers'], function () {
    //Main Route

    Route::get('/', ['as' => 'home.index', 'uses' => 'PagesController@index']);

    //Posts
        //Show All Posts
        Route::get('/posts', ['as' => 'home.posts', 'uses' => 'PostsController@index']);

        //Show specific post
        Route::get('/posts/{id}', ['as' => 'home.posts.show', 'uses' => 'PostsController@show']);

        //Add Users
        Route::get('/users/add', ['as' => 'admin.users.add', 'uses' => 'PagesController@add_user']);
        Route::post('/users/add', ['as' => 'admin.users.add_post', 'uses' => 'PagesController@add_post']);

        //Edit Users
        Route::get('/users/edit/{id}', ['as' => 'admin.users.edit', 'uses' => 'PagesController@edit_user']);
        Route::post('/users/edit/{id}', ['as' => 'admin.users.post_edit', 'uses' => 'PagesController@edit_post']);

        //Delete User
        Route::get('/users/delete/{id}', ['as' => 'admin.users.delete', 'uses' => 'PagesController@delete']);
    //End Posts

    //Permission Routes

    //Admin Permission
    Route::group(['middleware' => 'needs_role:admin'], function () {

        //Show Users
            Route::get('/users', ['as' => 'admin.users', 'uses' => 'PagesController@users']);

            //Add Users
            Route::get('/users/add', ['as' => 'admin.users.add', 'uses' => 'PagesController@add_user']);
            Route::post('/users/add', ['as' => 'admin.users.add_post', 'uses' => 'PagesController@add_post']);

            //Edit Users
            Route::get('/users/edit/{id}', ['as' => 'admin.users.edit', 'uses' => 'PagesController@edit_user']);
            Route::post('/users/edit/{id}', ['as' => 'admin.users.post_edit', 'uses' => 'PagesController@edit_post']);

            //Delete User
            Route::get('/users/delete/{id}', ['as' => 'admin.users.delete', 'uses' => 'PagesController@delete']);
        //End Users



        //Meeting
            //Show Users
            Route::get('/users', ['as' => 'admin.users', 'uses' => 'PagesController@users']);

            //Add Users
            Route::get('/users/add', ['as' => 'admin.users.add', 'uses' => 'PagesController@add_user']);
            Route::post('/users/add', ['as' => 'admin.users.add_post', 'uses' => 'PagesController@add_post']);

            //Edit Users
            Route::get('/users/edit/{id}', ['as' => 'admin.users.edit', 'uses' => 'PagesController@edit_user']);
            Route::post('/users/edit/{id}', ['as' => 'admin.users.post_edit', 'uses' => 'PagesController@edit_post']);

            //Delete User
            Route::get('/users/delete/{id}', ['as' => 'admin.users.delete', 'uses' => 'PagesController@delete']);
        //End Meeting
    });
});