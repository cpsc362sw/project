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
    Route::get('/admin', [
        'as' => 'admin',
        'uses' => 'AdminController@index'
    ]);
    Route::post('/admin/edit/{id}', [
        'as' => 'postuser',
        'uses' => 'AdminController@postUser'
    ]);
});

