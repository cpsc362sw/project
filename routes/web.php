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
            'uses' => 'AdminController@postUser'
        ]);

        # calendar landing page

        # timeclock landing page

        # payroll landing page


    });

});

