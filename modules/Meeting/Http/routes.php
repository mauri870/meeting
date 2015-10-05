<?php

Route::group(['prefix' => 'meeting', 'middleware' => 'auth', 'namespace' => 'Modules\Meeting\Http\Controllers'], function () {
    //Main Route

    Route::get('/', ['as' => 'home.index', 'uses' => 'PagesController@index']);

    //Posts
        //Show All Posts
        Route::get('/posts', ['as' => 'home.posts', 'uses' => 'PostsController@index']);

        //Show specific post
        Route::get('/posts/all/{id}', ['as' => 'home.posts.show', 'uses' => 'PostsController@show']);

        //Show posts for logged user
        Route::get('/posts/your', ['as' => 'home.posts.your', 'uses' => 'PostsController@your']);

        //Add new post
        Route::get('/posts/add', ['as' => 'home.posts.add', 'uses' => 'PostsController@add']);
        Route::post('/posts/add', ['as' => 'home.posts.add_post', 'uses' => 'PostsController@add_post']);

        //Edit post
        Route::get('/posts/edit/{id}', ['as' => 'home.posts.edit', 'uses' => 'PostsController@edit']);
        Route::post('/posts/edit/{id}', ['as' => 'home.posts.edit_post', 'uses' => 'PostsController@edit_post']);

        //Delete post
        Route::get('/posts/delete/{id}', ['as' => 'home.posts.delete', 'uses' => 'PostsController@delete']);
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
            Route::get('/meetings', ['as' => 'admin.users', 'uses' => 'MeetingController@index']);

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