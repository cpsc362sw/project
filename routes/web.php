<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [
        'as' => 'home',
        'uses' => 'HomeController@index',
    ]);

    //  /admin    group
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
        # dashboard landing page
        Route::get('/', [
            'as' => 'admin',
            'uses' => 'AdminController@index'
        ]);
        #  users landing page
        Route::get('/users', [
            'as' => 'admin.users',
            'uses' => 'AdminController@getUsers'
        ]);

        Route::get('/users/edit/{id}', [
            'as' => 'postuser',
            'uses' => 'AdminController@getEditUser'
        ]);
        Route::post('/users/edit/{id}', [
            'as' => 'postuser',
            'uses' => 'AdminController@postEditUser'
        ]);

        # calendar landing page
        Route::get('/calendar', [
            'as' => 'admin.calendar',
            'uses' => 'AdminController@getCalendar'
        ]);
        # timeclock landing page

        # payroll landing page
    });

    Route::group(['prefix' => 'user', 'middleware' => 'user'], function() {
        Route::get('/', [
            'as' => 'user',
            'uses' => 'UserController@index'
        ]);
    });
});

