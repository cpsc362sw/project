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
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/copyright', function () {
    return view('copyright');
});
Route::get('/privacy', function () {
    return view('privacy');
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
        Route::get('/users/delete/{id}', [
            'as' => 'deleteuser',
            'uses' => 'AdminController@getDeleteUser'
        ]);
        Route::post('/users/delete/{id}', [
            'as' => 'postdeleteuser',
            'uses' => 'AdminController@postDeleteUser'
        ]);

        # calendar landing page
        Route::get('/calendar', [
            'as' => 'admin.calendar',
            'uses' => 'AdminController@getCalendar'
        ]);
        # timeclock landing page
        Route::get('/timeclock', [
            'as'=> 'admin.timeclock',
            'uses' => 'AdminController@getTimeClock'
        ]);
        
        Route::post('/timeclock', [
        		'as'=> 'admin.timeclock',
        		'uses' => 'AdminController@postTimeClock'
        ]);

        # payroll landing page
        Route::get('/reports', [
            'as'=> 'admin.reports',
            'uses'=> 'AdminController@getReports'
        ]);
    });

    Route::group(['prefix' => 'user', 'middleware' => 'user'], function() {
        Route::get('/', [
            'as' => 'user',
            'uses' => 'UserController@index'
        ]);
        
        # user get edit time clock
        Route::get('/timeclock', [
        		'as' => 'user.timeclock',
        		'uses' => 'UserController@getEditTimeClock'
        ]);
        
        # user post edit time clock
        Route::post('/timeclock', [
        		'as' => 'user.timeclock',
        		'uses' => 'UserController@postEditTimeClock'
        ]);
    });
});

