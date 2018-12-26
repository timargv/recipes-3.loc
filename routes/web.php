<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::group([
    'middleware' => ['auth'],
    ], function () {



    Route::group(['as' => 'feed.', 'namespace' => 'Recipe'], function () {
        Route::get('/', 'FeedController@index')->name('recipes');
    });


    Route::group(['as' => 'user.', 'namespace' => 'User'], function () {
        Route::get('/feed', 'UsersController@feed')->name('feed');
        Route::get('/id{user}', 'UsersController@show')->name('show');
        Route::get('/edit', 'UsersController@edit')->name('edit');
        Route::put('/update', 'UsersController@update')->name('update');
    });

});